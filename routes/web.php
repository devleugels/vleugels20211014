<?php

use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\VraagController;

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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

/*** vraag *****/
Route::resource('vraag', App\Http\Controllers\VraagController::class); 

Route::get('/test', function() {
    echo("Je heb op de knop gedrukt");
    dd("hier stop ik");
});
