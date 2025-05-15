@extends('layout.account')
@section('title','Login')
@section('content')
@if(session('error'))
    <p style="color:red;">{{ session('error') }}</p>
@endif
<div class="form-center">
    <form class="form" action="{{ route('login.process') }}" method="POST">
        @csrf
        <p class="heading">Login</p>
        <input class="input" placeholder="Email" type="text" name="email">
        <input class="input" placeholder="Password" type="password" name="password">
        <div class="d-flex gap-3">
            <button class="btn">Submit</button>
            <button class="btn"><a style="text-decoration: none;color:black" href="{{route('register')}}">Sign Up</a>
            </button>
        </div>
    </form>
</div>
@endsection
