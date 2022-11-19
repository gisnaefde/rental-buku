@extends ('layout.mainlayout')
@section('title', 'Book-Rent')

@section('content')

<div class="col-12 col-lg-6 col-md-8 offset-md-3 ">
    <h1>Book Rent Form</h1>
    <form method="post." class="mt-5">
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
            <select name="book" id="user" class="form-control">
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

@endsection