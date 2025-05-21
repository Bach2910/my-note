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
        <div class="form-container">
            <p class="title">Register</p>
            <form class="form" action="{{ route('register.process') }}" method="POST">
                @csrf
                <div class="input-group">
                    <label for="name">Username</label>
                    <input type="text" name="name" id="name" placeholder=""/>
                </div>
                @if($errors->has('name'))
                    <p style="color:red;">{{ $errors->first('name') }}</p>
                @endif
                <div class="input-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" placeholder=""/>
                </div>
                @if($errors->has('email'))
                    <p style="color:red;">{{ $errors->first('email') }}</p>
                @endif
                <div class="input-group">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" placeholder=""/>
                    <button type="button" class="eye" onclick="toggleType()" id="eye"><i class="fa-solid fa-eye"></i></button>
                </div>
                @if($errors->has('password'))
                    <p style="color:red;">{{ $errors->first('password') }}</p>
                @endif
                <div class="input-group">
                    <label for="password">Confirm Password</label>
                    <input type="password" name="password_confirmation" id="password_confirmation" placeholder=""/>
                    <button type="button" class="eye" onclick="toggleType2()" id="eye2"><i class="fa-solid fa-eye"></i></button>
                </div>
                <button class="sign">Sign Up</button>
            </form>
            <p class="signup">
                You have an account?
                <a rel="noopener noreferrer" href="{{route('login')}}" class="">Sign In</a>
            </p>
        </div>
    </div>
@endsection
