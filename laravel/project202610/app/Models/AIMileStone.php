<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class AIMileStone extends Model
{
    public static function search($keyword)
    {
        $res = Http::withToken(env("GROQ_API_KEY"))
            ->timeout(60)
            ->post("https://api.groq.com/openai/v1/chat/completions", [
                "model" => env("GROQ_MODEL", "openai/gpt-oss-120b"),

                "response_format" => [
                    "type" => "json_object"
                ],

                "messages" => [
                    [
                        "role" => "user",
                        "content" => "請用繁體中文列出{$keyword}的10筆重要記事，"
                            . "由新到舊排列，請用台灣用語。"
                            . "請用JSON格式回傳："
                            . "{\"events\":[{\"year\":2026,\"title\":\"標題\",\"content\":\"內容\"}]}"
                    ],
                ],
            ]);

        // 如果 API 呼叫失敗
        if ($res->failed()) {

            // 將錯誤訊息寫入 Laravel log
            Log::error("Groq API 呼叫失敗", [
                "status" => $res->status(),
                "response" => $res->body()
            ]);

            return [];
        }

        // 取得 AI 回傳的文字內容
        $content = $res->json("choices.0.message.content");

        // 檢查是否有取得內容
        if (empty($content)) {
            Log::error("Groq API 沒有回傳內容", [
                "response" => $res->body()
            ]);

            return [];
        }

        // 將 JSON 字串轉換成 PHP 陣列
        $data = json_decode($content, true);

        // 檢查 JSON 是否解析成功
        if (json_last_error() !== JSON_ERROR_NONE) {

            Log::error("JSON 解析失敗", [
                "error" => json_last_error_msg(),
                "content" => $content
            ]);

            return [];
        }

        // 回傳 events 陣列
        return $data["events"] ?? [];
    }
}
