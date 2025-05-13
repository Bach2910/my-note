@extends('layout.layout')
@section('title','Login Form')
@if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
@endif
<div class="container-fluid">
    <div class="row">
        <div class="col-md-4 text-white d-flex flex-column justify-content-center align-items-center p-4">
            <h3 class="text-center">Login</h3>
            @if($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form class=" w-100" method="POST" action="{{ route('login') }}">
                @csrf
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>
                    <div class="mb-3 form-check form-check d-flex justify-content-between align-items-center">
                        <input type="checkbox" class="form-check-input" id="remember" name="remember">
                        <label class="form-check-label" for="remember">Remember Me</label>
                        <a style="margin-left: auto;" href="{{route('password.request')}}">Forgot Password</a>
                    </div>
                    <div class="button-group">
                        <button type="submit" class="btn btn-primary">Login</button>
                        <a href="{{ route('register') }}" class="btn btn-secondary">Register</a>
                    </div>
                </form>
        </div>
    </div>
</div>

