<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('assets/css/permission.css') }}">
</head>
<h1>Change Permission For Role</h1>
@if(session('success'))
    <p style="color: green">{{ session('success') }}</p>
@endif
<div class="main">
    @foreach($roles as $role)
        <div class="card">
            <form action="{{ route('update.permission') }}" method="POST">
                @csrf
                <div class="option_main">
                    <div class="title-role" style="width: 298px">
                        <h3 class="title">{{ $role->name }}</h3>
                    </div>
                    <input type="hidden" name="role_id" value="{{ $role->id }}">
                    <div class="option_item">
                        @foreach($permissions as $permission)
                            <div class="radio-input">
                                <label class="label">
                                    <input type="checkbox" name="permissions[]" value="{{ $permission->name }}"
                                        {{ $role->permissions->contains('name', $permission->name) ? 'checked' : '' }}>
                                    {{ $permission->name }}
                                </label><br>
                            </div>
                        @endforeach
                    </div>
                </div>
                <button type="submit" class="card__btn card__btn-solid">Update</button>
            </form>
        </div>
    @endforeach
</div>

