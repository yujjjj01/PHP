<?php

namespace App\Models\Product;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Http;

class AiProduct extends Model
{
    public static function suggest(string $product_name, string $title, string $content)
    {
        $apiKey = config("services.groq.key");

        if (empty($apiKey)) {
            return ["error" => "尚未設定 GROQ_API_KEY，請在 .env 設定 Groq API Key"];
        }

        $prompt = "你是一個電商商品人員，請依照下列產品資料，用繁體中文(台灣用語)建議更吸引人的產品標題及內容。\n"
            . "規則:\n"
            . "1.標題:一句話，30字以內，請說出產品最大的賣點。\n"
            . "2.內容:150 到 300 字，分 2 到 4 段，段落之間用換行分開，不要用 html 或 Markdown 符號。\n"
            . "3.只能根據提供的資料潤飾，不要捏造規格、數字或認證。\n"
            . "4.只回傳json格式:{\"title\":\"建議標題\",\"content\":\"建議內容\"}\n\n"
            . "產品名稱:{$product_name}\n"
            . "目前標題:{$title}\n"
            . "目前內容:{$content}";

        $res = Http::withToken($apiKey)
            ->timeout(60)
            ->post("https://api.groq.com/openai/v1/chat/completions", [
                "model" => config("services.groq.model"),
                "response_format" => ["type" => "json_object"],
                "messages" => [
                    [
                        "role" => "user",
                        "content" => $prompt
                    ],
                ],
            ]);

        if ($res->failed()) {
            return ["error" => "AI 呼叫失敗(".$res->status().")，請稍後再試"];
        }

        $text = $res->json("choices.0.message.content");
        $data = json_decode($text,true);

        if(empty($data["title"]) && empty($data["content"]))
            {
                return ["error" => "AI回傳資料無法解析，請再試一次"];
            }

            return[
                "title" =>$data["title"]?? "",
                "content" => $data["content"] ?? ""

            ];

    }
}
