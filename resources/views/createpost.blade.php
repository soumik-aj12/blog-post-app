<x-layout>
    <div>
        <h2>Create a blog</h2>
        <form action="/create-post" method="POST">
            @csrf
            <input type="text" name="title" id="title" placeholder="Enter a title:-"><br>
            <textarea name="body" id="desc" placeholder="Enter a description:-"></textarea><br>
            <button type="submit">Add Blog</button>
        </form>
    </div>
</x-layout>
