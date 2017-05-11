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




Route::group(['namespace' => 'Admin', 'middleware'=>'auth','prefix' => 'admin'], function () {
    Route::get('/home', 'AdminController@index');
    Route::resource('/categories', 'CategoryController', ['as' => 'admin']);
    Route::resource('/routes', 'RouteController', ['as' => 'admin', 'except' => 'show']);
    Route::resource('/news', 'NewsController', ['as' => 'admin']);
    Route::resource('/users', 'UserController', ['as' => 'admin', 'except' => 'show']);
    Route::resource('stops', 'StopController', ['as' => 'admin']);
    Route::resource('/feedbacks', 'FeedbackController', ['as' => 'admin', 'except' => ['show','create']]);
});
Route::group(['namespace' => 'Admin', 'prefix' => 'admin'], function () {
    Route::Auth();
});

Route::group(['namespace' => 'Danabus'], function () {
    Route::get('/', 'IndexController@index');
    Route::resource('/categories', 'CategoryController');
    Route::resource('/news', 'NewsController');
    Route::get('/routes', 'RouteController@index');
    Route::get('/routes/{id}', 'RouteController@show');
});
