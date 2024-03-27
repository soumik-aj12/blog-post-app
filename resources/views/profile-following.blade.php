<x-profile :sharedData="$sharedData">
    <div class="list-group">
        @foreach($followers as $follower)
        <p><img src="{{$follower->userBeingFollowed->avatar}}" alt="{{$follower->userBeingFollowed->name}}'s Avatar"
                style="width: 32px;height: 32px;border-radius: 16px"><a href="/profile/{{$follower->userBeingFollowed->name}}">{{$follower->userBeingFollowed->name}}</a>
        @endforeach
    </div>
</x-profile>