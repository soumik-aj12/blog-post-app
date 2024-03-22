<x-layout>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form action="users" method="POST">
                        @csrf
                        <h2>Enter email and password:-</h2>
                        <input type="email" placeholder="Enter email:-" name="loginemail"/>@error('email') <span style="color: red">{{$message}}</span> @enderror<br>
                        <input type="password" placeholder="Enter Password:-" name="loginpassword"/>@error('password') <span style="color: red">{{$message}}</span> @enderror<br>
                        <button type="submit">Submit</button>
                    </form>
                    <h4>New User? <a href="/register">Register!</a></h4>
                </div>
            </div>
        </div>
    </div>
</div>
</x-layout>

