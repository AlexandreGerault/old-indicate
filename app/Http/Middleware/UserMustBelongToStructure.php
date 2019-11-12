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
        if (Auth::check() && ! Auth::user()->hasStructure()) {
            return redirect()
                ->route('user.show', ['user' => Auth::user() ])
                ->with(
                    'error',
                    __('Vous n\'appartenez à aucune structure.
                    Veuillez d\'abord en rejoindre une ou bien en créer une.')
                );
        }

        return $next($request);
    }
}
