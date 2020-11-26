@extends('layouts.app')

@if ($errors->any())
	<div>
		<ul>
			@foreach ($errors as $error)
				<li>{{ $error }}</li>
			@endforeach
		</ul>	
	</div>
@endif
@section('content')

	<div class="container">
		<form action="{{ route('admincreateproduct') }}" method="POST" enctype="multipart/form-data">
			@csrf
			<input type="text" name="title" placeholder="Title" class="form-control mt-2 @error('title') is-invalid @enderror">
				@error('title')
	                <span class="invalid-feedback" role="alert">
	                    <strong>{{ $message }}</strong>
	                </span>
	            @enderror
			<textarea class="form-control mt-2" name="description"></textarea>
			<input type="file" name="image" class="form-control mt-2">
			<button class="btn btn-primary w-100 mt-2">Save</button>
		</form>
	</div>
@endsection