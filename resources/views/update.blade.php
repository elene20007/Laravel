@extends("layouts.app")

@section("content")

<div class="container">
	<form action="{{ route('update',["id"=>$product->id]) }}" method="POST">
		@csrf
		<input type="text" class="form-control" name="product_name" value="{{ $product->product_name }}">
		<input type="text" class="form-control" name="price" value="{{ $product->price }}">
		<textarea name="description" class="form-control">{{ $product->description }}</textarea>
		<button type="submit" class="btn btn-primary">განახლება</button>
	</form>
</div>
@endsection