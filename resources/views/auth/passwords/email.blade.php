@extends('layout.layout')

@section('main')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-4 text-white d-flex flex-column justify-content-center align-items-center p-4">
        <h2>Forgot Password</h2>
        @if (session('status'))
            <div class="alert alert-success">{{ session('status') }}</div>
        @endif
        <form class="w-100" method="POST" action="{{ route('password.email') }}">
            @csrf
            <div class="mb-3">
                <label for="email" class="form-label">Email address</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <button type="submit" class="btn btn-primary">Send Password Reset Link</button>
        </form>
    </div>
@endsection
