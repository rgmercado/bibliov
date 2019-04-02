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
/*Ruta por defecto en la raiz*/
Route::get('/', function () {
    return view('portadaini');
});
/* Ruta a la portada Inicial de la aplicacion*/
Route::get('portadaini', 'PortadaIniController@portadaIni');
/* Ruta para mostar el documento*/
Route::resource('document', 'DocumentoController');
/* Ruta para el recurso Documentourl*/
Route::resource('documenturl', 'DocumentourlController');
/* Ruta para el recurso Roles de Usuario*/
Route::resource('roles', 'RoleController');

/*Ruta para autenticacion de usuarios*/
Auth::routes();
Route::get('/index', 'Auth\UserController@index')->name('users.index');
Route::get('/show/{user}', 'Auth\UserController@show')->name('users.show');
Route::get('/edit/{user}/edit', 'Auth\UserController@edit')->name('users.edit');
Route::put('/update/{user}', 'Auth\UserController@update')->name('users.update');
Route::delete('/register/{user}', 'Auth\RegisterController@destroy')->name('users.destroy');
Route::get('/home', 'Auth\UserController@index')->name('home');


/*Ruta para las busquedas de ejemplares de base de datos remota*/
Route::get('/doc/busquedagral', 'EjemplarController@busquedaGral')->name('doc.busquedagral');
Route::get('/doc/show/{ejemplar}', 'EjemplarController@show')->name('ejemplar.show');
Route::get('/ejemplar/show/{ejemplar}', 'EjemplarController@show')->name('ejemplar.show');
