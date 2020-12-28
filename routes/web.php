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
})->name('welcome');

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

Route::get("/sign-in/google","Auth\LoginController@google");
Route::get("sign-in/google/redirect","Auth\LoginController@google_redirect");

Route::get("/sign-in/facebook","Auth\LoginController@facebook");
Route::get("sign-in/facebook/redirect","Auth\LoginController@facebook_redirect");

Route::get('/home/create', "ProductsController@create")->name("addproductpage");
Route::post('/home/store', "ProductsController@store")->name("store");
Route::post('/home/destroy', "ProductsController@destroy")->name("destroy");
Route::get('/home/edit{id}', "ProductsController@edit")->name("edit");
Route::post('/home/update', "ProductsController@update")->name("update");
Route::get('/home/single{id}', "ProductsController@show")->name("singleProduct");
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
