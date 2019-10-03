<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        DB::table('people')->insert([
            'emails' => json_encode([
                'codyduder@causelabs.com',
                'lindaladee@causelabs.com',
            ]),
            'data' => json_encode([
                [
                    'first_name' => 'ladee',
                    'last_name'  => 'linter',
                    'name'       => 'ladee linter',
                    'age'        => 99,
                    'email'      => 'lindaladee@causelabs.com',
                    'secret'     => 'cmVzb3VyY2UgdmlvbGF0aW9u',
                ],
                [
                    'first_name' => 'cody',
                    'last_name'  => 'duder',
                    'name'       => 'cody duder',
                    'age'        => '38',
                    'email'      => 'codyduder@causelabs.com',
                    'secret'     => 'VXNlIHRoaXMgc2VjcmV0IHBocmFzZSBzb21ld2hlcmUgaW4geW91ciBjb2RlJ3MgY29tbWVudHM=',
                ],
            ]),
            'request_ip' => '127.0.0.1',
        ]);
    }
}
