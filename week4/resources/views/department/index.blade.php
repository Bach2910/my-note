@extends('layout.home')
@section('title','List of Department')
@section('content')
    <h3 class="mt-5 mb-5 text-center">List of Department</h3>
    <a class="btn btn-primary mb-2" href="{{ route('departments.create') }}">Create</a>
    <table border="1" cellpadding="10" cellspacing="0" class="table table-hover">
        <thead>
        <tr>
            <th>Code</th>
            <th>Department</th>

            <th>Actions</th>

        </tr>
        </thead>
        <tbody>
        @foreach ($department as $items)
            <tr>
                <td>{{ $items->code }}</td>
                <td>{{ $items->name }}</td>
                <td>
                    <a class="btn btn-primary" href="{{ route('departments.edit', $items->id) }}">
                        <i class="fa-solid fa-pen-to-square"></i>
                    </a>
                    <a class="btn btn-success" href="{{ route('departments.show', $items->id) }}">
                        <i class="fa-solid fa-book"></i>
                    </a>

                    <form action="{{ route('departments.destroy', $items->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger" type="submit"
                                onclick="return confirm('Are you sure you want to delete this department {{$items -> name}}')">
                            <i class="fa-solid fa-trash"></i></button>
                    </form>

                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection


