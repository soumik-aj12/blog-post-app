<x-layout>


    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Create a blog</div>
                    <div class="card-body">
                        <form action="/create-post" method="POST">
                            @csrf
                            <div class="row mb-3">
                                <label for="title" class="col-md-4 col-form-label text-md-end">Title</label>

                                <div class="col-md-6">
                                    <input id="title" type="text" class="form-control" name="title" value="{{ old('title') }}" required>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="body" class="col-md-4 col-form-label text-md-end">Content</label>

                                <div class="col-md-6">
                                    <textarea class="form-control" name="body" id="body" placeholder="How do you feel?"></textarea><br>

                                </div>
                            </div>
                            <div class="row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        Create
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>
