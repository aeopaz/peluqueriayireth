<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckAutorizacion
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next, $rol1,$rol2)
    {
        if (Auth::user()->rol <> $rol1 && Auth::user()->rol <> $rol2 ) {
            return redirect('/error');
        }
        return $next($request);
    }
}
