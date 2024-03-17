<x-layout>
    <h2>{{$post->title}}</h2>
    <p>{!!$post->body!!}</p>
    <p>Posted By {{$post->getUser->name}} <small>on {{$post->created_at->format('n/j/Y')}}</small></p>
    <p><a href="/posts">Go Back</a></p>
</x-layout>
