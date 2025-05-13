@extends('layout.admin')
@section('title','User Data')
@section('nav')
    <div class="container-fluid">
        <div class="search">
            <form action="{{ route('customers.search') }}" method="GET" class="d-flex" role="search">
                <input type="text" name="search" placeholder="Search..." class="form-control me-2"
                       aria-label="Search">
                <button class="search__button">
                    <svg class="search__icon" aria-hidden="true" viewBox="0 0 24 24">
                        <g>
                            <path d="M21.53 20.47l-3.66-3.66C19.195 15.24 20 13.214 20 11c0-4.97-4.03-9-9-9s-9 4.03-9 9 4.03 9 9 9c2.215 0 4.24-.804 5.808-2.13l3.66 3.66c.147.146.34.22.53.22s.385-.073.53-.22c.295-.293.295-.767.002-1.06zM3.5 11c0-4.135 3.365-7.5 7.5-7.5s7.5 3.365 7.5 7.5-3.365 7.5-7.5 7.5-7.5-3.365-7.5-7.5z"></path>
                        </g>
                    </svg>
                </button>
            </form>
        </div>
    </div>
@endsection
@section('aside')
    <body>
    <div class="table-container" style="width: 100%; max-width: 100%; margin: 0 auto;">
        <table class="table table-success table-striped-columns ">
            <thead>
            <tr>
                <th>STT</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Create_at</th>
            </tr>
            </thead>
            <tbody>
            @foreach($food as $lists)
                <tr>
                    <td>{{$lists->id}}</td>
                    <td>{{$lists->name}}</td>
                    <td>{{$lists->email}}</td>
                    <td>{{$lists->phone}}</td>
                    <td>{{$lists->created_at}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    </body>
@endsection
