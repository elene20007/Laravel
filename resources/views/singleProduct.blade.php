@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card" style="width:100%; margin-top: 1%;margin-bottom: 1%;padding: 2%;display: flex;">
                	<h4 style="margin-left: 5%"><b>პროდუქტის სახელი: {{ $Product->name }}</b></h4>
                    <img src="https://letslearnenglish.com/wp-content/uploads/2017/06/mr_bean.jpg" width="120" height="60">
                    <p>პროდუქტის აღწერა: {{ $Product->description }}</p>
                    <p>პროდუქტის სტატუსი: {{ $Product->status }}</p>
                    <a href="{{ route('singleStore',["id"=>$Product->store_id ]) }}" class="btn btn-link">
                            სათავსოს ნომერი: {{ $Product->store_id }}
                            </a>
                </div>

                    <div style="display: flex;flex-direction: row;">
                        <div style="margin-left: 1%">
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
</div>

@endsection