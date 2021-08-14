<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

/* Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
}); */


Route::get('/campanias', 'App\Http\Controllers\CampaniaController@index'); //mostrar todos los registros
Route::post('/campanias', 'App\Http\Controllers\CampaniaController@store'); //crear un registro
Route::put('/campanias/{id}', 'App\Http\Controllers\CampaniaController@update'); //actualizar un registro
Route::delete('/campanias/{id}', 'App\Http\Controllers\CampaniaController@destroy'); //actualizar un registro
