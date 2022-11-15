@extends ('layout.mainlayout')
@section('title', 'Books Deleted')

@section('content')
<h3>Books Deleted List</h3>
<div class="mt-3 d-flex justify-content-end">
    <a href="/books" class="btn btn-primary">Back</a>
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
            @foreach ($book as $item)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$item->title}}</td>
                <td>
                    <a href="/book-restore/{{$item->slug}}">Restore</a>
                </td>
            </tr>
            @endforeach

        </tbody>
    </table>
</div>
@endsection