<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  Request  $request
     * @param Closure $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::guard($guard)->check()) {
            if($guard == "admin") {
                return redirect()->route('backoffice.claim-demands.index');
            } else {
                return redirect()->route('user.show', ['id' => Auth::id()]);
            }
        }

        return $next($request);
    }
}
