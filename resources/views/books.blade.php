@extends ('layout.mainlayout')
@section('title', 'Books')

@section('content')
<h3>Books List</h3>
<div class="mt-3 d-flex justify-content-end">
    <a href="book-add" class="btn btn-primary">Add Data</a>
</div>
@if (session('status'))
    <div class="alert alert-success mt-3">
        {{ session('status') }}
    </div>
@endif
<div class="mt-4">
    <table class="table">
        <thead>
            <tr>
                <th>No</th>
                <th>Code</th>
                <th>Title</th>
                <th>Category</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($books as $item)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$item->book_code}}</td>
                <td>{{$item->title}}</td>
                <td>
                <!-- categories merupakan nama function relasi tabelnya yang terdapat dalam model book -->
                    @foreach ($item->categories as $category) 
                        {{$category->name}} <br>
                    @endforeach
                </td>
                <td>{{$item->status}}</td>
                <td>
                    <a href="book-edit/{{$item->slug}}">Edit</a>
                    <a href="#">Delete</a>
                </td>
            </tr>
            @endforeach

        </tbody>
    </table>
</div>
@endsection