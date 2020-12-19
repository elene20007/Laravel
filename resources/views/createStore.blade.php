@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="container" style="text-align: center;">
        <form method="POST" action="{{ route('userstoreStore') }}">
            @csrf
            <h3>სათავსოს დამატება</h3>

            <br>
            <label><b>სათავსოს სახელი</b></label>
            
            <input class="form-control" type="text" name="store_name" placeholder="შეიტანეთ პროდუქტის სახელი...">
            
            <br>
            <label><b>სათავსოს მდებარეობა</b></label>
            
            <textarea class="form-control" name="store_location" placeholder="პროდუქტის აღწერა..."></textarea>
            <br>
            <button class="btn btn-primary" type="submit" >შენახვა</button>
        </form>
    </div>
        </div>
    </div>
</div>
@endsection