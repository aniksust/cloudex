<?php

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Admin\ProductController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('products', 'Admin\ProductController@index1');

Route::get('product/{id}', 'Admin\ProductController@index2');

Route::post('product', 'Admin\ProductController@index3');

Route::put('product', 'Admin\ProductController@index3');

Route::delete('product/{id}', 'Admin\ProductController@index4');
