<?php

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

Route::get('/test', function () {
    $data = '123';
    return view('test', ['data' => $data]);
});

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
    });
});


Route::post('/contact', 'IndexController@store');

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
