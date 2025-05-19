@extends('layout.home')
@section('content')
    <button class="mt-3 btn btn-success"><a class="text-white" style="text-decoration: none"
                                            href="{{ route('roles.create')}}">Add New Role</a></button>
    <table border="1" cellpadding="10" cellspacing="0" class="mb-2 table table-hover mt-3">
        <thead>
        <tr>
            <th scope="col">Name</th>
            <th scope="col">Function</th>
        </tr>
        </thead>
        <tbody>
        @foreach($roles as $role)
            <tr>
                <td>{{$role -> name}}</td>
                <td>
                    <form action="{{route('roles.destroy', $role->id)}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger"><i class="fa-solid fa-trash"></i></button>
                    </form>
                </td>
                @endforeach
            </tr>
        </tbody>
    </table>
@endsection
