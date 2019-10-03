<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class People extends Controller
{
    public function getPeople()
    {
        return \App\People::all();
    }

    public function createPeople(Request $request)
    {
        $people = new \App\People($request->all());

        $people->save();

        return $people;
    }
}
