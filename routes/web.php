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
    return view('portada.welcome');
});


Route::get('/Acerca', 'webcontroller@about');
Route::get('/Contacto', 'webcontroller@contacto');


Auth::routes();
Route::get('/home', 'HomeController@index')->name('home')->middleware('auth', 'level');

Route::get('/Dialer', 'admincontroller@dialerview')->middleware('auth');
Route::get('/Admin', 'admincontroller@admintools')->middleware('auth', 'level');
Route::get('/Ajustes', 'admincontroller@ajustesview')->middleware('auth', 'level');
Route::get('/Do_Request', 'admincontroller@doreq')->middleware('auth', 'level');


Route::get('/Agentes', 'usercontroller@agentstable')->middleware('auth', 'level');
Route::get('/Agentes/Agregar', 'usercontroller@addagentindex')->middleware('auth', 'level');
Route::post('/Agentes/Agregar', 'usercontroller@addagentcreate')->middleware('auth', 'level');
Route::post('/Agentes/Eliminar/{user}', 'usercontroller@destroyagent')->middleware('auth', 'level');

Route::get('/Ajustes/Puestos', 'ajustescontroller@puestosindex')->middleware('auth', 'level');
Route::get('/Ajustes/Puestos/Agregar', 'ajustescontroller@agregarpuestoindex')->middleware('auth', 'level');
Route::post('/Ajustes/Puestos/Agregar', 'ajustescontroller@agregarpuestocreate')->middleware('auth', 'level');

Route::get('/Ajustes/Equipos', 'ajustescontroller@equiposindex')->middleware('auth', 'level');
Route::get('/Ajustes/Equipos/Agregar', 'ajustescontroller@agregarequipoindex')->middleware('auth', 'level');
Route::post('/Ajustes/Equipos/Agregar', 'ajustescontroller@agregarequipocreate')->middleware('auth', 'level');

Route::get('/Ajustes/Niveles', 'ajustescontroller@nivelesindex')->middleware('auth', 'level');
Route::get('/Ajustes/Niveles/Agregar', 'ajustescontroller@agregarnivelindex')->middleware('auth', 'level');
Route::post('/Ajustes/Niveles/Agregar', 'ajustescontroller@agregarnivelcreate')->middleware('auth', 'level');
Route::get('/Ajustes/Niveles/{nivel}', 'ajustescontroller@nivel')->middleware('auth', 'level');


Route::post('/Leads/Seguir/{lead}', 'leadscontroller@addfollow')->middleware('auth');
Route::post('/Leads/DejardeSeguir/{lead}', 'leadscontroller@unfollow')->middleware('auth');
Route::post('/Leads/Nuevo comment', 'leadscontroller@addnewcomment')->middleware('auth');
Route::get('/Leads/Nuevo lead', 'leadscontroller@viewnewlead')->middleware('auth');
Route::post('/Leads/Nuevo lead', 'leadscontroller@addnewlead')->middleware('auth');
Route::get('/Leads/Ver/{lead}', 'leadscontroller@leadview')->middleware('auth');
Route::post('/Leads/Ver/{lead}', 'leadscontroller@comment')->middleware('auth');
Route::get('/Leads', 'leadscontroller@leadsview')->middleware('auth');
Route::get('/Leads/Ver/{lead}/Seguimiento', 'leadscontroller@follows')->middleware('auth');
Route::post('/Lead/Remove/Comment/{commentid}', 'leadscontroller@destroycomment')->middleware('auth');

Route::get('/Prefijos', 'PrefijoController@Prefijosview')->middleware('auth');
Route::get('/Prefijos/Nuevo prefijo', 'PrefijoController@viewnewprefix')->middleware('auth');
Route::post('/Prefijos/Nuevo prefijo/Agregar', 'PrefijoController@addnewprefix')->middleware('auth');
Route::get('/Prefijos/Ver/{prefijo}', 'PrefijoController@prefixview')->middleware('auth');
Route::post('/Prefijo/Reporte', 'PrefijoController@report')->middleware('auth');

Route::get('/Contactos', 'ContactController@index')->middleware('auth');
Route::get('/Contactos/Nuevo Contacto', 'ContactController@add')->middleware('auth');
Route::post('/Contactos/Nuevo contacto/Agregar', 'ContactController@store')->middleware('auth');
Route::post('/Contactos/Remove/Comment/{commentid}', 'ContactController@destroy')->middleware('auth');

Route::get('/Sms/New/Contact/{contactid}', 'SmsController@index');
Route::post('/Sms/New/Contact/{contactid}', 'SmsController@send');
Route::post('/Sms/New/Contact/Crear', 'SmsController@send');

Route::get('/Call', 'CallController@callindex');


Route::post('/Notification', 'leadscontroller@createnotification')->middleware('auth');
Route::get('/Notifications', 'leadscontroller@center')->middleware('auth');
Route::post('/Notifications/Estado/{notificationid}', 'leadscontroller@updatenotification')->middleware('auth');
Route::post('/Notifications/Remove/{id}', 'leadscontroller@destroynotification')->middleware('auth');

Route::get('/Telefono', 'admincontroller@telview')->middleware('auth');

Route::get('/Agentes/Ver/{user}', 'usercontroller@agentsview')->middleware('auth');
Route::get('/Agentes/Ver/{user}/Siguiendo', 'usercontroller@followsview')->middleware('auth');

Route::get('/Areadetrabajo', 'agentcontroller@indexview')->middleware('auth');

Route::get('/api/notifications', 'usercontroller@notifications')->middleware('auth');
Route::get('/api/notifications/count', 'usercontroller@notificationscount')->middleware('auth');
Route::post('/api/sms', 'SmsController@in');
Route::get('/api/sms', 'SmsController@in');
Route::get('/api/call', 'CallController@call');
Route::post('/api/call', 'CallController@call');

Route::get('/api/callxml', 'CallController@api');
Route::post('/api/callxml', 'CallController@api');

Route::post('/api/contact/status', 'ContactController@status');
