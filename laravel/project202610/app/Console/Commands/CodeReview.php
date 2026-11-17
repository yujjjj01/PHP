<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Http;

class CodeReview extends Command
{
    protected $signature = "code:review {path=app/Http/Controllers}";
    protected $description = "用AI來檢查程式碼";

    public function handle()
    {
        $files = File::allFiles(base_path($this->argument("path")));
        $report = "";

        foreach($files as $file)
        {
            if ($file->getExtension() !== "php") continue;
            $this->info("檢查中:" .$file->getRelativePathname());
            $code = File::get($file->getRealPath());

            $res = Http::withToken(config("services.groq.key"))
            ->timeout(120)
            ->post("https://api.groq.com/openai/v1/chat/completions",[
                "model" => env("GROQ_MODEL","openai/gpt-oss-120b"),
                "messages"=>[
                    [
                        "role" => "system",
                        "content" => "你是資深Laravel工程師，審查所有程式碼，用繁體中文列出:1.問題(含行號) 2.安全性風險" ."3.修改建議與範例程式碼。如果沒有問題也要回答沒有問題，請用台灣語言",
                    ],
                    [
                        "role"=>"user",
                        "content"=>"檔案:{$file->getRelativePathname()}\n\n{$code}",

                    ],
                ],
            
            ]);

            $content = $res->json("choices.0.message.content")?? "AI沒回應";
            $report .= "##{$file->getRelativePathname()}\n\n{$content}\n\n";
            sleep(2);
        }

        File::put(storage_path("app/code_review.md"),$report);
        $this->info("檢查完成,檔案位置:storage/app/code_review.md");
    }
}
