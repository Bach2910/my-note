@extends('layout.account')
@section('title','Login')
@section('content')

<div class="form-center">
    <div class="form-container">
        <p class="title">Login</p>
        @if(session('error'))
            <p style="color:red;">{{ session('error') }}</p>
        @endif
        <form class="form" action="{{ route('login.process') }}" method="POST">
            @csrf
            <div class="input-group">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" placeholder="" />
            </div>
            @if($errors->has('email'))
                <p style="color:red;">{{ $errors->first('email') }}</p>
            @endif
            <div class="input-group">
                <label for="password">Password</label>
                <input type="password" name="password" id="password" placeholder="" />
                <button type="button" class="eye" onclick="toggleType()" id="eye"><i class="fa-solid fa-eye"></i></button>
                @if($errors->has('password'))
                    <p style="color:red;">{{ $errors->first('password') }}</p>
                @endif
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

