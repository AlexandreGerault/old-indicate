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
        if (Auth::user()->isRelatedToStructure()) {
            return redirect()->route('user.profile.show', ['id' => Auth::user()->id ])
                             ->with('flash', __('Vous appartenez déjà à une structure.'));
        }
        return $next($request);
    }
}
