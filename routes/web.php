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
    return view('Inicio');
});
Route::get('inicio', function () {
    return view('inicio2');
});

Route::post('send_email', 'ContactController@contactSubmit')->name('contact.submit');

Route::get('/room_chat', function () {return view('chat');});
Route::get('/get_mensajes', 'MensajeController@get_mensajes');
Route::post('/save_mensaje', 'MensajeController@save_mensaje');
Route::get('/getSession', 'UserController@getSession');
Route::post('/login', 'UserController@login');