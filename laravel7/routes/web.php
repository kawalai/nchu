<?php

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

Route::get('/news', 'NewsController@Index');

Route::get('/news/create', 'NewsController@Create');
Route::post('/news/store', 'NewsController@Store');

Route::get('/news/edit/{id}', 'NewsController@Edit');
Route::post('/news/update', 'NewsController@Update');

Route::post('/news/destroy', 'NewsController@Destroy');

// Route::get('/news/backend', 'NewsController@Backend');


// Route::get('/news/create', 'NewsController@Insert');
// Route::get('/news/update/{id}', 'NewsController@Update');
// Route::get('/news/delete/{id}', 'NewsController@Delete');

// Route::get('/news/content', function () {
//     return view('news.layout_02');
// });

Route::get('/news/content/{id}', 'NewsController@Detail');