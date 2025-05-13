@extends('layout.layout')

@section('main')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-4 text-white d-flex flex-column justify-content-center align-items-center p-4">
        <h2>Reset Password</h2>
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif
        <form class="w-100" method="POST" action="{{ route('password.update') }}">
            @csrf
            <input type="hidden" name="token" value="{{ $token }}">
            <div class="mb-3">
                <label for="email" class="form-label">Email address</label>
                <input type="email" class="form-control" id="email" name="email" value="{{ old('email', $email) }}" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">New Password</label>
                <input type="password" class="form-control @error('password') is-invalid @enderror"  id="password" name="password" required>
                @error('password')
                <span class="invalid-feedback" role="alert">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-3">
                <label for="password-confirm" class="form-label">Confirm New Password</label>
                <input type="password" class="form-control" id="password-confirm" name="password_confirmation" required>
            </div>
            <button type="submit" class="btn btn-primary">Reset Password</button>
        </form>
    </div>
@endsection
