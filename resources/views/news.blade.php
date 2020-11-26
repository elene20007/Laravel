@extends('layouts.app')

@section("content")
<div class="container">
	<form action="{{ route('createnews') }}" method="POST" enctype="multipart/form-data">
			@csrf
			<input type="text" name="title" placeholder="Title" class="form-control mt-2 @error('title') is-invalid @enderror">
				@error('title')
	                <span class="invalid-feedback" role="alert">
	                    <strong>{{ $message }}</strong>
	                </span>
	            @enderror
			<textarea class="form-control mt-2" name="short_description"></textarea>
			<textarea class="form-control mt-2" name="description"></textarea>
			<input type="file" name="image" class="form-control mt-2">
			@foreach(App\categories::get() as $category)
				<input type="checkbox" name="category_id" value="{{ $category->id }}">
				<label for="category_id">{{ $category->title }}</label><br>
			@endforeach
			<input type="date" name="time">
			<input type="text" name="tags">
			<input type="text" name="tags">
			<input type="text" name="tags">
			<input type="text" name="tags">
			<button class="btn btn-primary w-100 mt-2">Save</button>
	</form>
</div>
@endsection