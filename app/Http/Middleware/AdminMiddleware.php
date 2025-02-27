<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        // Si l'utilisateur n'est pas authentifié, redirige-le
        if (!auth()->check()) {
            return redirect()->route('login'); // Ou une autre route
        }

        return $next($request);
    }
}


