@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card" style="width:100%; margin-top: 1%;margin-bottom: 1%;padding: 2%;display: flex;">
                	<h4 style="margin-left: 5%"><b>პროდუქტის სახელი: {{ $product->title }}</b></h4>
                    <img src="https://letslearnenglish.com/wp-content/uploads/2017/06/mr_bean.jpg" width="120" height="60">
                    <p>პროდუქტის აღწერა: {{ $product->description }}</p>
                </div>
                @if (Session::get('AdminMiddleware', 0));
                    <div style="display: flex;flex-direction: row;">
                        <div style="margin-left: 1%">
                            <form method="post" action="{{ route('destroy') }}">
                            @csrf
                                <input type="hidden" name="id" value="{{ $product->id }}">
                                <button style="margin: 1%;" class="btn btn-outline-danger">წაშლა</button>
                            </form>
                                <div style="margin-left: 1%">
                                    <a href="{{ route('edit',["id"=>$product->id ]) }}" class="btn btn-outline-info">
                                    განახლება
                                    </a>
                                </div>
                        </div>
                    </div>
                @endif
        <hr style="width:100%">
    </div>
</div>

@endsection