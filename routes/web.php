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

Route::pattern('slug','(.*)');
Route::pattern('id','([0-9]*)');

Route::group(['namespace' => 'Danabus'], function(){
	
	Route::get('/','NewsController@index');

	Route::get('/tuyen','RoutesController@index');

	Route::get('/tuyen/{id}', 'RoutesController@show');

	Route::get('/danhmuc/{id}', 'CategoryController@show');

	Route::get('/tintuc/{id}', 'NewsController@show');
	
	

	
});
