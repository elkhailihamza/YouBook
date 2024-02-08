<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>YouBook</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid d-flex justify-content-between">
            <div>
                <a class="navbar-brand" href="{{ route('book.index') }}">YouBook</a>
            </div>
            <div>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mb-2 mb-lg-0 gap-2">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="{{ route('book.index') }}">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('book.viewList') }}">View</a>
                        </li>
                        @auth
                        @if(Auth::user()->role_id == '2')
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('book.create') }}">Create</a>
                        </li>
                        @endif
                        @endauth
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('book.reservation') }}">Reservations</a>
                        </li>
                        @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('auth.login') }}">
                                <span class="text-primary text-monospace">Log-in</span>
                            </a>
                        </li>
                        @else
                        <div class="btn-group">
                            <button type="button" class="btn border-0" data-bs-toggle="dropdown" aria-expanded="false">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"
                                    fill="none" stroke="#000000" stroke-width="1.5" stroke-linecap="round"
                                    stroke-linejoin="round">
                                    <line x1="3" y1="12" x2="21" y2="12"></line>
                                    <line x1="3" y1="6" x2="21" y2="6"></line>
                                    <line x1="3" y1="18" x2="21" y2="18"></line>
                                </svg>
                            </button>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li><button class="dropdown-item" type="button"><span><svg
                                                xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                                viewBox="0 0 24 24" fill="none" stroke="#000000" stroke-width="1.5"
                                                stroke-linecap="round" stroke-linejoin="round">
                                                <path d="M5.52 19c.64-2.2 1.84-3 3.22-3h6.52c1.38 0 2.58.8 3.22 3" />
                                                <circle cx="12" cy="10" r="3" />
                                                <circle cx="12" cy="12" r="10" />
                                            </svg></span>Profile</button></li>
                                <li><button class="dropdown-item" type="button"><span><svg
                                                xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                                viewBox="0 0 24 24" fill="none" stroke="#000000" stroke-width="1.5"
                                                stroke-linecap="round" stroke-linejoin="round">
                                                <circle cx="12" cy="12" r="3"></circle>
                                                <path
                                                    d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z">
                                                </path>
                                            </svg></span>Settings</button></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li>
                                    <form method="post" action="{{ route('auth.logout') }}">
                                        @csrf
                                        @method('post')
                                        <button type="submit" class="dropdown-item"><span><svg
                                                    xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                                    viewBox="0 0 24 24" fill="none" stroke="#000000" stroke-width="1.5"
                                                    stroke-linecap="round" stroke-linejoin="round">
                                                    <path d="M16 17l5-5-5-5M19.8 12H9M10 3H4v18h6" />
                                                </svg></span>Logout</button>
                                    </form>
                                </li>
                            </ul>
                        </div>
                        @endguest
                    </ul>
                </div>
            </div>
        </div>
    </nav>
    @if($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    @if(Session::has('success'))
    @if(is_array(Session::get('success')))
    @foreach(Session::get('success') as $message)
    <div class="alert alert-success">
        {{ $message }}
    </div>
    @endforeach
    @else
    <div class="alert alert-success">
        {{ Session::get('success') }}
    </div>
    @endif
    @endif
    @yield('content')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
</body>

</html>