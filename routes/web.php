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
Route::get('/products/createPage', function () {
	return view('create');
})->name('createPage');
Route::get('/categories/', function () {
	return view('categoriesPage');
})->name('categoriesPage');
Route::post('/categories/create','ProductsController@createCategory')->name('createCategory');
Route::post('/categories/destroy','ProductsController@destroyCategory')->name('destroyCategory');

Route::post('products/create','ProductsController@create')->name('create');
Route::get('products/edit/{id}', 'ProductsController@edit')->name('edit');
Route::post('products/update/{id}','ProductsController@update')->name('update');
Route::post('products/destroy','ProductsController@destroy')->name('destroy');

Route::get('products/single/{id}', "ProductsController@single")->name("single");

Route::post('products/single/comments', "CommentsController@create")->name("addComment");
Route::post('products/comments', "CommentsController@destroy")->name("destroyComment");


