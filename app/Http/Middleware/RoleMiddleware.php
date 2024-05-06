<?php

namespace App\Http\Middleware;

use Illuminate\Support\Facades\Auth;
use Closure;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $role)
    {
        if (is_null(Auth::user())) {
            return redirect()->route('login');
        }
        $role_request = array_slice(func_get_args(), 2)[0];
        $role_auth = Auth::user()->role->slug;
        if ($role_request === $role_auth) {
            return $next($request);
        } else {
            return redirect()->route("dashboard.$role_auth.index");
        }
    }
}
