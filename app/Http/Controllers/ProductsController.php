<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\products;
use App\subcategory;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("createProducts");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        products::create([
            "title"=>$request->input("title"),
            "description"=>$request->input("description"),
            "image"=>$request->input("image"),
            "subcategory_id"=>$request->input("subcategory_id"),
        ]);
        return redirect()->route('home');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product=products::where('id',$id)->firstOrFail();
        return view("singleProduct",["product"=>$product]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product=products::where('id',$id)->firstOrFail();
        return view("editProducts",["product"=>$product]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        products::where("id",$request->input("id"))->update([
            "title"=>$request->input("title"),
            "description"=>$request->input("description"),
            "image"=>$request->input("image"),
            "subcategory_id"=>$request->input("subcategory_id"),
            ]);
        return redirect()->route("home");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        products::where ("id",$request->input("id"))->delete();
        return redirect()->route("home");
    }
}
