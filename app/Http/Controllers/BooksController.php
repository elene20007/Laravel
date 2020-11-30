<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Books;
use App\Genres;

class BooksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("books.index", [
            "Books"=>Books::get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("books.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Books::create([
            "Author_name"=>$request->input("Author_name"),
            "description"=>$request->input("description"),
            "title"=>$request->input("title"),
            "genre_id"=>$request->input("genre")
        ]);

        Genres::create([
            "Genre_name"=>$request->input("genre")
        ]);

        return redirect()->route('adminindex');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $Book=Books::where ("id",$id)->firstOrFail();
        return view("books.show",["Book"=>$Book]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(request $request)
    {
        Books::where ("id",$request->input("id"))->delete();
        return redirect()->back();
    }
}
