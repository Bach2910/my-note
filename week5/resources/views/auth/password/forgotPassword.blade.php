@extends('layout.account')
@section('title','Forgot Password')
@section('content')
    @if(session('status'))
        <p style="color:red;">{{ session('status') }}</p>
    @endif
    <div class="form-center">
        <div class="form-container">
            <p class="title">Forgot Password</p>
            @if (session('status'))
                <div class="alert alert-success">{{ session('status') }}</div>
            @endif
            <form class="form" method="POST" action="{{ route('forget-password.send') }}">
                @csrf
                <div class="input-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" placeholder="" />
                </div>
                <button class="sign">Sign in</button>
            </form>
        </div>
    </div>
@endsection

