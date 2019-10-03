<?php

namespace Tests\Unit;

use App\Http\Middleware\IpAddress;
use App\Http\Middleware\NameJoiner;
use Illuminate\Http\Request;
use Tests\TestCase;

class IpAddressTest extends TestCase
{
    public function testIpKeyIsSet()
    {
        $mw = new IpAddress();

        $mw->handle(new Request(), function(Request $result) {
            $this->assertTrue($result->has('ip'));

            return function() {};
        });
    }
}
