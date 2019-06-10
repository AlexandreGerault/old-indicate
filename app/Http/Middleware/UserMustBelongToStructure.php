<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class UserMustBelongToStructure
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
                             ->with('flash', __('Vous n\'appartenez à aucune structure. Veuillez d\'abord en rejoindre une ou bien en créer une.'));
        }

        return $next($request);
    }
}
