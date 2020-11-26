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
/*
Route::get('/', function () {
    return view('guest.index', ["products"=>App\Products::where("image", "<>", null)->get()]);
});*/

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
/*//Task6
Route::get('/home', 'HomeController@index')->name('home');

Route::get('/home/create', "ProductsController@create")->name("addproductpage");

Route::post('/home/store', "ProductsController@store")->name("userstore");
Route::post('/home/destroy', "ProductsController@destroy")->name("userdestroy");
Route::get('/home/edit{id}', "ProductsController@edit")->name("useredit");
Route::post('/home/update', "ProductsController@update")->name("userupdate");


//Task7
Route::get('/get_numbs',"ProductsController@get_phone");
Route::get('/Posts',"ProductsController@PostsWithComments");
Route::get('/usersprojects',"ProductsController@get_usersProjects");*/

//Task8
Route::get("/addnews","AdminController@create");
Route::get("/guestnews","AdminController@index")->name("index");
Route::post("/news","AdminController@store")->name("createnews");
Route::post("/news/delete", "AdminController@destroy")->name("delete");
Route::get("/news/edit/{id}","AdminController@edit")->name("edit");
Route::post("/news/update","AdminController@update")->name("update");

/*Route::get("admin/create/product","PhotoController@create")->name("admincreateproduct");
Route::post("admin/store/product","PhotoController@store")->name("admincreateproduct");*/