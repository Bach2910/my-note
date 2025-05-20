@extends('layout.home')
@section('title','List of Students')
@section('content')
    <h3 class="mt-5 mb-5 text-center">List of Students</h3>

    <div class="d-flex gap-3 mb-2">
        <a class="btn btn-primary" href="{{ route('students.create') }}">Create</a>
    </div>

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
            <th scope="col">Address</th>
            <th scope="col">Birth Date</th>
            <th scope="col">Image</th>
            <th scope="col">MSV</th>
            <th scope="col">Class ID</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($students as $student)
            <tr>
                <td>{{ $student->full_name }}</td>
                <td>{{ $student->address }}</td>
                <td>{{$student->birth_date}}</td>
                <td class="image">
                    @if ($student->image)
                        @php
                            $images = explode(',', $student->image);
                        @endphp
                        <p> {{ count($images) }} image</p>
                    @endif
                </td>
                <td>{{ $student->student_code }}</td>
                <td>{{ $student->classes ? $student->classes->name : 'Không có lớp' }}</td>

                <td>
                    <a href="{{ route('students.edit', $student->id) }}" class="btn btn-primary"
                       type="button"><i class="fa-solid fa-pen-to-square"></i>
                    </a>

                    <a href="{{ route('students.show', $student->id) }}" class="btn btn-success"
                       type="button"><i class="fa-solid fa-book"></i>
                    </a>
                    <form action="{{ route('students.destroy', $student->id) }}" method="POST"
                          style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger" type="submit"
                                onclick="return confirm('Are you sure that you want to delete student name {{$student->full_name}}')">
                            <i class="fa-solid fa-trash"></i>
                        </button>
                    </form>

                </td>

            </tr>
        @endforeach
        </tbody>
    </table>
    {{ $students->appends(['search' => request('search')])->links() }}
@endsection

