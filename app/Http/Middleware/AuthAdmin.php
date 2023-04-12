<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthAdmin
{

    public function handle(Request $request, Closure $next)
    {
        if (Auth::user()->user_type === 'Administrator') {
            return $next($request);
        } else {
            session()->flush();
            return redirect()->route('login');
        }
    }
}
