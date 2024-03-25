<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
<div id="app">
    <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">
                {{ config('app.name', 'Laravel') }}
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav me-auto">

                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ms-auto m-2">
                    <!-- Authentication Links -->
                    @guest
                            <li class="nav-item">
                                <a class="nav-link" href="/login" class="btn btn-primary">Login</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="/register" class="btn btn-dark">Register</a>
                            </li>
                    @else
                        <li class="nav-item dropdown">
                            <a href="/manage-avatar"><img src="{{auth()->user()->avatar}}" alt="{{auth()->user()->name}}'s Avatar" style="width: 32px;height: 32px;border-radius: 16px"></a>
                        </li>
                        <li>
                            <a href="/profile/{{auth()->user()->name}}" class="btn btn-primary mx-2">View Profile</a>
                        </li>
                        <li>
                            <a href="/create-post" class="btn btn-primary mx-2">Create Post</a>
                        </li>
                        <li>
                            <form action="/logout" method="post" id="logout-form">
                                @csrf
                                <button class="btn btn-danger mx-2">Logout</button>
                            </form>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>

    <main class="py-4">
            @if (session()->has('success'))
                <div class="container container--narrow">
                    <div class="alert alert-success text-center">
                        {{session('success')}}
                    </div>
                </div>
            @endif
            @if (session()->has('failure'))
                <div class="container container--narrow">
                    <div class="alert alert-danger text-center">
                        {{session('failure')}}
                    </div>
                </div>
            @endif
        {{$slot}}
    </main>
</div>
</body>
</html>
