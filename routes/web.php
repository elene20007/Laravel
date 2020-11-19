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

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/home/create', "ProductsController@create")->name("addproductpage");

Route::post('/home/store', "ProductsController@store")->name("userstore");
Route::post('/home/destroy', "ProductsController@destroy")->name("userdestroy");
Route::get('/home/edit{id}', "ProductsController@edit")->name("useredit");
Route::post('/home/update', "ProductsController@update")->name("userupdate");