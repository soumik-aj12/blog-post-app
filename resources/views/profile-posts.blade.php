<x-layout>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h2><img src="{{$avatar}}" alt="{{$name}}'s Avatar" style="width: 50px;height: 50px;border-radius: 16px"> {{$name}}</h2>
                @auth
                    @if(!$currentlyFollowing AND auth()->user()->name !== $name)
                    <form action="/create-follow/{{$name}}" method="post" class="ml-2 d-inline">
                        @csrf
                        <button type="submit" class="btn btn-primary btn-sm">Follow</button>
                    </form>
                    @endif
                        @if($currentlyFollowing)
                            <form action="/remove-follow/{{$name}}" method="post" class="ml-2 d-inline">
                                @csrf
                                <button type="submit" class="btn btn-danger btn-sm">Stop Following</button>
                            </form>
                        @endif
                @endauth
                @if(auth()->user()->name === $name)
                    <p>Email:- {{auth()->user()->email}}</p>
                    <p>Account Created at:- {{auth()->user()->created_at}}</p>
                @endif
                <div class="profile-nav nav nav-tabs pt-2 mb-4">
                    <a href="#" class="profile-nav-link nav-item nav-link active">Posts: {{$postCount}}</a>
                    <a href="#" class="profile-nav-link nav-item nav-link">Followers: 3</a>
                    <a href="#" class="profile-nav-link nav-item nav-link">Following: 2</a>
                </div>
                <div class="card">
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
