@extends('layout.home')
@section('content')
    <table cellpadding="10" border="1" class="mt-5">
        <thead>
        <tr>
            <th>Role</th>
            <th>Function</th>
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

            </tr>
        @endforeach
        </tbody>
    </table>

@endsection
