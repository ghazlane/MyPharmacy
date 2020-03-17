<?php

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
    return view('Accueil');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/Accueil', function(){
	return view('Accueil');
}); 


Route::get('/DemandeMedicaments', function(){
	return view('DemandeMedicaments'); 
});


