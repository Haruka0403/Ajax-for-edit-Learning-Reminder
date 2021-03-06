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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');


// カテゴリーコントローラ
Route::group(['middleware' => 'auth'], function() {    
    Route::get('/', 'CategoryController@top');
    Route::post('/', 'CategoryController@create');
    Route::get('/reminder','CategoryController@remind')->name('reminder');
    // Route::get('/edit','CategoryController@edit');
    Route::post('/edit', 'CategoryController@update');
    
    // Route::get('/','CategoryController@get');
    
    Route::get('/search','CategoryController@search');
    Route::get('/archive','CategoryController@archive');
    
// リマインドコントローラ
    Route::get('/create','RemindController@add');
    Route::post('/create','RemindController@create');

});

// ajax練習
Route::get('/apiview', 'CategoryController@apiview');
Route::get('/ajax', 'CategoryController@ajax');