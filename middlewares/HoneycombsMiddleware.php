<?php

namespace RomanPavliukov\Honeycombs\Middlewares;

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
        if (0) {
            return "permission denied. fuck you.";
        }
        return $next($request);
    }
}
