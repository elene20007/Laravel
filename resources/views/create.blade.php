@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="container" style="text-align: center;">
        <form method="POST" action="{{ route('create') }}">
            @csrf
            <h3>პროდუქტის დამატება</h3>
            <br>
            <label><b>პროდუქტის სახელი</b></label>
            <input class="form-control" type="text" name="product_name">

            <br>
            <label><b>პროდუქტის აღწერა</b></label>
            <textarea class="form-control" name="description"></textarea>
            <br>
            
            <br>
            <label><b>პროდუქტის ფასი</b></label>
            <input class="form-control" type="text" name="price">
            <br>

            <label><b>კატეგორია</b></label>
                @foreach(App\Category::get() as $item)
                    <input type="checkbox" name="category[]" id="{{ $item->id }}" value="{{ $item->id }}">
                    <label for="{{ $item->id }}">{{ $item->category_name }}</label>
                @endforeach
            <br>

            <button class="btn btn-primary" type="submit">შენახვა</button>

        </form>
    </div>
        </div>
    </div>
</div>
@endsection