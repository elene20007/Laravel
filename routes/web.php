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
Route::get('/products', "ProductsController@index")->name("productsPage");
Route::post('products/create','ProductsController@create')->name('create');
Route::get('products/edit/{id}', 'ProductsController@edit')->name('edit');
Route::post('products/update/{id}','ProductsController@update')->name('update');
Route::post('products/destroy/{id}','ProductsController@destroy')->name('destroy');


Route::get('products/single/{id}', "ProductsController@single")->name("single");

