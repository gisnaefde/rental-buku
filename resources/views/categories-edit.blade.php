@extends ('layout.mainlayout')
@section('title', 'Edit-Category')

@section('content')
 <h3>Edit Category</h3>
 @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
 <div class="mt-4 w-50">
    <form action="/categories-edit/{{$categories->slug}}" method="POST">
        @csrf
        @method('put')
        <div>
            <lable for="name" class="form-lable">Nama</lable>
            <input type="text" name="name" id="name " class="form-control mt-2" placeholder="Category Name" value="{{$categories->name}}">
            <button class="btn btn-success mt-2" type="submit">Update</button>
        </div>
    </form>
 </div>
@endsection