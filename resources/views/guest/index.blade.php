
	{{-- <div class="card-body">
		<img src="{{ asset('images')."/".$product->image }}" alt="File doesn't exist">

	</div> --}}

@extends("layouts.app")

@section("content")
    <div class="container">
            <table class="table" style = "margin-top: 5%">
                <tr>
                    <td>N</td>
                    <td>title</td>
                    <td>description</td>
                    <td>short description</td>
                    <td>image</td>
                    <td>date</td>
                    <td>edit/delete</td>
                </tr>
            @foreach (App\news::get() as $new)
                <tr>
                    <td>{{ ++$loop->index }} </td>
                    <td> {{ $new->title }}</td>
                    <td> {{ $new->description }}</td>
                    <td> {{ $new->short_description }}</td>
                    <td> {{ $new->image }}</td>
                    <td> {{ $new->time }}</td>
                    <td style="display: flex;flex-direction: row;">
                            <form action="{{ route('delete') }}" method="POST">
                            @csrf
                                <input type="hidden" name="id" value="{{ $new->id }}">
                                <button class="btn btn-danger">
                                    Delete
                                </button>
                            </form>
                            <div>
                                <a href="{{ route('edit',["id"=>$new->id ]) }}" class="btn btn-primary">
                                    Edit
                                </a>
                            </div>
                </td>
                </tr>
            @endforeach
            </table>
    </div>
@endsection