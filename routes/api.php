<?php

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

use Illuminate\Support\Facades\Route;

Route::get('/people', 'People@getPeople');
Route::post('/people', 'People@createPeople')->middleware(
    'namejoiner',
    'ipaddress',
    'emailextractor'
);
Route::delete('/people/{id}', 'People@deletePeople');
