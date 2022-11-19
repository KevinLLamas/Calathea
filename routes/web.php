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

Route::get('/inicio', function () {
    return view('Inicio');
});
Route::get('/panel', function () {
    return view('panel');
});
Route::get('/paquetes', function () {
    return view('paquetes');
});
/*Route::get('/reservacion/{paquete}', function () {
    return view('reservacion');
});*/
Route::get('/reservacion/{fecha}/{paquete}', 'ReservacionController@redireccion');


Route::post('send_email', 'ContactController@contactSubmit')->name('contact.submit');

Route::post('/login', 'UserController@login');
Route::get('/getSession', 'UserController@getSession');
Route::get('/room_chat', function () {return view('chat');});
Route::get('/get_mensajes', 'MensajeController@get_mensajes');
Route::post('/save_mensaje', 'MensajeController@save_mensaje');


Route::get('/get_paquetes', 'ReservacionController@get_paquetes');
Route::post('/get_paquete', 'ReservacionController@get_paquete');
Route::post('/get_paquete_dia', 'ReservacionController@get_paquete_dia');
Route::post('/add_reservacion', 'ReservacionController@add_reservacion');
Route::post('/get_reservacion', 'ReservacionController@get_reservacion');
Route::get('/get_reservaciones', 'ReservacionController@get_reservaciones');
Route::post('/mover_reservacion', 'ReservacionController@mover_reservacion');
Route::post('/editar_reservacion', 'ReservacionController@editar_reservacion');
Route::post('/eliminar_reservacion', 'ReservacionController@eliminar_reservacion');
Route::get('/get_reservaciones_cliente', 'ReservacionController@get_reservaciones_cliente');

