@extends ('layout.mainlayout')
@section('title', 'Book-Rent')

@section('content')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />


<div class="col-12 col-lg-6 col-md-8 offset-md-3 ">
    <h1>Book Rent Form</h1>
    <form method="POST" action="book-rent" class="mt-5">
        @csrf
        <div class="mb-3">
            <label for="user" class="form-lable">User</label>
            <select name="user" id="user" class="form-control">
                <option value="">Select User</option>
                @foreach($user as $item)
                <option value="{{$item->id}}">{{$item->username}}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="book" class="form-lable">Book</label>
            <select name="book" id="book" class="form-control ">
                <option value="">Select Book</option>
                @foreach($books as $item)
                <option value="{{$item->id}}">{{$item->title}}</option>
                @endforeach
            </select>
        </div>
        <div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
    $(document).ready(function() {
        $('#user').select2();
        $('#book').select2();
    });
</script>
@endsection