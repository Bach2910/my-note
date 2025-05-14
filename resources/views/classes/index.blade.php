@extends('layout.home')
@section('content')
    <h1>List of Classes</h1>
    <a href="{{ route('classes.create') }}">Create</a>

    <table border="1" cellpadding="10" cellspacing="0" class="table table-hover">
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
                    <a href="{{ route('classes.edit', $class->id) }}"><button class="btn btn-primary" type="button"><i class="fa-solid fa-pencil"></i></button></a>
                    <a href="{{ route('classes.show', $class->id) }}"><button class="btn btn-success" type="button"><i class="fa-solid fa-book"></i></button></a>
                    <form action="{{ route('classes.destroy', $class->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger" type="submit" onclick="return confirm('Are you sure you want to delete this class {{$class -> name}}')"><i class="fa-solid fa-trash"></i></button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection


