<x-profile :sharedData="$sharedData">
    <div class="list-group">
        @foreach($followers as $follower)
        <p><img src="{{$follower->userFollowingSomeone->avatar}}" alt="{{$follower->userFollowingSomeone->name}}'s Avatar"
                style="width: 32px;height: 32px;border-radius: 16px"><a href="/profile/{{$follower->userFollowingSomeone->name}}">{{$follower->userFollowingSomeone->name}}</a>
        @endforeach
    </div>
</x-profile>