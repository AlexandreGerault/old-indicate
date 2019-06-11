<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class UserDoesntBelongStructure
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
        if (Auth::user()->hasStructure()) {
            return redirect()->route('user.profile.show', ['id' => Auth::user()->id ])
                             ->with('error', __('Vous appartenez déjà à une structure.'));
        }
        return $next($request);
    }
}
