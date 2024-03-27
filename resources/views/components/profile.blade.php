<x-layout>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h2><img src="{{$sharedData['avatar']}}" alt="{{$sharedData['name']}}'s Avatar" style="width: 50px;height: 50px;border-radius: 16px"> {{$sharedData['name']}}</h2>
                @auth
                    @if(!$sharedData['currentlyFollowing'] AND auth()->user()->name !== $sharedData['name'])
                        <form action="/create-follow/{{$sharedData['name']}}" method="post" class="ml-2 d-inline">
                            @csrf
                            <button type="submit" class="btn btn-primary btn-sm">Follow</button>
                        </form>
                    @endif
                    @if($sharedData['currentlyFollowing'])
                        <form action="/remove-follow/{{$sharedData['name']}}" method="post" class="ml-2 d-inline">
                            @csrf
                            <button type="submit" class="btn btn-danger btn-sm">Stop Following</button>
                        </form>
                    @endif
                @endauth
                @if(auth()->user()->name === $sharedData['name'])
                    <p>Email:- {{auth()->user()->email}}</p>
                    <p>Account Created at:- {{auth()->user()->created_at}}</p>
                @endif
                <div class="profile-nav nav nav-tabs pt-2 mb-4">
                    <a href="/profile/{{$sharedData['name']}}" class="profile-nav-link nav-item nav-link {{Request::segment(3) =="" ? "active" : ""}}">Posts: {{$sharedData['postCount']}}</a>
                    <a href="/profile/{{$sharedData['name']}}/followers" class="profile-nav-link nav-item nav-link {{Request::segment(3) =="followers" ? "active" : ""}}">Followers: {{$sharedData['followerCount']}}</a>
                    <a href="/profile/{{$sharedData['name']}}/following" class="profile-nav-link nav-item nav-link {{Request::segment(3) =="following" ? "active" : ""}}">Following: {{$sharedData['followingCount']}}</a>
                </div>
                {{$slot}}
            </div>
        </div>
    </div>
</x-layout>
