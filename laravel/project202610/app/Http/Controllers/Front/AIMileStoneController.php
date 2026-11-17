<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\AIMileStone;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use PhpOffice\PhpWord\IOFactory;
use PhpOffice\PhpWord\PhpWord;
use PhpOffice\PhpWord\Settings;

class AIMileStoneController extends Controller
{
    public function index(Request $req)
    {
        $keyword = $req->input("keyword");

        $list = [];

        if (!empty($keyword)) {
            $list = AIMileStone::search($keyword);
        }

        return view("front.milestone.ai", compact("keyword", "list"));
    }

    public function word()
    {
        $res = Http::withToken(env("GROQ_API_KEY"))
            ->timeout(300)
            ->post("https://api.groq.com/openai/v1/chat/completions", [
                "model" => env("GROQ_MODEL", "openai/gpt-oss-120b"),

                "response_format" => [
                    "type" => "json_object"
                ],

                "messages" => [
                    [
                        "role" => "system",
                        "content" => "你是撰寫文件的助手，請用繁體中文回答，請用台灣用語，不要使用Markdown符號"
                    ],
                    [
                        "role" => "user",
                        "content" => "請產出一份[如何用Laravel呼叫AI api]的說明文件,格式為word"
                    ],
                ],
            ]);

            $content = $res -> json("choices.0.message.content")??"AI沒有回應";
            Settings::setOutputEscapingEnabled(true);
            $word = new PhpWord;
            $section = $word->addSection();
            $section->addTitle("AI說明文件",1);

            foreach(explode("\n",$content) as $line)
            {
                $section->addText($line,['name' => "標楷體",'size'=>12 ]);

            }

            $path = storage_path("app/ai_doc.dox");
            IOFactory::createWriter($word,"word2007")->save($path);
            return response()->download($path)->deleteFileAfterSend(true);
    }
}
