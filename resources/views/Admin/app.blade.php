<!doctype html>
<html lang="en">

<head>
    <title>
        @yield('title')
    </title>
    <link rel="icon" type="image/x-icon" href="{{asset('favicon.ico')}}">
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">

    @yield('styles')
</head>

<body>
    @auth

        <header class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                {{ Auth::user()->name }}
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="{{ route('dashboard.users.edit', Auth::user()->id) }}">My
                                        Profile</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="{{ route('dashboard.auth.logout') }}">Logout</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </header>

        <aside>
            <nav>
                <div class="logo">
                    <a class="h4 text-decoration-none text-black" href="/">
                        CRM
                    </a>
                </div>

                <div class="navigation">
                    <ul>
                        <li>
                            <a href="{{ route('dashboard.users.index') }}">
                                <span class="me-1"><i class="fa-solid fa-user"></i></span>
                                Users
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('dashboard.clients.index') }}">
                                <span class="me-1">
                                    <i class="fa-solid fa-address-card"></i>
                                </span>
                                Clients
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('dashboard.projects.index') }}">
                                <span class="me-1">
                                    <i class="fa-solid fa-file-import"></i>
                                </span>
                                Projects
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('dashboard.tasks.index') }}">
                                <span class="me-1">
                                    <i class="fa-solid fa-list-check"></i>
                                </span>
                                Tasks
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>
        </aside>
    @endauth

    <main>
        @yield('content')
    </main>

    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
        integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
        integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
    </script>
    @yield('scripts')
</body>

</html>
