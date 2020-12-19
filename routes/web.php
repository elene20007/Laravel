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
Route::get('/home/create', "ProductsController@create")->name("addproductpage")->middleware("admin");
Route::post('/home/store', "ProductsController@store")->name("userstore")->middleware("admin");
Route::post('/home/destroy', "ProductsController@destroy")->name("userdestroy")->middleware("admin");
Route::get('/home/edit{id}', "ProductsController@edit")->name("useredit")->middleware("admin");
Route::post('/home/update', "ProductsController@update")->name("userupdate")->middleware("admin");
Route::get('/home/single{id}', "ProductsController@show")->name("singleProduct");


Route::get('/home/stores', 'StoresController@index')->name('stores');
Route::get('/home/createStore', "StoresController@create")->name("addstorepage")->middleware("admin");
Route::post('/home/storeStore', "StoresController@store")->name("userstoreStore")->middleware("admin");
Route::post('/home/destroyStore', "StoresController@destroy")->name("userdestroyStore")->middleware("admin");
Route::get('/home/edit/store/{id}', "StoresController@edit")->name('editstore')->middleware("admin");
Route::post('/home/updateStore', "StoresController@update")->name("userupdateStore")->middleware("admin");
Route::get('/home/single/store{id}', "StoresController@show")->name("singleStore");

Route::get('/error', function(){
	return view("adminError");
})->name("error");