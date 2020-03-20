<?php

/*
| Web Routes
|--------------------------------------------------------------------------
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


Route::get('/DemandeMedicaments', 'PharmacieController@getListVille'); 
Route::resource('demandeMedicaments', 'DemandeController');
Route::get('/ListeDemandes', 'DemandeController@getListDemandeByIdPharmacie');
Route::get('/viewCin/{name}', 'DemandeController@getCin');
Route::get('/viewOrdonnance/{name}', 'DemandeController@getOrdonnance');

Route::get('/deleteDemande/{id}', 'DemandeController@deleteDemande'); 
Route::get('/validateDemande/{id}', 'DemandeController@validateDemande'); 

Route::get('/Contact', function(){
	return view('Contact'); 
});
Route::resource('contact', 'ContactController');
Route::get('/mademande', function(){
	return view('mademande'); 
}); 
 

