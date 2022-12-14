<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rental Buku | @yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
</head>

<body>
    <div class="main d-flex flex-column justify-content-between">
        <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">Rental Buku</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>
        </nav>
        <div class="body-content h-100">
            <div class="row g-0 h-100">
                <div class="sidebar bg-secondary col-lg-2 collapse d-lg-block " id="navbarTogglerDemo02">
                    {{-- @if(Auth::user()) digunakan agar yang bisa mengakses kode dibawah hanya untuk user, jadinya public dapat mengakses kode dibawah --}}
                    @if(Auth::user())
                    @if (Auth::user()->roles_id == 1)
                    <a href="/dashboard" class=" {{ (request()->is('dashboard')) ? 'active' : '' }}">Dashboard</a>
                    <a href="/books" class=" {{ (request()->is('books')) || (request()->is('book-add')) || (request()->is('book-edit/*')) || (request()->is('book-delete/*')) || (request()->is('/book-destroy/*')) || (request()->is('book-deleted')) || (request()->is('book-restore/*'))  ? 'active' : '' }}">Books</a>
                    <a href="/categories" class=" {{ (request()->is('categories')) || (request()->is('categories-add')) || (request()->is('categories-edit/*')) || (request()->is('categories-delete/*')) || (request()->is('categories-destroy/*'))  || (request()->is('categories-deleted'))  || (request()->is('categories-restore/*')) ? 'active' : '' }}">Categories</a>
                    <a href="/users" class=" {{ (request()->is('users')) || (request()->is('registered-users')) || (request()->is('user-detail/*')) || (request()->is('users-approve/*')) || (request()->is('user-delete/*')) || (request()->is('user-destroy/*')) || (request()->is('user-deleted')) || (request()->is('user-restore/*')) ? 'active' : '' }}">Users</a>
                    <a href="/rent-logs" class=" {{ (request()->is('rent-logs')) ? 'active' : '' }}">Rent Logs</a>                    
                    <a href="/" class=" {{ (request()->is('/')) ? 'active' : '' }}">Book List</a>
                    <a href="/book-rent"  class=" {{ (request()->is('book-rent')) ? 'active' : '' }}">Book Rent</a>
                    <a href="/logout" >Logout</a>
                    @else
                    <a href="profile" class=" {{ (request()->is('profile')) ? 'active' : '' }}">Profile</a>
                    <a href="/" class=" {{ (request()->is('/')) ? 'active' : '' }}">Book List</a>
                    <a href="logout">Logout</a>
                    @endif
                    @endif
                </div>
                <div class="content p-4 col-lg-10">
                    @yield('content')
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>

</html>