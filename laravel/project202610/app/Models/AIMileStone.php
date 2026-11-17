<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Http;

class AIMileStone extends Model
{
    public static function search($keyword)
    {
        $res = Http::withToken(env("GROQ_API_KEY"))
            ->timeout(60)
            ->post("https://api.groq.com/openai/v1/chat/completions", [
                "model" => env("GROQ_MODEL", "openai/gpt-oss-120b"),
                "response_format" => ["type" => "json_object"],
                "messages" => [
                    [
                        "role" => "user",
                        "content" => "請用繁體中文列出{$keyword}的10筆重要記事,由新到舊排列,請用台灣用語。"
                            . "請用json格式:{\"envents\":[{\"year\":2026,\"title\"標題\",\"content\":\"內容\"}]}"
                    ],
                ],
            ]);

        //如果呼叫失敗
        if ($res->failed()) {
            //回傳空陣列
            return [];
        }

        $content = $res->json("choices.0.message.content");

        $data = json_decode($content,true);

        return $data["envent"]??[];
    }
}
