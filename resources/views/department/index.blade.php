@extends('layout.home')
@section('content')
    <h1>List of Department</h1>
    @can('create')
        <a class="btn btn-primary mb-2" href="{{ route('departments.create') }}">Create</a>
    @endcan
    <table border="1" cellpadding="10" cellspacing="0" class="table table-hover">
        <thead>
        <tr>
            <th>Name</th>
            <th>Department</th>
            @can('edit')
                <th>Actions</th>
            @endcan
        </tr>
        </thead>
        <tbody>
        @foreach ($department as $items)
            <tr>
                <td>{{ $items->name }}</td>
                <td>{{ $items->code }}</td>
                <td>
                    @can('edit')
                        <a class="btn btn-primary" href="{{ route('departments.edit', $items->id) }}">
                            <i class="fa-solid fa-pencil"></i>
                        </a>
                    @endcan
                    @can('view')
                        <a class="btn btn-success" href="{{ route('departments.show', $items->id) }}">
                            <i class="fa-solid fa-book"></i>
                        </a>
                    @endcan
                    @can('delete')
                        <form action="{{ route('departments.destroy', $items->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger" type="submit"
                                    onclick="return confirm('Are you sure you want to delete this department {{$items -> name}}')">
                                <i class="fa-solid fa-trash"></i></button>
                        </form>
                    @endcan
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

@endsection


