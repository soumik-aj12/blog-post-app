<x-layout>


    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Create a blog</div>
                    <div class="card-body">
                        <form action="/create-post" method="POST">
                            @csrf
                            <input type="text" name="title" id="title" placeholder="Enter a title:-"><br>
                            <textarea name="body" id="desc" placeholder="Enter a description:-"></textarea><br>
                            <button type="submit">Add Blog</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>
