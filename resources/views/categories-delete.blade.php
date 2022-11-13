@extends ('layout.mainlayout')
@section('title', 'Delete-Category')

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
<h4>Are you Sure delete <span style="color: red; text-decoration: underline;">{{$categories->name}}</span> ?</h4>
<div class="mt-4">
    <a href="/categories-destroy/{{$categories->slug}}" type="button" class="btn btn-primary">Sure</a>
    <a type="button" class="btn btn-danger">Cancel</a>
</div>
@endsection