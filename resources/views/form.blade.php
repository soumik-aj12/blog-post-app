<x-layout>
    <div>
        {{session('registered')}}
    </div>
    @auth
        <div class="text-danger">
            {{session('success')}}
        </div>
        <div>
            <h2>Welcome {{auth()->user()->name}}</h2>
            <div>
                <p class="text-bg-success">Your Email:-{{auth()->user()->email}}</p>
                <p>Account Created At:-{{auth()->user()->created_at}}</p>
            </div>
        </div>
    @else
        <div class="text-danger">
            {{session('success')}}
        </div>

    @endauth

</x-layout>
