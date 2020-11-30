<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Support\Facades\Hash;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string
     */
    protected function redirectTo($request)
    {
        if ($request->input("name")=='admin' and Hash::make($request->input('password'))==users::where("name",'admin')->password)
        {
            return route('Login');
        }
        else if (! $request->expectsJson()) {
            return route('login');
        }
    }
}
