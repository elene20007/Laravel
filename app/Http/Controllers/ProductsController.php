<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\products;
use App\Comments;
use App\categories;
use App\Rules\CheckAboutSymbols;
use Illuminate\Support\Facades\Input;
use App\Auth;


class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("welcome");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        $this->validate($request,[
            "title"=>"required", //|max:,min:,between:,numeric
            "image"=>"required"
        ]);

        $category_id = categories::where("category_name", $request->input("cat"))->firstOrFail()->id;

        if (Input::file("image")){
            $dp=public_path("images");
            $filename=uniqid().".jpg";
            $img=Input::file("image")->move($dp,$filename);
            
        products::create([
            "title"=>$request->input("title"),
            "price"=>$request->input("price"),
            "description"=>$request->input("description"),
            "category_id"=>$category_id,
            "image"=>$filename

        ]);
        return redirect()->route('home');
        } 

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
        $product = products::where("id", $id)->firstOrFail();
        return view('update', ["product"=>$product]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        products::where("id",$id)->update([
            "title"=>$request->input("title"),
            "description"=>$request->input("description"),
            "price"=>$request->input("price")
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
        products::where("id",$request->input("id"))->delete();
        return redirect()->back();
    }
    public function single($id)
    {
        $Products=products::where('id',$id)->firstOrFail();
        return view("single",["Products"=>$Products]);
    }
    public function search()
    {
        $search_text = $_GET['query'];
        $Products = products::where('title','LIKE','%'.$search_text.'%')->get();
        return view('search',["Products"=>$Products]);
    }
    public function products()
    {
        return view("products");
    }
    public function productsFilter($id)
    {
        $Products=products::where('category_id',$id)->get();
        return view("productsPageFilter",["Products"=>$Products]);
    }
}
