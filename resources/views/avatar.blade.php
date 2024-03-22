<x-layout>


    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <form action="/manage-avatar" method="post" enctype="multipart/form-data">
                            @csrf
                            <h2>Manage Avatar</h2>
                            <input type="file" name="avatar" id="avatar">
                            <button type="submit">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>
