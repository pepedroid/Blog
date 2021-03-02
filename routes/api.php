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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::apiResource('post', 'PostController')->middleware('auth:sanctum');

// Users Auth
/**
 * Define 4 rutas, asignando a todas un prefijo "auth".
 * Las 2 primeras rutas son públicas, y las 2 siguientes requieren de autenticación.
 */
Route::group([
    'prefix' => 'auth'],
    function () {
    Route::post('login', 'AuthController@login');
    Route::post('signup', 'AuthController@signUp');

    Route::group([
        'middleware' => 'auth:sanctum'],
        function () {
        Route::get('logout', 'AuthController@logout');
        Route::get('user', 'AuthController@user');
    });
});
