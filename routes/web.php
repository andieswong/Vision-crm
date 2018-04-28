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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/Acerca', 'webcontroller@about');

Route::get ('/Contacto', 'webcontroller@contacto');

Route::get ('/Leads', 'leadscontroller@leadsview');

Route::get ('/Agentes', 'usercontroller@agentstable');

Route::get ('/Dialer', 'admincontroller@dialerview');

Route::get ('/Admin', 'admincontroller@admintools');

Route::get ('/Ajustes', 'admincontroller@ajustesview');

Route::get ('/Do_Request', 'admincontroller@doreq');

Route::get ('/Agentes/Ver/{user}', 'usercontroller@agentsview');

Route::get ('/Leads/Nuevo lead', 'leadscontroller@viewnewlead');


