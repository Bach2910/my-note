@extends('layout.home')
@section('content')
    <h1>List of Students</h1>
    @can('create')
        <div class="d-flex gap-3 mb-2">
            @can('create')
                <a class="btn btn-primary" href="{{ route('students.create') }}">Create</a>
            @endcan
            @can('view')
                <a class="btn btn-success" href="{{route('api.student')}}">List students JSON</a>
            @endcan
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
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Address</th>
            <th scope="col">Gender</th>
            <th scope="col">Image</th>
            <th scope="col">Class ID</th>
            <th scope="col">Student ID</th>
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
                        @php
                            $images = explode(',', $student->image);
                        @endphp
                        <p> {{ count($images) }} image</p>
                    @endif
                </td>
                <td>{{ $student->student_id }}</td>
                <td>{{ $student->classes ? $student->classes->name : 'Không có lớp' }}</td>
                @can('view')
                    <td>
                        @can('edit')
                            <a href="{{ route('students.edit', $student->id) }}" class="btn btn-primary"
                               type="button"><i class="fa-solid fa-pencil"></i>
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

