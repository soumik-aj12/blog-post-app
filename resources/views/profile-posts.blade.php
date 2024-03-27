<x-profile :sharedData="$sharedData">
    <div class="list-group">
        @foreach($posts as $post)
        <p><img src="{{$sharedData['avatar']}}" alt="{{$sharedData['name']}}'s Avatar"
                style="width: 32px;height: 32px;border-radius: 16px"><a href="/posts/{{$post->id}}">{{$post->title}}</a>
            - {{$post->created_at->format('n/j/Y')}}</p>
        @endforeach
    </div>
</x-profile>