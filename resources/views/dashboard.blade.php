@extends ('layout.mainlayout')
@section('title', 'Dashboard')

@section('content')

    <h3>Welcome {{Auth::user()->username}}</h3>
    <div class="row mt-4">
        <div class="col-lg-4">
            <div class="card-data books">
                <div class="row">
                    <div class="col-6"> <i class="bi bi-journal-bookmark"></i> </div>
                    <div class="col-6 d-flex flex-column justify-content-center align-items-end">
                        <div class="card-desc">Books</div>
                        <div class="card-count">{{$book_count}}</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card-data categories">
                <div class="row">
                    <div class="col-6"> <i class="bi bi-list-check"></i> </div>
                    <div class="col-6 d-flex flex-column justify-content-center align-items-end">
                        <div class="card-desc">Categories</div>
                        <div class="card-count">{{$category_count}}</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card-data users">
                <div class="row">
                    <div class="col-6"> <i class="bi bi-people-fill"></i> </div>
                    <div class="col-6 d-flex flex-column justify-content-center align-items-end">
                        <div class="card-desc">Users</div>
                        <div class="card-count">{{$user_count}}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection