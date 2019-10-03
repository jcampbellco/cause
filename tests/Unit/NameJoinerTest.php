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
            $this->assertObjectHasAttribute('name', $result->data[0]);
        });
    }

    public function testNameIsJoinedCorrectly()
    {
        $nameJoiner = new NameJoiner();

        $nameJoiner->handle($this->getValidRequest(), function($nextRequest) {
            $this->assertEquals('Foo Bar', $nextRequest->data[0]->name);
        });

    }

    private function getValidRequest(): Request
    {
        $data = new \stdClass;

        $data->first_name = 'Foo';
        $data->last_name  = 'Bar';

        return new Request([
            'data' => [
                $data
            ]
        ]);
    }
}
