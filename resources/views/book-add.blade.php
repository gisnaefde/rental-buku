@extends ('layout.mainlayout')
@section('title', 'Add-Book')

@section('content')

<!-- Menambhkan cdn select2 agar nantinya dapat men select lebih dari satu kategori -->
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" /> 

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
    <form action="/book-add" method="POST" enctype="multipart/form-data"> 
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
                <lable for="image" class="form-lable">Image</lable>
                <input type="file" name="image" id="cover " class="form-control mt-2" placeholder="Book Cover">
            </div>
            <div class="mt-2">
                <lable for="category" class="form-lable">Category</lable>
                <select name="categories[]" id="category" class="form-control mt-2 select-multiple"  multiple>
                <!-- name="categories[]" merupakan inputan yang dikirim, nantinya berbentuk array -->
                    @foreach($categories as $item)
                    <option value="{{$item->id}}">{{$item->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="mt-2">
                <button class="btn btn-success mt-2" type="submit">Save</button>
            </div>
        </div>
    </form>
 </div>
 <!-- Menambhkan jquery -->
 <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>  

 <!-- Menambhkan cdn select2 agar nantinya dapat men select lebih dari satu kategori -->
 <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
 
 <script>
    $(document).ready(function() {
        $('.select-multiple').select2();
    });
 </script>
@endsection