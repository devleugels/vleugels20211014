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

// origineel : Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/home', function(){
    // Hier mag je maar komen als je aangemeld bent
    if (Auth::guest()) return view('welcome'); // abort(403); 
    // Maak nu het onderscheid tussen admin en klant
    if (Auth::user()->adminlevel == 0){
        // een klant
        //   .. TODO : haal de klant_id op
        // en return naar ClientController@show -- toon de splash van de klant
        //  $client = Auth::user()->client()->first();  
          return view('welcome');
                
          //return redirect()->action('ClientController@show',['id' => $client->id]);   
    } else
         return view('adminhome'); // toon de splashscreen voor de admin
 });

 /*** Contactinfo ***/
 Route::get('/showFout',  [App\Http\Controllers\ContactinfoController::class, 'showFout'])->name('showFout');
 Route::resource('contactinfo', App\Http\Controllers\ContactinfoController::class);

/**** Contactpersoon ****/
Route::get('contactpersoon/isaanwezig', [App\Http\Controllers\ContactpersoonController::class, 'isAanwezig']);
Route::resource('contactpersoon', App\Http\Controllers\ContactpersoonController::class);

/*** Emailadressen */
Route::get('emailadressen/{emailadressen}/delete', [App\Http\Controllers\EmailadressenController::class, 'delete']);
/*Route::get('emailadressen/{id}/delete', function(){
    echo("delete");
    dd("stop");
});*/
Route::resource('emailadressen', App\Http\Controllers\EmailadressenController::class);

/*** vraag *****/
Route::resource('vraag', App\Http\Controllers\VraagController::class); 

Route::get('/test', function() {
    echo("Je heb op de knop gedrukt");
    dd("hier stop ik");
});
