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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::prefix('admin')->middleware('auth')->group(function () {
    Route::get('/', 'AdminController@index');
    Route::prefix('categories')->middleware('auth')->group(function () {
        Route::get('/', 'CategoriesController@index');
        Route::post('/', 'CategoriesController@store');
        Route::get('view/{id}', 'CategoriesController@show');
        Route::get('delete/{id}', 'CategoriesController@destroy');
        Route::get('edit/{id}', 'CategoriesController@update');
    });

    Route::prefix('store')->middleware('auth')->group(function () {
        Route::get('/','StoreController@index');
        Route::post('/','StoreController@store');
    });
});


Route::get('/home', 'HomeController@index')->name('home');
