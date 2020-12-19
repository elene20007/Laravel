<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\product;
use App\store;

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
        return view("create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        product::create([
            "name"=>$request->input("name"),
            "status"=> 1,
            "description"=>$request->input("description"),
            "store_id"=>1
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $Products=product::where('id',$id)->firstOrFail();
        return view("products.edit",["Products"=>$Products]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        product::where("id",$request->input("id"))->update([
            "name"=>$request->input("name"),
            "status"=> 1,
            "description"=>$request->input("description"),
            "store_id"=>1
            ]);
        return redirect()->route("home");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        product::where ("id",$request->input("id"))->delete();
        return redirect()->back();
    }
}
