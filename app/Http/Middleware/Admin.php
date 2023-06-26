<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class Admin
{
    public function handle($request, Closure $next)
    {
        if (Auth::user()->role_id !== 1) {
            error_log("I'm in ");
            return redirect('/');
        }

        return $next($request);
    }
}