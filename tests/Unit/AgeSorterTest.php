<?php

namespace Tests\Unit;

use App\Http\Middleware\AgeSorter;
use App\Http\Middleware\EmailExtractor;
use App\Http\Middleware\IpAddress;
use App\Http\Middleware\NameJoiner;
use Illuminate\Http\Request;
use Tests\TestCase;

class AgeSorterTest extends TestCase
{
    public function testAgesGetSorted()
    {
        $mw = new AgeSorter();

        $mw->handle($this->getValidRequest(), function(Request $request) {
            dd($request);
        });
    }

    private function getValidRequest(): Request
    {
        $request = new Request();

        $request->replace([
            'data' => [
                [
                    'age' => 8,
                ],
                [
                    'age' => 99,
                ],
                [
                    'age' => 2,
                ]
            ]
        ]);

        return $request;
    }
}
