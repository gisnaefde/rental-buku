<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rental Buku | @yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <style>
        .main {
            height: 100vh;
        }
        .body-content{

        }
        .sidebar{
            background-color: black;
            color: white;
        }
        .sidebar ul {
            list-style: none;
        }
        .sidebar li {
            padding: 10px;
        }
        .sidebar a {
            color: white;
            text-decoration: none;
        }
    </style>
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
                <div class="sidebar bg-secondary col-2">
                    <ul>
                        @if (Auth::user()->roles_id == 1)
                            <li>
                                <a href="#">Dashboard</a>
                            </li>
                            <li>
                                <a href="#">Books</a>
                            </li>
                            <li>Categories</li>
                            <li>Users</li>
                            <li>Rent Logs</li>
                            <li>Logout</li>
                        @else
                            <li>Profile</li>
                            <li>Logout</li>
                        @endif
                    </ul>
                </div>
                <div class="content p-3 col-10">
                    @yield('content')
                </div>
            </div>
        </div>
    </div>
    <div>@yield('content')</div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>

</html>