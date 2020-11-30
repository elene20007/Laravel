@extends('layouts.app')
@section('content')

@foreach($Products as $Product)

<div class="container">
    <div class="row justify-content-center">
        <div class="col-sm-10 mt-2" >
            <div class="card">
                <div class="card-header">
                    <a class="js-tree-value" href="{{ route('single',["id"=>$Product->id ]) }}"> {{ $Product->title }}</a>
                </div>
                <div class="card-body">
                    ფასი: {{ $Product->price }}
                </div>
            </div>
        </div>
    </div> 
</div>

@endforeach

@endsection