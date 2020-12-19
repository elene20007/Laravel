@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="container" style="text-align: center;">
        <form method="POST" action="{{ route('userstore') }}">
            @csrf
            <h3>პროდუქტის დამატება</h3>

            <br>
            <label><b>პროდუქტის სახელი</b></label>
            
            <input class="form-control" type="text" name="name" placeholder="შეიტანეთ პროდუქტის სახელი...">
            
            <br>
            <label><b>პროდუქტის აღწერა</b></label>
            
            <textarea class="form-control" name="description" placeholder="პროდუქტის აღწერა..."></textarea>
            <br>
            <button class="btn btn-primary" type="submit" >შენახვა</button>
        </form>
    </div>
        </div>
    </div>
</div>
@endsection