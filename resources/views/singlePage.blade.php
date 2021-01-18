@extends('layouts.app')
@section('content')

<div style="margin-left: 50%" class="container breadcrumbs">
    <h3 class="title">{{ $product->title }}</h3>          
</div>
        <main class="container page page-product-details">
            <div class="product-item">
                <div class="row">
                    <div class="col-md-5 col-lg-6 slider-col">
                        <div >
                            <span class="bg-img bg-img--1by1">
                            <img width="250" height="250" src="{{ asset('images'."/".$product->image) }}">
                            </span>
                        </div>
                    </div>

                    <div class="col-md-7 col-lg-6">
                        <article>
                            <h1 class="product-name">{{ $product->product_name }}</h1>
                            <span class="product-price">
                                    <span class="new">{{ $product->price }}</span>
                                                    </span>

                            <div class="text-wrap product-text">  
                                <p>{{ $product->description }}</p>
                            </div>

                                <div class="product-controls">
                                    <div class="product-count js-product-count">
                                        <button type="button" class="minus js-product-count-minus-button"><i class="icon i-minus"></i></button>
                                        <input type="text" maxlength="6" value="1" class="js-product-count-textbox" data-allow-float="true">
                                        <button type="button" class="plus js-product-count-plus-button"><i class="icon i-plus"></i></button>
                                    </div>
                                    <div class="d-flex align-items-center mr-3">
                                        ცალი
                                    </div>
                                    <a href="#" class="btn btn-primary add-to-cart-btn js-add-to-cart" data-id="61F0D36B7D">
                                        <i class="icon"></i>
                                        <span>დამატება</span>
                                    </a>
                                </div>
                        </article>

                    </div>
                </div>
            </div>
        </main>
@endsection