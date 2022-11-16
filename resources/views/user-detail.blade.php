@extends ('layout.mainlayout')
@section('title', 'Derail User')

@section('content')
<h3>Detail Users</h3>
<div class="mt-3 d-flex justify-content-end">
    <!-- agar Tombol Approved user hanya aktif jika status user inactive -->
    @if($user->status == 'inactive') 
    <a href="/users-approve/{{$user->slug}}" class="btn btn-info">Approved User</a>
    @endif
</div>
@if (session('status'))
    <div class="alert alert-success mt-3">
        {{ session('status') }}
    </div>
@endif
<div class="mt-4 w-25">
    <div class="mb-3">
        <label class="from-lable">Username</label>
        <input class="form-control" readonly value="{{$user->username}}">
    </div>
    <div class="mb-3">
        <label class="from-lable">Phone</label>
        <input class="form-control" readonly value="{{$user->phone}}">
    </div>
    <div class="mb-3">
        <label class="from-lable">Address</label>
        <textarea class="form-control" readonly value="{{$user->address}}"></textarea>
    </div>
    <div class="mb-3">
        <label class="from-lable">Status</label>
        <input class="form-control" readonly value="{{$user->status}}">
    </div>
</div>
@endsection