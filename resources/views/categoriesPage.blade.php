@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6 d-flex">
            <div class="container" style="text-align: center;">
                <h4 class="title">კატეგორიის დამატება</h4>
                @foreach(App\Category::get() as $item)
                <div class="d-flex row" style="justify-content: space-between; margin-left:0%; margin-right: 70%; ">
                    <p class="item">{{ $item->category_name }}</p>
                    <form method="post" action="{{ route('destroyCategory') }}" style="margin:1%">
                        @csrf
                            <input type="hidden" name="id" value="{{ $item->id }}">
                            <button class="btn btn-link btn-sm" style="color: red">წაშლა</button>
                    </form>
                </div>
                <hr style="height:0.5px;border-width:0;color:gray;background-color:gray">
                @endforeach
                <br>
            <form method="POST" action="{{ route('createCategory') }}">
                @csrf
                <label><b>კატეგორიის სახელი</b></label><input class="form-control" type="text" name="category_name">
                <br>
                <button class="btn btn-primary" type="submit">შენახვა</button>
            </form>
            </div>
        </div>
    </div>
</div>
@endsection