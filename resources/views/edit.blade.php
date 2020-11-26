@extends("layouts.app")

@section("content")

<div class="container">
	<form action="{{ route('update') }}" method="POST">
		@csrf
		<input type="hidden" name="id" value="{{ $news->id }}">
		<input type="text" class="form-control" name="title" value="{{ $news->title }}">
		<textarea name="description" class="form-control">{{ $news->description }}</textarea>
		<button class="btn btn-primary">Edit</button>
	</form>
</div>

@endsection