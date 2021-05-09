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

Route::get('/mael', 'App\Http\Controllers\pageController@liste');

Route::get('/les_villes/{nom_departement}', 'App\Http\Controllers\pageController@les_villes')->name('les_villes');

Route::get('/rues/{ville}', 'App\Http\Controllers\pageController@la_rue')->name('rues');

Route::get('/DVF/{ville}/{rue}', 'App\Http\Controllers\pageController@dvf')->name('dvf');

route::get('/departements/{nom_departement}', 'App\Http\Controllers\pageController@afficher')->name('nom_departement');







Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
