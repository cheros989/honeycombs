<?php

namespace RomanPavliukov\Honeycombs\Http\Middlewares;

use Illuminate\Support\Facades\Auth;
use Closure;

class HoneycombsMiddleware
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
        if (!Auth::check()) {
            return redirect()->route('honey_login_view');
        }

        return $next($request);
    }
}
