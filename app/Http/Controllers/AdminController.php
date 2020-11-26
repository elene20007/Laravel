<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\news;
use App\categories;
use App\tags;
use App\Rules\CheckAboutSymbols;
use File;
use Auth;


class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("guest.index");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("news");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate( $request, [
            'image' => 'required',
            'title' => ['required',new CheckAboutSymbols],
            'short_description' => 'required'

        ]);
        if(Input::file("image")){
            $dp=public_path('images');
            $filename=uniqid().".jpg";
            $img=Input::file("image")->move($dp, $filename);
        }

        $news = news::create([
            'title'=> $request->input('title'),
            'short_description'=> $request->input('short_description'),
            'description'=> $request->input('description'),
            'image'=> $filename,
            'time'=> $request->input('time'),
            'user_id'=> Auth::user()->id,
            'category_id'=> $request->input('category_id')
        ])->id;

        // return Category::create([
        //  'title'=>'title1'
        // ])->id;
        $data = $request->input("tags");
        /*foreach ($data as $d){
            tags::create([
                'news_id'=>$news,
                'name'=>$d
            ]);
        }*/ 

        return view("guest.index");

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
        $news=news::where("id",$id)->firstOrFail();
        return view("edit",["news"=>$news]);
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
        news::where("id",$request->input("id"))->update([
            "title"=>$request->input("title"),
            "description"=>$request->input("description")
            ]);
        return redirect()->route("index");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        news::where ("id",$request->input("id"))->delete();
        return redirect()->route("index");
    }
}
