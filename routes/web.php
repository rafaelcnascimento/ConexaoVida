<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|p
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'PedidosController@index');
Route::get('/como-funciona', 'HomeController@comoFunciona');
Route::get('/sobre', 'HomeController@sobre');

Route::get('/doacoes', 'PedidosController@index');
Route::get('/meus-pedidos', 'PedidosController@indexUser');
Route::get('/doacao/{pedido}', 'PedidosController@show');
Route::get('/doacao-cadastrar', 'PedidosController@create');
Route::get('/editar-doacao/{pedido}', 'PedidosController@edit');

Route::post('/doacao', 'PedidosController@store');

Route::get('/doar', 'UsersController@donate');
Route::get('/meus-dados', 'UsersController@show');
Route::get('/registrar', 'UsersController@create');
Route::get('/meus-dados', 'UsersController@show');
Route::get('/mudar-senha', 'UsersController@password');

Route::post('/registrar', 'UsersController@store');
Route::patch('/user/{user}', 'UsersController@update');
Route::patch('/doacao/{pedido}', 'PedidosController@update');
Route::patch('/mudar-senha', 'UsersController@updatePassword');



Route::get('/login', 'Auth\LoginController@showLoginForm')->name('login');
Route::get('/logout','Auth\LoginController@logout');
Route::post('/login', 'Auth\LoginController@login');

//t
