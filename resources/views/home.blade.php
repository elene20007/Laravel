@extends('layouts.app')

@section('content')

<div style="display: flex;justify-content: flex-end;margin-right: 5%;">
    <a class="btn btn-link" href="{{ route('stores') }}">სათავსოები</a>
    <a class="btn btn-link" href="{{ route('addproductpage') }}">პროდუქტის დამატება</a>
    <a class="btn btn-link" href="{{ route('addstorepage') }}">სათავსოს დამატება</a>
</div>

<div class="container">
    @foreach (App\Product::get() as $Product)
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h4 style="margin-left: 5%"><b>{{ $Product->name }}</b></h4>
                <div class="card" style="width:100%; margin-top: 1%;margin-bottom: 1%;padding: 2%;display: flex;">
                    <p>{{ $Product->description }}</p>
                </div>
                    <div style="display: flex;flex-direction: row;">
                        <div style="margin-left: 1%">
                            <a href="{{ route('singleProduct',["id"=>$Product->id ]) }}" class="btn btn-outline-info">
                            ნახვა
                            </a>
                        </div>
                        <form method="post" action="{{ route('userdestroy') }}">
                        @csrf
                            <input type="hidden" name="id" value="{{ $Product->id }}">
                            <button style="margin: 1%;" class="btn btn-outline-danger">წაშლა</button>
                        </form>
                        <div style="margin-left: 1%">
                            <a href="{{ route('useredit',["id"=>$Product->id ]) }}" class="btn btn-outline-info">
                            განახლება
                            </a>
                        </div>
                    </div>
               
            </div>
            <hr style="width:100%">
        </div>
    @endforeach
</div>

@endsection