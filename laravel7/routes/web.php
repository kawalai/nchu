<?php

use GuzzleHttp\Middleware;
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

Route::get('/', 'FrontendProductController@rootIndex');

Route::get('/test/{times}', 'HomeController@test');
Route::get('/test', 'HomeController@getAllData');

Route::get('/checkout1', 'ShoppingCartController@checkout1');
Route::middleware(['auth'])->group(function () {
    Route::get('/checkout2', 'ShoppingCartController@checkout2');
    Route::get('/checkout3', 'ShoppingCartController@checkout3');
    Route::get('/checkout4', 'ShoppingCartController@checkout4');
});

Route::prefix('shopping_cart')->group(function(){
    Route::post('/add', 'ShoppingCartController@add');
    Route::get('/content', 'ShoppingCartController@content');
    Route::post('/remove_specific_product', 'ShoppingCartController@removeSpecificProduct');
    Route::post('/update_product_quantity', 'ShoppingCartController@updateProductQuantity');

    Route::middleware(['auth'])->group(function () {
        Route::post('/address', 'ShoppingCartController@paymentShipment');
        Route::post('/checkoutEnd', 'ShoppingCartController@checkoutEnd');
        
    });
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
    Route::get('', 'FrontendProductController@index')->name('products');
    Route::post('/products_type_search', 'FrontendProductController@typeSearch')->name('products.type.search');
    Route::get('/content/{id}', 'FrontendProductController@content');
});

Route::middleware('auth')->group(function () {
    Route::prefix('admin')->group(function () {
        Route::get('product', 'ProductController@productList')->name('admin');
        Route::get('product/{id}', 'ProductController@productContent')->name('prodContent');
        Route::get('create', 'ProductController@create')->name('create');
        Route::post('store', 'ProductController@store')->name('store');
        Route::get('edit/{id}', 'ProductController@edit')->name('edit');
        Route::post('update/{id}', 'ProductController@update')->name('update');
        Route::get('destroy/{id}', 'ProductController@destroy')->name('destroy');
        Route::post('fetchDestroy', 'ProductController@fetchDestroy')->name('fetchDestroy');

        Route::prefix('product_type')->group(function () {
            Route::get('', 'ProductTypeController@index')->name('product_type');
            Route::get('create', 'ProductTypeController@create')->name('product_type_create');
            Route::post('store', 'ProductTypeController@store')->name('product_type_store');
            Route::get('edit/{id}', 'ProductTypeController@edit')->name('product_type_edit');
            Route::post('update/{id}', 'ProductTypeController@update')->name('product_type_update');
            Route::get('destroy/{id}', 'ProductTypeController@destroy')->name('product_type_destroy');
        });
    });

    Route::get('admininsert/{times}', 'ProductController@storetest');
});

Route::post('/contact', 'IndexController@store');

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
