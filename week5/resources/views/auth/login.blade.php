@extends('layout.account')
@section('title','Login')
@section('content')
@if(session('error'))
    <p style="color:red;">{{ session('error') }}</p>
@endif
<div class="form-center">
    <div class="form-container">
        <p class="title">Login</p>
        <form class="form" action="{{ route('login.process') }}" method="POST">
            @csrf
            <div class="input-group">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" placeholder="" />
            </div>
            <div class="input-group">
                <label for="password">Password</label>
                <input type="password" name="password" id="password" placeholder="" />
                <button type="button" class="eye" onclick="toggleType()" id="eye"><i class="fa-solid fa-eye"></i></button>
                <div class="forgot">
                    <a rel="noopener noreferrer" href="{{route('forget-password')}}">Forgot Password ?</a>
                </div>
            </div>
            <button class="sign">Sign in</button>
        </form>
        <p class="signup">
            Don't have an account?
            <a rel="noopener noreferrer" href="{{route('register')}}" class="">Sign up</a>
        </p>
    </div>
</div>
@endsection

