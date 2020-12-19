@extends('layouts.app')

@section('content')


<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="container" style="text-align: center;">
        <form method="POST" action="{{ route('userupdate') }}">
            @csrf
            <h3>პროდუქტის განახლება</h3>
            <input type="hidden" name="id" value="{{ $Products->id }}">
            <br>
            <label><b>პროდუქტის სახელი</b></label>
            
            <input value="{{ $Products->title }}" class="form-control" type="text" name="name" placeholder="პროდუქტის სახელი...">
            
            <br>
            <label><b>პროდუქტის აღწერა</b></label>
            
            <textarea class="form-control" name="description" placeholder="პროდუქტის აღწერა...">{{ $Products->description }}</textarea>
            <br>
            <button class="btn btn-primary" type="submit" >განახლება</button>
        </form>
    </div>
        </div>
    </div>
</div>
@endsection