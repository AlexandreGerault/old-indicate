<?php

namespace App\Http\Middleware;

use Closure;

class RedirectIfNotBlogger
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(!auth()->check() || auth()->check() && !auth()->user()->blogger()) {
            return redirect()->route('app.home');
        }
        return $next($request);
    }
}
