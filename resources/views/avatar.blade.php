<x-layout>
    <form action="/manage-avatar" method="post" enctype="multipart/form-data">
        @csrf
        <h2>Manage Avatar</h2>
        <input type="file" name="avatar" id="avatar">
        <button type="submit">Submit</button>
    </form>
</x-layout>
