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
Route::get('/inicio', 'ParametrosController@portadaIni')->name('inicio');
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
Route::get('/doc/busquedacoll', 'EjemplarController@busquedaColl')->name('doc.busquedacoll');
Route::get('/doc/busquedafe', 'EjemplarController@busquedaFe')->name('doc.busquedafe');Route::get('/doc/show/{ejemplar}', 'EjemplarController@show')->name('doc.show');
Route::get('/doc/busquedauth', 'EjemplarController@busquedaAuthor')->name('doc.busquedauth');
Route::get('/doc/busquedacat', 'EjemplarController@busquedaCateg')->name('doc.busquedacat');
Route::get('/doc/show/{ejemplar}', 'EjemplarController@show')->name('doc.show');
/*Ruta para los parametros del sistema*/
Route::get('/param/showcontac', 'ParametrosController@showContac')->name('param.showcontac');
Route::get('/param/showequipo', 'ParametrosController@showEquipo')->name('param.showequipo');
