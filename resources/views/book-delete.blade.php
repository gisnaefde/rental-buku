@extends ('layout.mainlayout')
@section('title', 'Delete-Book')

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
<h4>Are you Sure delete <span style="color: red; text-decoration: underline;">{{$book->title}}</span> ?</h4>
<div class="mt-4">
    <a href="/book-destroy/{{$book->slug}}" type="button" class="btn btn-primary">Sure</a>
    <a href="/books" type="button" class="btn btn-danger">Cancel</a>
</div>
@endsection