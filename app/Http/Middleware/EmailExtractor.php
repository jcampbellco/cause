<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class EmailExtractor
{
    public function handle(Request $request, Closure $next): Closure
    {
        $data = $request->offsetGet('data');

        $emails = \array_map(
            function (array $datum) {
                return $datum['email'];
            },
            $data
        );

        $request->offsetSet('emails', \implode(',', \array_unique($emails)));

        return $next($request);
    }
}
