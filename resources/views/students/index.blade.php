@extends('layout.home')
@section('content')
    <h1>List of Students</h1>
    <a href="{{ route('students.create') }}">Create</a>

    <table border="1" cellpadding="10" cellspacing="0">
        <thead>
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Address</th>
            <th>Gender</th>
            <th>Image</th>
            <th>Class ID</th>
            <th>Student ID</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($students as $student)
            <tr>
                <td>{{ $student->name }}</td>
                <td>{{ $student->email }}</td>
                <td>{{ $student->address }}</td>
                <td>{{ $student->gender }}</td>
                <td class="image">
                    @if ($student->image)
                        @foreach (explode(',', $student->image) as $image)
                        <img src="{{ asset($image) }}" alt="Current Image" style="max-width: 50px; max-height: 50px;">
                        @endforeach
                    @endif
                </td>
                <td>{{ $student->classes->name }}</td>
                <td>
                    <a href="{{ route('students.edit', $student->id) }}"><button type="button">Edit</button></a>
                    <form action="{{ route('students.destroy', $student->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('Are you sure?')">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
