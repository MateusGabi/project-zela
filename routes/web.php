<?php

use App\Http\Controller\CompraController;

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

Auth::routes();

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', 'HomeController@index')->name('home');

// Purchase -> Compra
Route::get('/purchase', 'CompraController@index')->name('purchase.index');
Route::get('/purchase/foo/{id}', 'CompraController@foo');

// Product -> Produto
Route::get('/product', 'ProductController@index')->name('product.index');
