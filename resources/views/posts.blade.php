<x-layout>
    <h1>Posts</h1>
    <div>

        <?php foreach ($posts as $post): ?>
        <article>
            <h2><a href= {{"posts/".$post->id}}>{{$post->title }}</a></h2>
            {!!$post->body!!}
        </article>
        <?php endforeach;?>



    </div>
</x-layout>

