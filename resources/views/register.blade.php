<x-layout>
    <form action="register" method="POST">
        @csrf
        <h2>Register</h2>
        <input type="text" placeholder="Enter name:-" name="name" value={{old('name')}}>
        @error('name') <span style="color: red">{{$message}}</span> @enderror
        <br>
        <input type="email" placeholder="Enter email:-" name="email" value={{old('email')}}>
        @error('email') <span style="color: red">{{$message}}</span> @enderror
        <br>
        <input type="password" placeholder="Enter Password:-" name="password"/>
        @error('password') <span style="color: red">{{$message}}</span> @enderror
        <br>
        <input type="password" placeholder="Repeat Password:-" name="password_confirmation"/>
        @error('password_confirmation') <span style="color: red">{{$message}}</span> @enderror
        <br>
        <button type="submit">Submit</button>
    </form>
    <h4>Already have an account? <a href="/login">Try Logging in!</a></h4>

</x-layout>
