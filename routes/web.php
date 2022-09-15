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
