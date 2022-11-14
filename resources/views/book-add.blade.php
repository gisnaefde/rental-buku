@extends ('layout.mainlayout')
@section('title', 'Add-Book')

@section('content')
 <h3>Add New Book</h3>
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
 <!-- enctype="multipart/form-data" digunakan karena dalam inputan terdapat inputan berupa file -->
    <form action="#" method="POST" enctype="multipart/form-data"> 
        @csrf
        <div>
            <div class="mt-2">
                <lable for="code" class="form-lable">Code</lable>
                <input type="text" name="book_code" id="code " class="form-control mt-2" placeholder="Book Code" value="{{ old('book_code') }}">
                <!-- value="{{ old('book_code') }}" digunakan ketika terjadi inputan error maka inputan lama akan tetap ada -->
            </div>
            <div class="mt-2">
                <lable for="title" class="form-lable">Title</lable>
                <input type="text" name="title" id="title " class="form-control mt-2" placeholder="Book Title" value="{{ old('title') }}">
                <!-- value="{{ old('title') }}" digunakan ketika terjadi inputan error maka inputan lama akan tetap ada -->
            </div>
            <div class="mt-2">
                <lable for="cover" class="form-lable">Code</lable>
                <input type="file" name="cover" id="cover " class="form-control mt-2" placeholder="Book Cover">
            </div>
            <div class="mt-2">
                <button class="btn btn-success mt-2" type="submit">Save</button>
            </div>
        </div>
    </form>
 </div>
@endsection