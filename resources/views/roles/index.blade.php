@extends('layout.home')
@section('content')
    @foreach($roles as $role)
        {{$role -> name}}
        <form action="{{route('roles.destroy', $role->id)}}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit">Delete</button>
        </form>
    @endforeach
@endsection
