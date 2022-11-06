@extends ('layout.mainlayout')
@section('title', 'Add-Category')

@section('content')
 <h3>Add New Category</h3>
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
    <form action="categories-add" method="POST">
        @csrf
        <div>
            <lable for="name" class="form-lable">Name</lable>
            <input type="text" name="name" id="name " class="form-control mt-2" placeholder="Category Name">
            <button class="btn btn-success mt-2" type="submit">Save</button>
        </div>
    </form>
 </div>
@endsection