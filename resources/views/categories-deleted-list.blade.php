@extends ('layout.mainlayout')
@section('title', 'Category Deleted')

@section('content')
<h3>Category Deleted List</h3>
<div class="mt-3 d-flex justify-content-end">
    <a href="categories" class="btn btn-primary">Back</a>
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
            @foreach ($categoriesDeleted as $item)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$item->name}}</td>
                <td>
                    <a href="categories-restore/{{$item->slug}}">Restore</a>
                </td>
            </tr>
            @endforeach

        </tbody>
    </table>
</div>
@endsection