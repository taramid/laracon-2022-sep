<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/simple', function () {
    //
    $simpleNumberGenerator = new \App\Things\Simple(to: 1_024);
    return iterator_to_array($simpleNumberGenerator->get());
})->name('simple');

Route::get('/types', function () {

    $junior = \App\Things\Age::fromSeconds(60_000);

    $elder = \App\Things\Age::fromYears(44);

    echo $junior . '<br><br>' . $elder;

    dd();
})->name('types');

Route::get('/citizens', function () {

    $raven = new \App\Things\Citizen('Robert', \App\Things\Critter::RAVEN, years: 14);

    echo $raven;

    dd();
})->name('citizens');
