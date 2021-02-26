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
 
Route::get('/{any}', function () {
    return view(' main');
})->where('any','.*');

/* Route::get('/{any}', 'SpaController@index')->where('any', '.*');
 */
/*  

Route::get('/{catchall?}', function () {
    return response()->view('index');
})->where('catchall', '(.*)');



// Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

Route::get('/about', 'HomeController@about')->name('about');

Route::get('/login','HomeController@login')->name('login');

*/