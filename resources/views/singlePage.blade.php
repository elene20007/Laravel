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
                            <img width="250" height="250" src="{{ asset('images'."/".$product->image) }}">
                            </span>
                        </div>
                    </div>
                    <div class="col-md-7 col-md-4">
                        <article>
                            <h1 class="product-name">{{ $product->product_name }}</h1>
                            <span class="product-price">
                                    <span class="new">Price: {{ $product->price }}</span>
                                                    </span>
                            <div class="text-wrap product-text">  
                                <p>{{ $product->description }}</p>
                            </div>
                                @if(Auth::user())
                                <div class="product-controls">
                                    <div class="product-count js-product-count">
                                        <input type="text" maxlength="6" value="1" class="js-product-count-textbox" data-allow-float="true">
                                        ცალი
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
                                <div>{{ App\User::where('id', $comment->user_id)->get()->name }}</div>
                                <img src="{{ asset('images')."/"."8-512.png" }}" class="img-fluid" style="width: 50%">
                            </div>
                            <div style="max-width: 80%">
                                <p>{{ $comment->comment }}</p>
                                @if(Auth::user()->id === $comment->user_id)
                                <button type="button" class="btn btn-light btn-sm d-flex flex-row-reverse">Delete</button>
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