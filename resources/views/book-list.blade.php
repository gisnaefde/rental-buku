@extends ('layout.mainlayout')
@section('title', 'Books')

@section('content')

<div class="m-5">
    <form action="" method="get" class="mb-5">
        <div class="row">
            <div class="col-12 col-md-6">
                <select class="form-select" id="category" name="category">
                    <option value="">Select Category</option>
                    @foreach($categories as $item)
                    <option value="{{$item->id}}">{{$item->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-12 col-md-6">
                <div class="input-group mb-3">
                    <input type="text" name="title" class="form-control" placeholder="Search Title" aria-label="Recipient's username" aria-describedby="basic-addon2">
                    <button type="submit" class="input-group-text bg-primary text-white" id="basic-addon2">Submit</button>
                </div>
            </div>
        </div>
    </form>
    <div class="row">
        @foreach($books as $item)
        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-xs-12 my-3 ">
            <div class="card h-100">
                <img src=" {{ $item->cover != null ? asset('/storage/cover/'.$item->cover) : asset('/images/cover_not_found.jpeg') }}" class="card-img-top p-4" alt="/" height="300px">
                <div class="card-body">
                    <h5 class="card-title">{{$item->book_code}}</h5>
                    <p class="card-text">{{$item->title}}</p>
                    <p class="text-end text {{$item->status == "in stock" ? "text-primary" : "text-danger"}}">{{$item->status}}</p>
                </div>
            </div>
        </div>
        @endforeach
    </div>

</div>
@endsection