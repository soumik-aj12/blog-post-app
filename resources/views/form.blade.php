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
        <form action="users" method="POST">
            @csrf
            <h2>Enter email and password:-</h2>
            <input type="email" placeholder="Enter email:-" name="loginemail"/>@error('email') <span style="color: red">{{$message}}</span> @enderror<br>
            <input type="password" placeholder="Enter Password:-" name="loginpassword"/>@error('password') <span style="color: red">{{$message}}</span> @enderror<br>
            <button type="submit">Submit</button>
        </form>
        <h4>New User? <a href="/register">Register!</a></h4>
    @endauth

</x-layout>
