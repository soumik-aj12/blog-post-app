<x-profile :avatar="$avatar" :postCount="$postCount" :currentlyFollowing="$currentlyFollowing" :name="$name">
    <div class="card">
        <div class="card-body">
            @foreach($posts as $post)
                <p><img src="{{$post->getUser->avatar}}" alt="{{$post->getUser->name}}'s Avatar" style="width: 32px;height: 32px;border-radius: 16px"><a href="/posts/{{$post->id}}">{{$post->title}}</a> - {{$post->created_at->format('n/j/Y')}}</p>
            @endforeach
        </div>
    </div>
</x-profile>
