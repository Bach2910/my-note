
@extends($layout)
@section('title','List of Classes')
@section('content')
    <h3 class="mt-3 mb-3 text-center">List of Classes</h3>
    @can('create')
        <a class="btn btn-primary mb-2" href="{{ route('classes.create') }}">Create</a>
    @endcan
    <table border="1" cellpadding="10" cellspacing="0" class="table table-hover">
        <thead>
        <tr>
            <th>Name</th>
            <th>Year</th>
            <th>Code Class</th>
            <th>Max students</th>
            <th>Department</th>
            @can('edit')
                <th>Actions</th>
            @endcan
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
                    @can('edit')
                        <a class="btn btn-primary" href="{{ route('classes.edit', $class->id) }}">
                            <i class="fa-solid fa-pencil"></i>
                        </a>
                    @endcan
                    @can('view')
                        <a class="btn btn-success" href="{{ route('classes.show', $class->id) }}">
                            <i class="fa-solid fa-book"></i>
                        </a>
                    @endcan
                    @can('delete')
                        <form action="{{ route('classes.destroy', $class->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger" type="submit"
                                    onclick="return confirm('Are you sure you want to delete this class {{$class -> name}}')">
                                <i class="fa-solid fa-trash"></i></button>
                        </form>
                    @endcan
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

@endsection


