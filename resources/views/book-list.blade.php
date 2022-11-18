@extends ('layout.mainlayout')
@section('title', 'Books')

@section('content')
<div class="m-5">
    <div class="row">
        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-xs-12 mt-2 ">
            <div class="card">
                <img src="{{ asset('/images/cover_not_found.jpeg') }}" class="card-img-top p-4" alt="/" height="500px">
                <div class="card-body">
                    <h5 class="card-title">Book Code</h5>
                    <p class="card-text">title</p>
                    <p class = "text-end">In Stock</p>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-xs-12 mt-2 ">
            <div class="card">
                <img src="{{ asset('/images/cover_not_found.jpeg') }}" class="card-img-top p-4" alt="/" height="500px">
                <div class="card-body">
                    <h5 class="card-title">Book Code</h5>
                    <p class="card-text">title</p>
                    <p class = "text-end">In Stock</p>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-xs-12 mt-2 ">
            <div class="card">
                <img src="{{ asset('/images/cover_not_found.jpeg') }}" class="card-img-top p-4" alt="/" height="500px">
                <div class="card-body">
                    <h5 class="card-title">Book Code</h5>
                    <p class="card-text">title</p>
                    <p class = "text-end">In Stock</p>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-xs-12 mt-2 ">
            <div class="card">
                <img src="{{ asset('/images/cover_not_found.jpeg') }}" class="card-img-top p-4" alt="/" height="500px">
                <div class="card-body">
                    <h5 class="card-title">Book Code</h5>
                    <p class="card-text">title</p>
                    <p class = "text-end">In Stock</p>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection