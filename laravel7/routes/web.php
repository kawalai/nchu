<?php

use Illuminate\Routing\RouteGroup;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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
    return view('index');
});

Route::get('/test/{times}', 'HomeController@test');
Route::get('/test', 'HomeController@getAllData');

Route::get('/checkout1', function () {
    return view('checkout1');
});

Route::prefix('news')->group(function () {
    Route::get('', 'NewsController@Index');
    Route::get('/content/{id}', 'NewsController@Detail');

    Route::middleware('auth')->group(function () {
        Route::get('/create', 'NewsController@Create');
        Route::post('/store', 'NewsController@Store');
        Route::get('/edit/{id}', 'NewsController@Edit');
        Route::post('/update', 'NewsController@Update');
        Route::post('/destroy', 'NewsController@Destroy');


        Route::post('/home_all_data', 'HomeController@getAllData');
        Route::post('/home_edit', 'HomeController@getModal');
        Route::post('/home_create_modal', 'HomeController@createModal');
        Route::post('/home_update', 'HomeController@homeUpdate');
        Route::post('/home_create', 'HomeController@create');
    });
});

Route::prefix('products')->group(function () {
    Route::get('', 'ProductController@index');
    Route::get('/content/{id}', 'ProductController@content');

    
});

Route::middleware('auth')->group(function(){
    Route::get('admin/product', 'ProductController@productList')->name('admin');
    Route::get('admin/product/{id}', 'ProductController@productContent')->name('prodContent');
    Route::get('admin/create', 'ProductController@create')->name('create');
    Route::post('admin/store', 'ProductController@store')->name('store');
    Route::get('admin/edit/{id}', 'ProductController@edit')->name('edit');
    Route::get('admin/update/{id}', 'ProductController@update')->name('update');
    Route::get('admininsert/{times}', 'ProductController@storetest');
});

Route::post('/contact', 'IndexController@store');

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
