<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthAgent
{

    public function handle(Request $request, Closure $next)
    {
        if (Auth::user()->user_type === 'Agent')
        {
            return $next($request);

        }else{
            session()->flush();
            return redirect()->route('login');
        }
    }
}
