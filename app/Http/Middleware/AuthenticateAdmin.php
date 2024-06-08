<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class AuthenticateAdmin
{
    public function handle($request, Closure $next, ...$guards)
    {
        if (!Auth::guard('admin')->check()) {
            return redirect()->route('login');
        }

        return $next($request);
    }
}
