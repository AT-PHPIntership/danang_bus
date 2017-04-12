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

Route::get('/home', 'HomeController@index');
Route::get('Admin/dangnhap', 'UserController@getDangnhap');
Route::post('Admin/dangnhap', 'UserController@postDangnhap');


Route::get('','Danabus\IndexController@index');
Route::get('danhmuc-{id}','Danabus\IndexController@filter');



Route::get('news/{slug}-{id}','Danabus\NewsController@news');



Route::get('tuyen',['as' => 'tuyen.content','uses' =>'Danabus\RoutesController@routes']);
Route::get('tuyen/{slug}-{id}','Danabus\RoutesController@tuyencontent');

Route::get('phanhoi','Danabus\FeedbackController@feedback');