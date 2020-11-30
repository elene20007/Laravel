@extends('layouts.app')

@section('content')
<div class="container">
    <a class="btn btn-light" href="{{ route('productsPage') }}">პროდუქტების გვერდი</a>
</div>
@if(Auth::user()->id === 3)
<div class="container">
    <div class="row justify-content-center">
        <h5 class="title">ბოლოს დამატებული პროდუქტი: </h5>
        <div class="col-sm-10 mt-2" >
            <div class="card">
                <div class="card-header">
                    <a class="js-tree-value" href="{{ route('single',["id"=>$products[count($products)-1]->id ]) }}"> {{ $products[count($products)-1]->title }}</a>
                </div>
                <div class="card-body">
                    ფასი: {{ $products[count($products)-1]->price }}
                </div>
            </div>
        </div>
    </div> 
</div>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="container" style="text-align: center;">
        <form method="POST" action="{{ route('create') }}" enctype="multipart/form-data">
            @csrf
            <h3>პროდუქტის დამატება</h3>
            <br>
            <label><b>პროდუქტის სათაური</b></label>
            
            <input class="form-control" type="text" name="title" placeholder="შეიტანეთ პროდუქტის სახელი...">

            <br>
            <label><b>პროდუქტის ფასი</b></label>
            
            <input class="form-control" type="text" name="price" placeholder="შეიტანეთ პროდუქტის სახელი...">

            <br>
            <label><b>პროდუქტის აღწერა</b></label>
            
            <textarea class="form-control" name="description" placeholder="პროდუქტის აღწერა..."></textarea>
            <br>
            <input type="hidden" name="category_id" value="{{ Auth::user()->id }}">
                <div class="form-group">
                  <label for="cat"><b>აირჩიეთ კატეგორია:</b></label>
                  <select id="cat" name="cat" class="form-control">
                    @foreach($categories as $cat)
                    <option>{{ $cat->category_name }}</option>
                    @endforeach
                  </select>
                </div>
            <br>
            <input type="file" name="image" class="form-control mt-2">
            <br>
            <button class="btn btn-primary" type="submit" >შენახვა</button>
        </form>
    </div>
        </div>
    </div>
</div>
@endif
@endsection