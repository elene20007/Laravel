@extends('layouts.app')

@section('content')

<div class="container">
	<h3>თქვენ არ გაქვთ ადმინის უფლებები :P</h3>
	<br>
	<a href="{{ route('home') }}">მთავარ გვერდზე დაბრუნება</a>
</div>

@endsection