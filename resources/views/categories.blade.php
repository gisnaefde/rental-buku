@extends ('layout.mainlayout')
@section('title', 'Category')

@section('content')
<h3>Category List</h3>
<div class="mt-3 d-flex justify-content-end">
    <a href="categories-add" class="btn btn-primary">Add Data</a>
</div>
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
                    <a href="#">Edit</a>
                    <a href="#">Delete</a>
                </td>
            </tr>
            @endforeach

        </tbody>
    </table>
</div>
@endsection