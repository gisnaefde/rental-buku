@extends ('layout.mainlayout')
@section('title', 'Delete-User')

@section('content')
 @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<h4>Are you Sure delete <span style="color: red; text-decoration: underline;">{{$user->username}}</span> ?</h4>
<div class="mt-4">
    <a href="/user-destroy/{{$user->slug}}" type="button" class="btn btn-primary">Sure</a>
    <a href="/users" type="button" class="btn btn-danger">Cancel</a>
</div>
@endsection