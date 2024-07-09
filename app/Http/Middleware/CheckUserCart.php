<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckUserCart
{
    public function handle(Request $request, Closure $next)
    {
        if (auth('web')->check()) {
            return $next($request);
        }
        return redirect()->route('login');
    }
}