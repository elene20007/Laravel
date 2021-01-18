-----------------------------------------------------------
SEARCH
-----------------------------------------------------------

<form class="form-inline" type="get" action="{{ url('/search') }}" >
	<input class="form-control" name="search" type="search" placeholder="ძებნა" aria-label="Search" >
	<button class="btn btn-secondary" type="submit">ძებნა</button>
</form>


web

Route::get('/search', 'PostsController@search');

PostsController@search

public function search()
    {
        $search_text = $_GET['search'];
        $Posts = CreatePosts::where('title','LIKE','%'.$search_text.'%')->get();
        return view('search',["Posts"=>$Posts]);
    }


blade  (output)

@extends('layouts.app')
@section('content')

@foreach($Posts as $Post)

<div class="container">
    <div class="row justify-content-center">
        <div class="col-sm-10 mt-2" >
            <div class="card">
                <div class="card-header">
                    <a class="js-tree-value" href="{{ route('single',["id"=>$Post->id ]) }}"> {{ $Post->title }}</a>
                </div>
                <div class="card-body">
                    ტექსტი: {{ $Post->text }}
                </div>
            </div>
        </div>
    </div> 
</div>

@endforeach

@endsection



-------------------------------------------------------------------------------

CRUD
-------------------------------------------------------------------------------
routes

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/single/{id}', 'ProductsController@single')->name('single');
Route::get('/', 'ProductsController@index');
Route::post('/createProduct','ProductsController@create')->name('create');
Route::get('/search','ProductsController@search');
Route::get('/products', 'ProductsController@products')->name('productsPage');
Route::get('/products/{id}', 'ProductsController@productsFilter')->name('productsPageFilter');
Route::get('/edit/{id}', 'ProductsController@edit')->name('edit');
Route::post('/update/{id}','ProductsController@update')->name('update');
Route::post('/delete','ProductsController@destroy')->name('destroy');

create

createpage

@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="container" style="text-align: center;">
        <form method="POST" action="{{ route('create') }}">
            @csrf
            <h3>პროდუქტის დამატება</h3>

            <br>
            <label><b>პროდუქტის სახელი</b></label>
            
            <input class="form-control" type="text" name="name" placeholder="შეიტანეთ პროდუქტის სახელი...">

            <br>
            <label><b>პროდუქტის აღწერა</b></label>
            
            <textarea class="form-control" name="description" placeholder="პროდუქტის აღწერა..."></textarea>
            <br>
            
            <br>
            <label><b>პროდუქტის სტატუსი</b></label>
            
            <input class="form-control" type="text" name="status" placeholder="შეიტანეთ პროდუქტის სტატუსი...">
            <br>
            <label><b>სათავსოს ნომერი</b></label>
            <select name="store_id" id="store_id">
                @foreach(App\store::get() as $item)
                    <option>{{ $item->id }}</option>
                @endforeach
            </select>
            <br>
            <button class="btn btn-primary" type="submit" >შენახვა</button>


        </form>
    </div>
        </div>
    </div>
</div>
@endsection

create function

Controller@create

$category_id = categories::where("category_name", $request->input("cat"))->firstOrFail()->id;

if (Input::file("image")){
	$dp=public_path("images");
    $filename=uniqid().".jpg";
    $img=Input::file("image")->move($dp,$filename);

products::create([
            "title"=>$request->input("title"),
            "description"=>$request->input("description"),
            "category_id"=>$category_id,
            "image"=>$filename
        ]);

-----------------------------------------------------------------------------------
edit


<div style="display: flex;flex-direction: row;">
	   <div style="margin-left: 1%">
	       <a href="{{ route('edit',["id"=>$product->id ]) }}" class="btn btn-outline-info">
	       განახლება
	       </a>
	   </div>
	   <form method="post" action="{{ route('destroy') }}">
	   @csrf
	       <input type="hidden" name="id" value="{{ $product->id }}">
	       <button style="margin: 1%;" class="btn btn-outline-danger">წაშლა</button>
	   </form>
</div>


controller 

public function edit($id)
    {
        $product = products::where("id", $id)->firstOrFail();
        return view('update', ["product"=>$product]);
    }

updatepage

@extends('layouts.app')

@section('content')


<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="container" style="text-align: center;">
        <form method="POST" action="{{ route('update') }}">
            @csrf
            <h3>პროდუქტის განახლება</h3>
            <input type="hidden" name="id" value="{{ $Products->id }}">
            <br>
            <label><b>პროდუქტის სახელი</b></label>
            
            <input value="{{ $Products->title }}" class="form-control" type="text" name="name" placeholder="პროდუქტის სახელი...">
            
            <br>
            <label><b>პროდუქტის აღწერა</b></label>
            
            <textarea class="form-control" name="description" placeholder="პროდუქტის აღწერა...">{{ $Products->description }}</textarea>
            <br>
            <button class="btn btn-primary" type="submit" >განახლება</button>
        </form>
    </div>
        </div>
    </div>
</div>
@endsection

controller@update

public function update(Request $request,$id)
    {
        products::where("id",$id)->update([
            "title"=>$request->input("title"),
            "description"=>$request->input("description"),
            "price"=>$request->input("price")
            ]);
        return redirect()->route("productsPage");
    }

--------------------------------------------------
delete


 <form method="post" action="{{ route('destroy') }}">
	                        @csrf
	                            <input type="hidden" name="id" value="{{ $product->id }}">
	                            <button style="margin: 1%;" class="btn btn-outline-danger">წაშლა</button>
	                        </form>

controller@destoy

public function destroy(Request $request)
    {
        products::where("id",$request->input("id"))->delete();
        return redirect()->back();
    }

---------------------------------------------------------------------------------------------------
RELATIONSHIPS
---------------------------------------------------------------------------------------------------

ONE TO ONE

class User extends Model
{
    public function phone()
    {
        return $this->hasOne(Phone::class);
    }
}

class Phone extends Model
{
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}


ONE TO MANY

class Post extends Model
{
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}

class Comment extends Model
{
    public function post()
    {
        return $this->belongsTo(Post::class);
    }
}


MANY TO MANY

class User extends Model
{
    public function roles()
    {
        return $this->belongsToMany(Role::class, 'role_user', 'user_id', 'role_id');
    }
}

class Role extends Model
{
    public function users()
    {
        return $this->belongsToMany(User::class);
    }
}