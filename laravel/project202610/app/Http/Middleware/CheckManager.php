<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckManager
{
    public function handle(Request $request, Closure $next): Response
    {
        // 如果取不到登時後台時,暫存的帳號, 表示沒登入過,或暫存的時間已過期
        // empty:空的  也可以用is_null
        if (empty(session()->get("userId")))
        {
            // 轉址到後台登入頁
            return redirect("/admin");
        }
        return $next($request);
    }
}
