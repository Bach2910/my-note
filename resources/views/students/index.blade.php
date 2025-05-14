@extends('layout.home')
@section('content')
    <h1>List of Students</h1>
    @can('create')
        <div class="d-flex gap-3 mb-2">
            <a class="btn btn-primary" href="{{ route('students.create') }}">Create</a>
            <a class="btn btn-success" href="{{route('api.student')}}">List students JSON</a>
        </div>
    @endcan
    <form action="{{ route('students.index') }}" method="GET" class="d-flex mb-2" role="search">
        <input type="text" name="search" value="{{ request('search') }}" placeholder="Search..."
               class="form-control me-1" aria-label="Search">
        <button class="search__button">
            <i class="fa fa-search" aria-hidden="true"></i>
        </button>
    </form>
    <table border="1" cellpadding="10" cellspacing="0" class="mb-2 table table-hover">
        <thead>
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Address</th>
            <th>Gender</th>
            <th>Image</th>
            <th>Class ID</th>
            <th>Student ID</th>
            @can('view')
                <th>Actions</th>
            @endcan
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
                            <img src="{{ asset($image) }}" alt="Current Image"
                                 style="max-width: 110px; max-height: 100px;">
                        @endforeach
                    @endif
                </td>
                <td>{{ $student->student_id }}</td>
                <td>{{ $student->classes ? $student->classes->name : 'Không có lớp' }}</td>
                @can('view')
                    <td>
                        @can('edit')
                            <a href="{{ route('students.edit', $student->id) }}">
                                <button class="btn btn-primary" type="button"><i class="fa-solid fa-pencil"></i>
                                </button>
                            </a>
                        @endcan
                        @can('delete')
                            <form action="{{ route('students.destroy', $student->id) }}" method="POST"
                                  style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger" type="submit"
                                        onclick="return confirm('Are you sure that you want to delete this {{$student->name}}')">
                                    <i class="fa-solid fa-trash"></i>
                                </button>
                            </form>
                        @endcan
                    </td>
                @endcan
            </tr>
        @endforeach
        </tbody>
    </table>
    {{ $students->appends(['search' => request('search')])->links() }}
@endsection

