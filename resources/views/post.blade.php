<x-layout>
    <div>
    <h2>{{$post->title}}</h2>
    <p>{!!$post->body!!}</p>
    <p>Posted By {{$post->getUser->name}} <small>on {{$post->created_at->format('n/j/Y')}}</small></p>
    <a href="">Update</a>
    <form action="/posts/{{$post->id}}" method="post">
        @method('DELETE')
        @csrf
        <button type="submit">Delete</button>
    </form>
    <p><a href="/profile/{{auth()->user()->name}}">Go Back</a></p>
    </div>
</x-layout>
