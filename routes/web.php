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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/','LandingpageController@index');

Route::get('/shop','ShopController@index');
Route::get('/cart','CartController@index');
Route::get('/shop/detail/{id}','ShopController@show');
Route::get('/shop/category/{id}','ShopController@category');
Route::post('/cart/store','CartController@store');
// Route::put/patch
Route::patch('/cart/{id}','CartController@update');
Route::post('/checkout','CheckoutController@store');

