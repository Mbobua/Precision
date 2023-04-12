<?php

namespace App\Http\Middleware;

use App\Http\Controllers\AuthController;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthNabo
{

    public function handle(Request $request, Closure $next)
    {
        if (Auth::user()->user_type === 'NaboStaff') {
            return $next($request);
        } else {
            session()->flush();
            return redirect()->route('login');
        }
    }
}
