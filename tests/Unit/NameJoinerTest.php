<?php

namespace Tests\Unit;

use App\Http\Middleware\NameJoiner;
use Illuminate\Http\Request;
use Tests\TestCase;

class NameJoinerTest extends TestCase
{
    public function testNameIsAdded()
    {
        $nameJoiner = new NameJoiner();

        $nameJoiner->handle($this->getValidRequest(), function($result) {
            $this->assertArrayHasKey('name', $result->data[0]);

            return function() {};
        });
    }

    public function testNameIsJoinedCorrectly()
    {
        $nameJoiner = new NameJoiner();

        $nameJoiner->handle($this->getValidRequest(), function($nextRequest) {
            $this->assertEquals('Foo Bar', $nextRequest->data[0]['name']);

            return function() {};
        });

    }

    private function getValidRequest(): Request
    {
        $request = new Request();

        $request->replace([
            'data' => [
                [
                    'first_name' => 'Foo',
                    'last_name' => 'Bar',
                ]
            ]
        ]);

        return $request;
    }
}
