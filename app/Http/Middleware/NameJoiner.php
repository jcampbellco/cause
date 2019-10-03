<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class NameJoiner
{
    public function handle(Request $request, Closure $next): Closure
    {
        $data = $request->offsetGet('data');

        foreach ($data as &$datum) {
            $datum['name'] = \sprintf('%s %s', $datum['first_name'], $datum['last_name']);
        }

        $request->offsetSet('data', $data);

        return $next($request);
    }
}
