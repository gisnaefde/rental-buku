@extends ('layout.mainlayout')
@section('title', 'Category')

@section('content')
<h3>Category List</h3>
<div class="mt-3 d-flex justify-content-end">
    <a href="categories-add" class="btn btn-primary">Add Data</a>
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
                <th>Name</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($categories_ as $item)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$item->name}}</td>
                <td>
                    <a href="categories-edit/{{$item->slug}}">Edit</a>
                    <a href="categories-delete/{{$item->slug}}">Delete</a>
                </td>
            </tr>
            @endforeach

        </tbody>
    </table>
</div>
@endsection