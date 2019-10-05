<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AgeSorter
{
    public function handle(Request $request, Closure $next)
    {
        $data = $request->offsetGet('data');

        uasort($data, function($a1, $a2) {
            // sort the data array by age the age key in descending (<) order
            return $a1['age'] < $a2['age'];
        });

        $request->offsetSet('data', $data);

        return $next($request);
    }
}
