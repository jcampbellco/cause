<?php

namespace App\Http\Middleware;

use Closure;

class NameJoiner
{
    public function handle($request, Closure $next): Closure
    {
        return $next($request);
    }
}
