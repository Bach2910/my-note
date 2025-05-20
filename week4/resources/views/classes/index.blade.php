@extends('layout.home')
@section('title','List of Classes')
@section('content')
    <h3 class="mt-5 mb-5 text-center">List of Classes</h3>

    <a class="btn btn-primary mb-2" href="{{ route('classes.create') }}">Create</a>

    <table border="1" cellpadding="10" cellspacing="0" class="table table-hover">
        <thead>
        <tr>
            <th>Name</th>
            <th>Year</th>
            <th>Code Class</th>
            <th>Max students</th>
            <th>Department</th>

            <th>Actions</th>

        </tr>
        </thead>
        <tbody>
        @foreach ($classes as $class)
            <tr>
                <td>{{ $class->name }}</td>
                <td>{{ $class->course_year }}</td>
                <td>{{$class->class_code}}</td>
                <td>{{$class->max_students}}/50</td>
                <td>{{$class->department->name}}</td>
                <td>

                    <a class="btn btn-primary" href="{{ route('classes.edit', $class->id) }}">
                        <i class="fa-solid fa-pen-to-square"></i>
                    </a>

                    <a class="btn btn-success" href="{{ route('classes.show', $class->id) }}">
                        <i class="fa-solid fa-book"></i>
                    </a>

                    <form action="{{ route('classes.destroy', $class->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger" type="submit"
                                onclick="return confirm('Are you sure you want to delete this class {{$class -> name}}')">
                            <i class="fa-solid fa-trash"></i></button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

@endsection


