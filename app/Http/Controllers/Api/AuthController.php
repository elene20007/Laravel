<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Auth;

class AuthController extends Controller
{
    public function register(Request $request){
        $validateData = $request -> validate([
            "name"=>"required|string|max:20",
            "email" =>"required|email|max:50|unique:users",
            "password"=>"required|string|min:8|confirmed"
        ]);
        $validateData['password']=bcrypt($request->password);
        $user= User::create($validateData);
        $accessToken= $user->createToken("authToken")->accessToken;
        return response(["user"=>$user,"access_token"=>$accessToken]);
    }
    public function login(Request $request){
        $loginData=$request->validate([
            "email"=>"required|email",
            "password"=>"required",
        ]);
        if (!auth()->attempt($loginData)){
            return response([
                "message"=>"Invalid Conditionals"]);
        }
        $accessToken=auth::user()->createToken("authToken")->accessToken;
        return response([
            "user"=>auth()->user(),
            "access_token"=>$accessToken
        ]);
    }
}