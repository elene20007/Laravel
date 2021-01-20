<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Product;
use App\Category;
use App\ProductCategory;
use Auth;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("productsPage");
    }

     /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        if (Input::file("image")){

        $dp=public_path("images");
        $filename=uniqid().".jpg";
        $img=Input::file("image")->move($dp,$filename);
        Product::create([
                    "product_name"=>$request->input("product_name"),
                    "description"=>$request->input("description"),
                    "price"=>$request->input("price"),
                    "image"=>$filename
                ]);
        }   
        $a = array(1, 2);

        foreach ($a as $cat) {
            ProductCategory::create([
            "product_id"=>Product::latest("created_at")->first()->id,
            "category_id"=>$cat
            ]);
        };
        return redirect()->back();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        
        $Products = Product::where("id", $id)->firstOrFail();
        return view('update', ["product"=>$Products]);
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
        Product::where("id",$id)->update([
            "product_name"=>$request->input("product_name"),
            "description"=>$request->input("description"),
            "price"=>$request->input("price"),
            ]);
        return redirect()->route("productsPage");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        Product::where("id",$request->input("id"))->delete();
        return redirect()->back();
    }

    public function single($id)
    {
        $Products=Product::where('id',$id)->firstOrFail();
        return view("singlePage",["product"=>$Products]);
    }

}
