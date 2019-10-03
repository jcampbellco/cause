<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller;

class People extends Controller
{
    public function getPeople()
    {
        return \App\People::all();
    }
}
