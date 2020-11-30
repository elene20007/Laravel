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

/*Route::get('/', function () {
    return view('welcome');
});*/



/*Route::get('/admin/create', "BooksController@create")->name("admincreate");

Route::post('/admin/store', "BooksController@store")->name("adminstore");

Route::get('/admin/index', "BooksController@index")->name("adminindex");

Route::post("/admin/destroy", "BooksController@destroy")->name("admindestroy");

Route::get("/admin/show/{id}", "BooksController@show")->name("adminshow");*/

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/single/{id}', 'ProductsController@single')->name('single');
Route::get('/', 'ProductsController@index');
Route::post('/createProduct','ProductsController@create')->name('create');
Route::get('/search','ProductsController@search');
Route::get('/products', 'ProductsController@products')->name('productsPage');
Route::get('/products/{id}', 'ProductsController@productsFilter')->name('productsPageFilter');
Route::get('/edit/{id}', 'ProductsController@edit')->name('edit');
Route::post('/update/{id}','ProductsController@update')->name('update');
Route::post('/delete','ProductsController@destroy')->name('destroy');
