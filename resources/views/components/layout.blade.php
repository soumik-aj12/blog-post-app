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
                <ul class="navbar-nav ms-auto">
                    <!-- Authentication Links -->
                    @guest
                        @if (Route::has('login'))
                            <li class="nav-item">
                                <a class="nav-link" href="/login">Login</a>
                            </li>
                        @endif

                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="/register">Register</a>
                            </li>
                        @endif
                    @else
                        <li class="nav-item dropdown">
                            <a href="/manage-avatar"><img src="{{auth()->user()->avatar}}" alt="{{auth()->user()->name}}'s Avatar" style="width: 32px;height: 32px;border-radius: 16px"></a>
                        </li>
                        <li>
                            <a href="/profile/{{auth()->user()->name}}">View Profile</a>
                        </li>
                        <li>
                            <button type="submit"><a href="/create-post">Create Post</a></button>
                        </li>
                        <li>
                            <form action="/logout" method="post" id="logout-form">
                                @csrf
                                <button class="text-bg-light bg-danger">Logout</button>
                            </form>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>

    <main class="py-4">
        @if(session()->has('failureLogin'))
            <div style="background-color: rgb(255,107,107);color:red">{{session('failureLogin')}}</div>
        @endif
        {{$slot}}
    </main>
</div>
</body>
</html>
