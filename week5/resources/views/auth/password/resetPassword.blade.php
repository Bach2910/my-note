@extends('layout.account')
@section('title','Reset Password')
@section('content')
    <div class="form-center">
        <div class="form-container">
            <p class="title">Reset Password</p>
            @if(session('error'))
                <p style="  color:red;">{{ session('error') }}</p>
            @endif
            <form class="form" action="{{ route('password.update') }}" method="POST">
                @csrf
                <input type="hidden" name="token" value="{{ $token }}">
                <div class="input-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" placeholder="" />
                </div>
                @if($errors->has('email'))
                    <p style="color:red">{{$errors->first('email')}}</p>
                @endif
                <div class="input-group">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" placeholder="" />
                    <button type="button" class="eye" onclick="toggleType()" id="eye"><i class="fa-solid fa-eye"></i></button>
                </div>
                @if($errors->has('password'))
                    <p style="color:red">{{$errors->first('password')}}</p>
                @endif
                <div class="input-group">
                    <label for="password">Confirm Password</label>
                    <input type="password" name="password_confirmation" id="password_confirmation" placeholder="" />
                    <button type="button" class="eye" onclick="toggleType2()" id="eye2"><i class="fa-solid fa-eye"></i></button>
                </div>
                <button class="sign">Sign in</button>
            </form>
        </div>
    </div>
@endsection

