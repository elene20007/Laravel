@extends('layouts.app')
@section('content')
<div class="container">
	<div class="row">
        @foreach (App\Product::get() as $product)
            <div class="col-12 col-sm-6 ">
                <div class="product-grid-item sm-item js-product-item">
                    <div class="img-wrap">
                        <a href="{{ route('single',["id"=>$product->id ]) }}"><img src="{{ asset('images')."/".$product->image }}" alt="File doesn't exist" class="bg-img bg-img1by1"></a>
                    </div>
                    <div class="info-wrap">
                        <h4 class="product-name">
                        	<a href="{{ route('single',["id"=>$product->id ]) }}">{{ $product->product_name }}</a>
                        </h4>            
                        <span class="product-price">
                        <span>{{ $product->price }}</span>
                        </span>
                        <div style="display: flex;flex-direction: row;">
	                        <div style="margin-left: 1%">
	                            <a href="{{ route('edit',["id"=>$product->id ]) }}" class="btn btn-outline-info">
	                            განახლება
	                            </a>
                                <form method="post" action="{{ route('destroy') }}">
                                @csrf
                                    <input type="hidden" name="id" value="{{ $product->id }}">
                                    <button style="margin: 1%;" class="btn btn-outline-danger">წაშლა</button>
                                </form>
	                        </div>
                    	</div>
                    </div>
                </div>
            </div>
        @endforeach
	</div>
</div>
@endsection