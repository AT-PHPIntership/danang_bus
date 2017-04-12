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
	Route::get('','IndexController@index');
	Route::get('tuyen/{slug}-{id}',['uses' =>'RoutesController@routescontent', 'as' => 'routes.content']);
	
	
	Route::get('tintuc/{slug}-{id}',['uses' =>'NewsController@news', 'as' => 'news.content']);

	Route::get('{slug}-{id}',[ 'uses'=>'IndexController@filter', 'as' => 'index.filter']);


	

	Route::get('tuyen',['uses' =>'RoutesController@routes','as' => 'routes.routes']);
	

	Route::get('phanhoi','FeedbackController@feedback');


	Route::get('timduong','SearchController@search');
});

