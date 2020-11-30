@extends('layouts.app')
@section('content')
<div class="container">
	<div class="row">
        @foreach ($Products as $product)
            <div class="col-12 col-sm-6 ">
                <div class="product-grid-item sm-item js-product-item">
                    <div class="img-wrap">
                        <a href="{{ route('single',["id"=>$product->id ]) }}"><img src="{{ asset('images')."/".$product->image }}" alt="File doesn't exist" class="bg-img bg-img1by1"></a>
                        <a {{-- href="{{ route('addInCard') }}" --}} class="btn btn-primary add-to-cart-btn js-add-to-cart">
                        <i><img src="{{ asset('images')."/"."cart.png"}}" class="icon"></i>
                            <span>დამატება</span>
                        </a>
                    </div>
                    <div class="info-wrap">
                        <h4 class="product-name">
                        	<a href="{{ route('single',["id"=>$product->id ]) }}">{{ $product->title }}</a>
                        </h4>            
                        <span class="product-price">
                        <span>{{ $product->price }}</span>
                        </span>
                    </div>
                </div>
            </div>
        @endforeach
	</div>
</div>
@endsection