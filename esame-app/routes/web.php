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

Route::get('Home',"HomeController@index")->name('Home');

Route::get('/login',"LController@login")->name('login');
Route::get('/logout',"LController@logout")->name('logout');
Route::post('/login',"LController@checkLogin");

Route::get('/loginD',"LDController@login")->name('loginD');
Route::get('/logoutD',"LDController@logout")->name('logoutD');
Route::post('/loginD',"LDController@checkLogin");

Route::get('/signup',"registrazioneController@index")->name('signup');
Route::post('/signup',"registrazioneController@registrazione");

Route::get('AreaClienti',"AreaClientiController@index")->name('AreaClienti');
Route::get('AreaDipendenti',"AreaDipendentiController@index")->name('AreaDipendenti');

Route::get('contatti',"contattiController@index")->name('contatti');

Route::get('prodotti',"prodottiController@index")->name('prodotti');
Route::post('/prodotti',"prodottiController@sconto");

Route::get('dipendenti',"dipendentiController@index")->name('dipendenti');



//fetch
Route::get('Home/News',"HomeController@news");

Route::get('/AreaClienti/caricaGiochi',"AreaClientiController@giochi");
Route::get('/AreaClienti/caricaPref',"AreaClientiController@pref");
Route::get('/AreaClienti/caricaAcquisti',"AreaClientiController@caricaAcquisti");
Route::get('/AreaClienti/caricaCarrello',"AreaClientiController@caricaCarrello");
Route::get('/AreaClienti/aggCarrello/{id}',"AreaClientiController@aggCarrello");
Route::get('/AreaClienti/rimCarrello/{id}',"AreaClientiController@rimCarrello");
Route::get('/AreaClienti/aggiornaCarrello/{q}/{id}',"AreaClientiController@aggiornaCarrello");
Route::get('/AreaClienti/aggPref/{id}',"AreaClientiController@aggPref");
Route::get('/AreaClienti/rimPref/{id}',"AreaClientiController@rimPref");

Route::get('/contatti/caricaContatti',"contattiController@contatti");

Route::get('/AreaDipendenti/magazzino',"AreaDipendentiController@magazzino");

Route::get('/dipendenti/stipMedio',"dipendentiController@stipMedio");
Route::get('/prodotti/prodCostosi',"prodottiController@prodCostosi");
Route::get('/dipendenti/impiego/{sede}',"dipendentiController@impiego");

?>