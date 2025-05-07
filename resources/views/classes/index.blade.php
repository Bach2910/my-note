@extends('layout.home')
@section('content')
    <h1>List of Classes</h1>
    <a href="{{ route('classes.create') }}">Create</a>

    <table border="1" cellpadding="10" cellspacing="0">
        <thead>
        <tr>
            <th>Name</th>
            <th>Description</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($classes as $class)
            <tr>
                <td>{{ $class->name }}</td>
                <td>{{ $class->description }}</td>
                <td>
                    <a href="{{ route('classes.edit', $class->id) }}"><button type="button">Edit</button></a>
                    <form action="{{ route('classes.destroy', $class->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('Are you sure you want to delete this class?')">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection


