<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfCompanyNotAuthenticated
{

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = 'company')
    {
        // dd(Auth::guard());
        if (!Auth::guard($guard)->check()) {
            return redirect('/login');
        }
        return $next($request);
    }

}
