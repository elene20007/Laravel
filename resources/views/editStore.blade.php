@extends('layouts.app')

@section('content')


<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="container" style="text-align: center;">
        <form method="POST" action="{{ route('userupdateStore') }}">
            @csrf
            <h3>სათავსოს განახლება</h3>
            <input type="hidden" name="id" value="{{ $Stores->id }}">
            <br>
            <label><b>სათავსოს სახელი</b></label>
            
            <input value="{{ $Stores->store_name }}" class="form-control" type="text" name="store_name" placeholder="სათავსოს სახელი...">
            
            <br>
            <label><b>სათავსოს მდებარეობა</b></label>
            
            <textarea class="form-control" name="store_location" placeholder="სათავსოს მდებარეობა...">{{ $Stores->store_location }}</textarea>
            <br>
            <button class="btn btn-primary" type="submit" >განახლება</button>
        </form>
    </div>
        </div>
    </div>
</div>
@endsection