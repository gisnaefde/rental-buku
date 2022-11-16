@extends ('layout.mainlayout')
@section('title', 'Users')

@section('content')
<h3>Users List</h3>
<div class="mt-3 d-flex justify-content-end">
    <a href="/registered-users" class="btn btn-primary">New Registered User</a>
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
                    <a href="/user-detail/{{$item->slug}}">Detail</a>
                    <a href="/user-delete/{{$item->slug}}">Delete User</a>
                </td>
            </tr>
            @endforeach

        </tbody>
    </table>
</div>
@endsection