<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|

socialise - რეგისტრაცია სხვადასხვა სოც ქსელით

*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get("/test", function(){
	return response("Hi", 200)
	->header("Content-type","text/plain");
});

Route::post("register","Api\AuthController@register");
Route::post("login","Api\AuthController@login");
Route::get("products","Api\ProductsController@index");