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


Auth::routes();


Route::group(['namespace' => 'Danabus'], function(){
	Route::get('','IndexController@index');
    Route::get('danhmuc-{id}','IndexController@filter');
    Route::get('tintuc/tin-{id}','NewsController@news');
    Route::get('tuyen',['as' => 'routes.route','uses' =>'RoutesController@routes']);
    Route::get('tuyen/tuyen-{id}','RoutesController@routescontent');
    Route::get('phanhoi','FeedbackController@feedback');
    Route::get('timduong','SearchController@search');

});


