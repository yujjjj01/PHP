<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\AiMileStone;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use PhpOffice\PhpWord\IOFactory;
use PhpOffice\PhpWord\PhpWord;
use PhpOffice\PhpWord\Settings;

class AiMileStoneController extends Controller
{
    public function index(Request $req)
    {
        // 傳送過來要查詢的資料
        $keyword = $req->keyword;
        // 預設為空陣列
        $list = [];

        if (!empty($keyword))
        {
            // search:這個function 是static(靜態的), 所以不用new AiMileStone即可直接呼叫(用::)
            $list = AiMileStone::serach($keyword);
        }
        
        return view("front.milestone.ai", compact("keyword", "list"));
    }

    public function word()
    {
        $res = Http::withToken(env("GROQ_API_KEY"))// Http::withToken(config("services.groq.key")
            ->timeout(300)
            ->post("https://api.groq.com/openai/v1/chat/completions", [
                "model" => env("GROQ_MODEL", "openai/gpt-oss-120b"),
                "messages" => [
                    [
                        "role" => "system",
                        "content" => "你是撰寫文件的助手,請用正體中文回答,請用台灣用語,不要使用Markdown符號"
                    ],
                    [
                        "role" => "user",
                        "content" => "請產出一份[如何用Laravel呼叫AI api]的說明文件,格式為word"
                    ],
                ],
            ]);

            
            $content = $res->json("choices.0.message.content") ?? "AI沒有回應";
            // 回傳的文字中有特殊字, 例如:<、>、&等, 設定特定符號自動轉換
            Settings::setOutputEscapingEnabled(true);
            $word = new PhpWord();
            // 在word中建立一個分節, 標題,文字,表格要在分節中
            $section = $word->addSection();
            // 建立標題
            $section->addTitle("AI 說明文件", 1); // 1: 標題1(最大的標題), 如果用2,則為標題2

            /*
                explode:分割字串, 字串分割後會存成陣列
                \n: 文字的換行
            */
            foreach(explode("\n", $content) as $line)
            {
                // 將每一行寫入word, name:字型, size:字體大小
                $section->addText($line, ['name' => "標楷體", 'size' => 12]);
            }

            // 儲存的資料夾及檔名, storeage_path:在Laravel專案的storeage資料夾
            $path = storage_path("app/ai_doc.docx");
            // createWriter:寫入檔案, Word2007: 輸出成.docx格式(Word2007以後的格式), save:儲存
            IOFactory::createWriter($word, "Word2007")->save($path);
            // download:下載, deleteFileAfterSend:傳送給使用者後刪除
            return response()->download($path)->deleteFileAfterSend(true);
    }
}
