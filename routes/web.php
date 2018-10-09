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

Route::get('/', 'HomeController@index');
Route::get('/como-funciona', 'HomeController@comoFunciona');

Route::get('/doacoes', 'PedidosController@index');
Route::get('/doacao-cadastrar', 'PedidosController@create');
Route::post('/doacao', 'PedidosController@store');

Route::get('/registrar', 'UsersController@create');
Route::post('/registrar', 'UsersController@store');

Route::get('/login', 'Auth\LoginController@showLoginForm');
Route::post('/login', 'Auth\LoginController@login');
