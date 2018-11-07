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
Route::get('/registrar', 'UsersController@create');
Route::get('/doacao/{pedido}', 'PedidosController@show');
Route::get('/resgatar-senha', 'Auth\ForgotPasswordController@showLinkRequestForm');
Route::post('/resgatar-senha', 'Auth\ForgotPasswordController@sendResetLinkEmail');
Route::post('/registrar', 'UsersController@store');
Route::get('/login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('/login', 'Auth\LoginController@login');

Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm');
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.reset');


Route::group(['middleware' => 'auth'], function ()
{
    //Rotas user
    Route::get('/meus-dados', 'UsersController@show');
    Route::get('/mudar-senha', 'UsersController@password');
    Route::get('/logout','Auth\LoginController@logout');
    Route::get('/meus-dados', 'UsersController@show');
    Route::patch('/user/{user}', 'UsersController@update');
    Route::patch('/mudar-senha', 'UsersController@updatePassword');
    //Rotas pedido
    Route::get('/meus-pedidos', 'PedidosController@indexUser');
    Route::get('/doacao-cadastrar', 'PedidosController@create');
    Route::get('/editar-doacao/{pedido}', 'PedidosController@edit');
    Route::post('/doacao', 'PedidosController@store');
    Route::patch('/doacao/{pedido}', 'PedidosController@update');

});

















