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

Route::resource('novedad', 'NovedadController');

Route::resource('tarea_sarec', 'TareaActController', ['only' => ['store']]);

Route::resource('hisver', 'HisVerController');

Route::get('historial_versiones', 'HisVerController@getHisVer');

Route::get('tarea_sarec/{desde}/{hasta}', 'TareaActController@getTareaSarec');

Route::post('existeactualizaciones', 'TareaActController@ExisteActualizaciones');