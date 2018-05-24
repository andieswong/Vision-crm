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

Route::get ('/Agentes/Ver/{user}', 'usercontroller@agentsview')->middleware('auth');
Route::get ('/Agentes/Ver/{user}/Siguiendo', 'usercontroller@followsview')->middleware('auth');
Route::get ('/Agentes', 'usercontroller@agentstable')->middleware('auth');

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

Route::post ('/Notification', 'Notificationscontroller@create')->middleware('auth');
Route::get ('/Notifications', 'leadscontroller@center')->middleware('auth');
Route::post ('/Notifications/Estado/{notificationid}', 'Notificationscontroller@update')->middleware('auth');
Route::post ('/Notifications/Remove/{id}', 'Notificationscontroller@destroy')->middleware('auth');



