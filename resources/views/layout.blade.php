<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('titile')</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" defer></script>
</head>

<body>

    @if ($errors->any())
        <div class="alert alert-danger" role="alert">
            @foreach ($errors->all() as $error)
                <p> {{ $error }}</p>
            @endforeach
        </div>
    @endif
    @if (session()->has('success'))
        <div class="alert alert-success" role="alert">
            {{ session()->get('success') }}
        </div>
    @endif
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="/">GAZA</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        @if (request()->routeIs('Home'))
                            <a class="nav-link active" aria-current="page" href="/">Home</a>
                        @else
                            <a class="nav-link" href="/">Home</a>
                        @endif
                    </li>
                    <li class="nav-item">
                        @if (request()->routeIs('About'))
                            <a class="nav-link active" aria-current="page" href="/about">About</a>
                        @else
                            <a class="nav-link" href="/about">About</a>
                        @endif
                    </li>

                    @auth
                        <li class="nav-item">
                            <a class="nav-link" href="/logout">Logout</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('posts.create') ? 'active' : '' }}"
                                href="/posts/create">Create</a>
                        </li>
                        <li class="nav-item">
                            <p class="nav-link">{{ Auth::user()->name }}</p>
                        </li>
                    @else
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('register') ? 'active' : '' }}"
                                href="/register">Register</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('login') ? 'active' : '' }}" href="/login">Login</a>
                        </li>
                    @endauth

                </ul>
            </div>
        </div>
    </nav>
    <main>
        @yield('content')
    </main>
</body>

</html>
