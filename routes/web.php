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


Route::get ('/Dialer', 'admincontroller@dialerview')->middleware('auth');
Route::get ('/Admin', 'admincontroller@admintools')->middleware('auth');
Route::get ('/Ajustes', 'admincontroller@ajustesview')->middleware('auth');
Route::get ('/Do_Request', 'admincontroller@doreq')->middleware('auth');
Route::get ('/Telefono', 'admincontroller@telview')->middleware('auth');

Route::get ('/Agentes/Ver/{user}', 'usercontroller@agentsview')->middleware('auth');
Route::get ('/Agentes/Ver/{user}/Siguiendo', 'usercontroller@followsview')->middleware('auth');
Route::get ('/Agentes', 'usercontroller@agentstable')->middleware('auth');
Route::get ('/Agentes/Agregar', 'usercontroller@addagentindex')->middleware('auth');
Route::post ('/Agentes/Agregar', 'usercontroller@addagentcreate')->middleware('auth');
Route::post ('/Agentes/Eliminar/{user}', 'usercontroller@destroyagent')->middleware('auth');

Route::post ('/Leads/Seguir/{lead}', 'leadscontroller@addfollow')->middleware('auth');
Route::post ('/Leads/DejardeSeguir/{lead}', 'leadscontroller@unfollow')->middleware('auth');
Route::post ('/Leads/Nuevo comment', 'leadscontroller@addnewcomment')->middleware('auth');
Route::get ('/Leads/Nuevo lead', 'leadscontroller@viewnewlead')->middleware('auth');
Route::post ('/Leads/Nuevo lead', 'leadscontroller@addnewlead')->middleware('auth');
Route::get ('/Leads/Ver/{lead}', 'leadscontroller@leadview')->middleware('auth');
Route::post ('/Leads/Ver/{lead}', 'leadscontroller@comment')->middleware('auth');
Route::get ('/Leads', 'leadscontroller@leadsview')->middleware('auth');
Route::get ('/Leads/Ver/{lead}/Seguimiento', 'leadscontroller@follows')->middleware('auth');
Route::post ('/Lead/Remove/Comment/{commentid}', 'leadscontroller@destroycomment')->middleware('auth');

Route::post ('/Notification', 'leadscontroller@createnotification')->middleware('auth');
Route::get ('/Notifications', 'leadscontroller@center')->middleware('auth');
Route::post ('/Notifications/Estado/{notificationid}', 'leadscontroller@updatenotification')->middleware('auth');
Route::post ('/Notifications/Remove/{id}', 'leadscontroller@destroynotification')->middleware('auth');

Route::get ('/Ajustes/Puestos', 'ajustescontroller@puestosindex')->middleware('auth');
Route::get ('/Ajustes/Puestos/Agregar', 'ajustescontroller@agregarpuestoindex')->middleware('auth');
Route::post ('/Ajustes/Puestos/Agregar', 'ajustescontroller@agregarpuestocreate')->middleware('auth');

Route::get ('/Ajustes/Equipos', 'ajustescontroller@equiposindex')->middleware('auth');
Route::get ('/Ajustes/Equipos/Agregar', 'ajustescontroller@agregarequipoindex')->middleware('auth');
Route::post ('/Ajustes/Equipos/Agregar', 'ajustescontroller@agregarequipocreate')->middleware('auth');

Route::get ('/Ajustes/Niveles', 'ajustescontroller@nivelesindex')->middleware('auth');
Route::get ('/Ajustes/Niveles/Agregar', 'ajustescontroller@agregarnivelindex')->middleware('auth');
Route::post ('/Ajustes/Niveles/Agregar', 'ajustescontroller@agregarnivelcreate')->middleware('auth');
Route::get ('/Ajustes/Niveles/{nivel}', 'ajustescontroller@nivel')->middleware('auth');


