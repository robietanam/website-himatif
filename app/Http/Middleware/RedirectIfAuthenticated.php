<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::guard($guard)->check()) {
            $role = Auth::user()->role->id;
            switch ($role) {
                case '1':
                    return redirect()->route('dashboard.admin.users.index');
                    break;
                default:
                    return redirect()->route('dashboard.admin.pengurus.index');;
                    break;
            }
        }

        return $next($request);
    }
}
