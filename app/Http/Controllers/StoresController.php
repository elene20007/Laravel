<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\product;
use App\store;

class StoresController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("stores");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("createStore");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        store::create([
            "store_name"=>$request->input("store_name"),
            "store_location"=>$request->input("store_location")
        ]);
        return redirect()->route('stores');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $Stores = store::where("id",$id)->firstOrFail();
        $Products = product::where("store_id", $id)->get();
        return view("singleStore",["Store"=>$Stores, "Products"=>$Products]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $Stores=store::where('id',$id)->firstOrFail();
        return view("editStore",["Stores"=>$Stores]);
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
        store::where("id",$request->input("id"))->update([
            "store_name"=>$request->input("store_name"),
            "store_location"=>$request->input("store_location"),
            ]);
        return redirect()->route("stores");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        store::where ("id",$request->input("id"))->delete();
        return redirect()->back();
    }
}
