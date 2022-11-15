@extends ('layout.mainlayout')
@section('title', 'Users')

@section('content')
<h3>Users List</h3>
<div class="mt-3 d-flex justify-content-end">
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
                <th>Username</th>
                <th>Phone</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $item)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$item->username}}</td>
                <td>
                    @if($item->phone != "")
                    {{$item->phone}}
                    @else
                    -
                    @endif
                </td>
                <td>
                    <a href="#">Detail</a>
                    <a href="#">Delete</a>
                </td>
            </tr>
            @endforeach

        </tbody>
    </table>
</div>
@endsection