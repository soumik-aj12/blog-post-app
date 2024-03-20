<x-layout>
    <div>
        <div class="user-details">
            <h2>Welcome, {{$name}}</h2>
            @if(auth()->user()->name === $name)
                <p>Email:- {{auth()->user()->email}}</p>
                <p>Account Created at:- {{auth()->user()->created_at}}</p>
            @endif
        </div>
        <div class="post-details">
            <h2>Posts:- {{$postCount}}</h2>
            @foreach($posts as $post)
                <p><a href="/posts/{{$post->id}}">{{$post->title}}</a> - {{$post->created_at->format('n/j/Y')}}</p>
            @endforeach
        </div>
    </div>
</x-layout>
