<x-layout>


    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h2><img src="{{$avatar}}" alt="{{$name}}'s Avatar" style="width: 50px;height: 50px;border-radius: 16px"> {{$name}}</h2>
                @if(auth()->user()->name === $name)
                    <p>Email:- {{auth()->user()->email}}</p>
                    <p>Account Created at:- {{auth()->user()->created_at}}</p>
                @endif
                <div class="card">
                    <div class="card-header">Posts - <small>{{$postCount}}</small></div>
                    <div class="card-body">
                        @foreach($posts as $post)
                            <p><img src="{{$post->getUser->avatar}}" alt="{{$post->getUser->name}}'s Avatar" style="width: 32px;height: 32px;border-radius: 16px"><a href="/posts/{{$post->id}}">{{$post->title}}</a> - {{$post->created_at->format('n/j/Y')}}</p>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>
