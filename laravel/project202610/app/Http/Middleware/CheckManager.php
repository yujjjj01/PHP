<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckManager
{

    public function handle(Request $request, Closure $next): Response
    {
        if (empty(session()->get('userId'))) 
        {
            return redirect('/admin');
        }

        return $next($request);
    }
}
