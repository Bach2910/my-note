@extends('layout.admin')
@section('title','User')
@section('aside')
    <div class="master-container">
        <div class="checkout--footer">
            <label class="price">
                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif</label>
        </div>
        <div class="card cart">
            <label class="title">User Name</label>
            <div class="products">
                <div class="product">
                    <svg fill="none" viewBox="0 0 60 60" height="60" width="60">
                        <rect fill="#FFF6EE" rx="8.25" height="60" width="60"></rect>
                        <image href="{{ asset('images/logo/user.png') }}" x="0" y="0" height="60" width="60"/>
                    </svg>
                    <div>
                        {{Auth::user()->name}}<br>
                        <small>{{Auth::user()->email }}</small>
                    </div>
                </div>
            </div>
        </div>
        <div class="card checkout" style="height: 90%">
            <label class="title">Change Passwords</label>
            <div class="details">
                <form method="POST" action="{{ route('passwords.update') }}">
                    @csrf
                    <div class="mb-3">
                        <label for="current_password" class="form-label">Current Password</label>
                        <input type="password" name="current_password"
                               class="form-control @error('current_password') is-invalid @enderror" required>
                        @error('current_password')
                        <span class="invalid-feedback" role="alert">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="new_password" class="form-label">New Password</label>
                        <input type="password" name="new_password"
                               class="form-control @error('new_password') is-invalid @enderror" required>
                        @error('new_password')
                        <span class="invalid-feedback" role="alert">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="new_password_confirmation" class="form-label">Confirm New Password</label>
                        <input type="password" name="new_password_confirmation" class="form-control" required>
                    </div>
                    <label></label>
                    <button type="submit" class="btn btn-primary">Change Password</button>
                </form>
            </div>
        </div>
    </div>
@endsection
