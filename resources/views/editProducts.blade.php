@extends('layouts.app')

@section('content')


<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="container" style="text-align: center;">
        <form method="POST" action="{{ route('update') }}">
            @csrf
            <h3>პროდუქტის განახლება</h3>
            <input type="hidden" name="id" value="{{ $product->id }}">
            <br>
            <label><b>პროდუქტის სახელი</b></label>
            
            <input value="{{ $product->title }}" class="form-control" type="text" name="title" placeholder="პროდუქტის სახელი...">
            
            <br>
            <label><b>პროდუქტის აღწერა</b></label>
            
            <textarea class="form-control" name="description" placeholder="პროდუქტის აღწერა...">{{ $product->description }}</textarea>
            <br>
            <label><b>კატეგორიის არჩევა</b></label>
            <select name="subcategory_id">
                @foreach(App\subcategory::get() as $item)
                    <option value="{{ $item->id }}">{{ $item->title }}</option>
                @endforeach
            </select>
            <br>
            <label><b>პროდუქტის სურათი</b></label>
            
            <input value="{{ $product->image }}" class="form-control" type="image/png" name="image">
            <br>
            <button class="btn btn-primary" type="submit" >განახლება</button>
        </form>
    </div>
        </div>
    </div>
</div>
@endsection