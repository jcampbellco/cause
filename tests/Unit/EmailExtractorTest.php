<?php

namespace Tests\Unit;

use App\Http\Middleware\EmailExtractor;
use App\Http\Middleware\IpAddress;
use App\Http\Middleware\NameJoiner;
use Illuminate\Http\Request;
use Tests\TestCase;

class EmailExtractorTest extends TestCase
{
    public function testEmailsKeyIsSet()
    {
        $mw = new EmailExtractor();

        $mw->handle($this->getValidRequest(), function(Request $result) {
            $this->assertTrue($result->has('emails'));

            return function() {};
        });
    }

    public function testEmailsAreJoined()
    {
        $mw = new EmailExtractor();

        $mw->handle($this->getValidRequest(), function(Request $request) {
            $this->assertEquals(['foo@bar.com','bar@baz.com'], $request->get('emails'));

            return function() {};
        });
    }

    private function getValidRequest(): Request
    {
        $request = new Request();

        $request->replace([
            'data' => [
                [
                    'email' => 'foo@bar.com',
                ],
                [
                    'email' => 'bar@baz.com',
                ]
            ]
        ]);

        return $request;
    }
}
