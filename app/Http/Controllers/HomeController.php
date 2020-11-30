<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\categories;
use App\products;
use Illuminate\Support\Facades\Input;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $products=products::get();
        $categories=categories::get();
        return view('home',['categories'=>$categories, 'products'=>$products]);
    }
    public function single()
    {
        return view('single');
    }
}
