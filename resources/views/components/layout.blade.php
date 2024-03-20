<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laravel App!</title>
    <link rel="stylesheet" href="/app.css">
</head>
<body>
<nav>
    @auth
        <nav>
            <a href="/manage-avatar"><img src="" alt="{{auth()->user()->name}}'s Avatar"></a>
            <a href="/profile/{{auth()->user()->name}}">View Profile</a>
            <button type="submit"><a href="/create-post">Create Post</a></button>
            <form action="/logout" method="post">
                @csrf
                <button>Logout</button>
            </form></nav>
    @else
        <nav>
            <button><a href="/">Home</a></button>
        </nav>
    @endauth
</nav>
@if(session()->has('failureLogin'))
    <div style="background-color: rgb(255,107,107);color:red">{{session('failureLogin')}}</div>
@endif
{{$slot}}
</body>
</html>
