<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/','OtherController@home')->name('home');

Route::group(['middleware'=>'auth','prefix' => 'admin'],function ()
{
	Route::resource('/item','ItemController');
	Route::resource('/transaction','TransactionController');
	Route::get('/transactions/trans','OtherController@showTransaction');
	Route::get('/transactions/history','OtherController@showHistory');
	route::get('transactions/{id}/confirmation','TransactionController@confirmTransaction');
	route::get('transactions/confirmation/{id}/cancel','TransactionController@cancelTransaction');
	Route::get('/setting','OtherController@setting');
	Route::get('/download/web','OtherController@download');
	Route::get('/download/design','OtherController@webdownload');
});

Auth::routes();

Route::get('/home', 'HomeController@index');

