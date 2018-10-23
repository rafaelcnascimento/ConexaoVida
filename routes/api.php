<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/doacoes', 'PedidosController@apiIndex')->middleware('auth:api');
Route::get('/doacao/{pedido}', 'PedidosController@apiShow');
Route::get('/doacao-cadastrar', 'PedidosController@apiCreate');
Route::post('/doacao', 'PedidosController@apiStore');

Route::get('/registrar', 'UsersController@apiCreate');
Route::post('/registrar', 'UsersController@apiStore');

