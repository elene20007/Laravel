@extends('layouts.app')
@section('content')
<div class="container">
    @if(Auth::user() && Auth::user()->id === 1)
        <a class="btn btn-dark" style="color: white" href="{{ route('createPage') }}">ახალი პროდუქტის დამატება</a>
        <a class="btn btn-dark" style="color: white" href="{{ route('categoriesPage') }}">ახალი კატეგორიის დამატება</a>
	@endif
    <div class="row">
        @foreach (App\Product::get() as $product)
            <div class="col-12 col-md-3 rounded d-inline-flex p-2" style="background-color: white;box-shadow: 0 0.5rem 1rem rgba(0,0,0,.05), inset 0 -1px 0 rgba(0,0,0,.1);margin: 1%;">
                <div class="product-grid-item md-item js-product-item">
                    <div class="img-wrap">
                        <a href="{{ route('single',["id"=>$product->id ]) }}"><img style="width: auto; height: 100px;" src="{{ asset('images')."/".$product->image }}" class="bg-img bg-img1by1"></a>
                    </div>
                    <div class="info-wrap">
                        <h4 class="product-name" style="text-decoration: black;">
                        	<a style="color: black" href="{{ route('single',["id"=>$product->id ]) }}">{{ $product->product_name }}</a>
                        </h4>

                        <span class="product-price">
                        <span>Price: {{ $product->price }}</span>
                        </span>
                        <div style="display: flex;flex-direction: row;">
	                        <div style="width: 80%; display: flex; flex-direction: row;justify-content: space-between;">
                                <a href="{{ route('single',["id"=>$product->id ]) }}" class="btn btn-outline-dark btn-sm" style="margin: 1%">
                                დათვალიერება
                                </a>
                                @if(Auth::user() && Auth::user()->id === 1)
    	                            <a href="{{ route('edit',["id"=>$product->id ]) }}" class="btn btn-outline-dark btn-sm" style="margin: 1%">
    	                            განახლება
    	                            </a>
                                    <form method="post" action="{{ route('destroy') }}" style="margin:1%">
                                    @csrf
                                        <input type="hidden" name="id" value="{{ $product->id }}">
                                        <button class="btn btn-outline-dark btn-sm">წაშლა</button>
                                    </form>
                                @endif
	                        </div>
                    	</div>

                    </div>
                </div>
            </div>
        @endforeach
	</div>
</div>
@endsection