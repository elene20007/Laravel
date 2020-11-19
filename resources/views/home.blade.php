@extends('layouts.app')

@section('content')

<div style="display: flex;justify-content: flex-end;margin-right: 5%;">
    <a class="btn btn-outline-success" href="{{ route('addproductpage') }}">პროდუქტის დამატება</a>
</div>

<div class="container">
    @foreach ($Products as $Product)
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h4 style="margin-left: 5%"><b>{{ $Product->title }}</b></h4>
                <div class="card" style="width:100%; margin-top: 1%;margin-bottom: 1%;padding: 2%;display: flex;">
                    <p>{{ $Product->description }}</p>
                </div>

                @if ($Product->user_id === Auth::user()->id)
                    <div style="display: flex;flex-direction: row;">
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
                    
                @endif
               
            </div>
            <hr style="width:100%">
        </div>
    @endforeach
</div>
@endsection
