<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<link rel="stylesheet" href="{{asset('assets/account.css')}}">
<body>
<h2>Login</h2>
@if(session('error'))
    <p style="color:red;">{{ session('error') }}</p>
@endif
<div class="form-center">
    <form class="form" action="{{ route('login.process') }}" method="POST">
        @csrf
        <p class="heading">Login</p>
        <input class="input" placeholder="Email" type="text" name="email">
        <input class="input" placeholder="Password" type="text" name="password">
        <div class="d-flex gap-3">
            <button class="btn">Submit</button>
            <button class="btn"><a style="text-decoration: none;color:black" href="{{route('register')}}">Sign Up</a>
            </button>
        </div>
    </form>
</div>
</body>
</html>
