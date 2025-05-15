@extends('layout.account')
@section('title','Register')
@section('content')
@if(session('error'))
    <p style="color:red;">{{ session('error') }}</p>
@endif
@if(session('success'))
    <p style="color:green;">{{ session('success') }}</p>
@endif
<div class="form-center">
    <form class="form" action="{{ route('register.process') }}" method="POST">
        @csrf
        <p class="heading">Register</p>
        <input class="input" placeholder="Username" type="text" name="name">
        <input class="input" placeholder="Email" type="text" name="email">
        <input class="input" placeholder="Password" type="password" name="password">
        <input class="input" placeholder="re-enter password" type="password" name="password_confirmation">
        <div class="d-flex gap-3">
            <button class="btn">Submit</button>
            <button class="btn"><a style="text-decoration: none;color:black" href="{{route('login')}}">Sign In</a>
            </button>
        </div>
    </form>
</div>
@endsection
