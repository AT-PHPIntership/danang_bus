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



Route::group(['namespace' => 'Admin', 'prefix' => 'admin'], function () {
    Route::get('/home', 'AdminController@index');
    Route::resource('/categories', 'CategoryController', ['as' => 'admin']);
    Route::Auth();
});
Route::get('/home', 'HomeController@index');

Route::group(['namespace' => 'Danabus'], function () {
    Route::get('/', 'IndexController@index');
    Route::resource('/categories', 'CategoryController');
    Route::resource('/news', 'NewsController');
});
