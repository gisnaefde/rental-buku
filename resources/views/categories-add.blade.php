@extends ('layout.mainlayout')
@section('title', 'Add-Category')

@section('content')
 <h3>Add New Category</h3>
 <div class="mt-4 w-50">
    <form action="#" method="POST">
        <div>
            <lable for="name" class="form-lable">Name</lable>
            <input type="text" name="name" id="name " class="form-control mt-2" placeholder="Category Name">
            <button class="btn btn-success mt-2">Save</button>
        </div>
    </form>
 </div>
@endsection