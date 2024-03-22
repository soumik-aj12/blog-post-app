<x-layout>


    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header"><h2>{{$post->title}}</h2></div>
                    <div class="card-body">
                        <p>{!!$post->body!!}</p>
                        <p>Posted By <img src="{{$post->getUser->avatar}}" alt="{{auth()->user()->name}}'s Avatar" style="width: 32px;height: 32px;border-radius: 16px"> {{$post->getUser->name}} <small>on {{$post->created_at->format('n/j/Y')}}</small></p>
                        <a href="">Update</a>
                        <form action="/posts/{{$post->id}}" method="post">
                            @method('DELETE')
                            @csrf
                            <button type="submit">Delete</button>
                        </form>
                        <p><a href="/profile/{{$post->getUser->name}}">Go Back</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>
