<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class IpAddress
{
    public function handle(Request $request, Closure $next): Closure
    {
        $request->offsetSet('ip', $request->getClientIp());

        return $next($request);
    }
}
