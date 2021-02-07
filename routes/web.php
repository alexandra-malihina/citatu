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

Route::resource('/', 'AjaxCitata',['only'=>['index']]);

Route::resource('/citata','AjaxCitata',['only'=>['index','store','show']]);

Route::get('/data','CitataController@allCitats');