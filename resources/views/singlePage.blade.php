@extends('layouts.app')
@section('content')

<div class="container breadcrumbs">
    <h3 class="title">{{ $product->title }}</h3>          
        <main class="container page page-product-details">
            <div class="product-item">
                <div class="row">
                    <div class="col-md-4 col-md-4 slider-col">
                        <div >
                            <span class="bg-img bg-img--1by1">
                            <img width="250" height="auto" src="{{ asset('images'."/".$product->image) }}">
                            </span>
                        </div>
                    </div>
                    <div class="col-md-7 col-md-4">
                        <article>
                                @if(Auth::user() && Auth::user()->id === 1)
                                    <div style="width: 80%; display: flex; flex-direction: row;">
                                    <a href="{{ route('edit',["id"=>$product->id ]) }}" class="btn btn-outline-dark btn-sm" style="margin: 1%">
                                    განახლება
                                    </a>
                                    <form method="post" action="{{ route('destroy') }}" style="margin:1%">
                                    @csrf
                                        <input type="hidden" name="id" value="{{ $product->id }}">
                                        <button class="btn btn-outline-dark btn-sm">წაშლა</button>
                                    </form>
                                    </div>
                                @endif
                            <h1 class="product-name">{{ $product->product_name }}</h1>
                            <span class="product-price">
                                    <span class="new">Price: {{ $product->price }}</span>
                                                    </span>
                            <div class="text-wrap product-text">  
                                <p>{{ $product->description }}</p>
                                <p>{{ $product->created_at }}</p>
                            </div>
                                @if(Auth::user())
                                <div class="product-controls">
                                    <div class="product-count js-product-count">
                                        <input style="margin-right: 10px" type="text" value="1" class="js-product-count-textbox" data-allow-float="true">  ცალი
                                    </div>
                                    <a href="#" class="btn btn-outline-dark btn-sm add-to-cart-btn js-add-to-cart" style="margin-top: 2%;">
                                        <i class="icon"></i>
                                        <span>დამატება</span>
                                    </a>
                                </div>
                                @endif
                        </article>
                    </div>
                </div>
            </div>
        </main>
    <div class="chatContainer" style="margin-top: 2%">

    <div class="chatTitleContainer">Comments</div>
    <div class="chatHistoryContainer">

        <ul class="formComments">
            @foreach(App\Comment::where("product_id", $product->id)->get() as $comment)
            <li class="d-flex row">
                            <div style="max-width: 10%">
                                <div>{{ (DB::table("users"))->where("id",$comment->user_id)->get()[0]->name }}</div>
                                <img src="{{ asset('images')."/"."8-512.png" }}" class="img-fluid" style="width: 30%">
                            </div>
                            <div style="width: 80%; display: flex;justify-content: space-between;" >
                                <p>{{ $comment->comment }}</p>
                                @if(Auth::user() && Auth::user()->id === $comment->user_id)
                                    <form method="post" action="{{ route('destroyComment') }}" style="margin:1%">
                                    @csrf
                                        <input type="hidden" name="id" value="{{ $comment->id }}">
                                        <button class="btn btn-link btn-sm" style="color: red">წაშლა</button>
                                    </form>
                                @endif
                            </div>
            </li>  
            @endforeach
        </ul>
    </div>
    @if(Auth::user())
    <form method="POST" action="{{ route('addComment') }}">
        @csrf
        <input type="hidden" name="user_id" value={{ Auth::user()->id }}>
        <input type="hidden" name="product_id" value={{ $product->id }}>
    <div class="input-group input-group-sm chatMessageControls">
        <span class="input-group-addon" id="sizing-addon2" style="margin-right: 1%">Comment</span>
        <input type="text" name="comment" class="form-control" placeholder="Type your message here.." aria-describedby="sizing-addon2">    
        <span class="input-group-btn">
            <button class="btn btn-primary btn-sm" type="submit">Send</button>
        </span>
    </div>
    </form>
    @endif
    </div>
</div>
@endsection