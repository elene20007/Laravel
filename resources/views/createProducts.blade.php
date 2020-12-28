@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="container" style="text-align: center;">
        <form method="POST" action="{{ route('store') }}">
            @csrf
            <h3>პროდუქტის დამატება</h3>

            <br>
            <label><b>პროდუქტის სახელი</b></label>
            
            <input class="form-control" type="text" name="title" placeholder="შეიტანეთ პროდუქტის სახელი...">

            <br>
            <label><b>პროდუქტის აღწერა</b></label>
            
            <textarea class="form-control" name="description" placeholder="პროდუქტის აღწერა..."></textarea>
            <br>
            <br>
            <label><b>პროდუქტის სურათი</b></label>
            
            <input class="form-control" type="image/png" name="image">
            <br>
            <label><b>კატეგორიის არჩევა</b></label>
            <select name="subcategory_id">
                @foreach(App\subcategory::get() as $item)
                    <option value="{{ $item->id }}">{{ $item->title }}</option>
                @endforeach
            </select>
            <br>
            <button class="btn btn-primary" type="submit" >შენახვა</button>
        </form>
    </div>
        </div>
    </div>
</div>
@endsection