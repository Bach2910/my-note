@extends('layout.admin')
@section('title','Food Data')
@section('nav')
    <div class="container-fluid">
        @can('create')
            <a style="margin-right:1%" href="{{route('food.create')}}" class="btn btn-primary">+ Create</a>
        @endcan
        @can('show')
            <div class="search">
                <form action="{{ route('foods.search') }}" method="GET" class="d-flex" role="search">
                    <input type="text" name="search" placeholder="Search..." class="form-control me-2"
                           aria-label="Search">
                    <button class="search__button">
                        <svg class="search__icon" aria-hidden="true" viewBox="0 0 24 24">
                            <g>
                                <path
                                    d="M21.53 20.47l-3.66-3.66C19.195 15.24 20 13.214 20 11c0-4.97-4.03-9-9-9s-9 4.03-9 9 4.03 9 9 9c2.215 0 4.24-.804 5.808-2.13l3.66 3.66c.147.146.34.22.53.22s.385-.073.53-.22c.295-.293.295-.767.002-1.06zM3.5 11c0-4.135 3.365-7.5 7.5-7.5s7.5 3.365 7.5 7.5-3.365 7.5-7.5 7.5-7.5-3.365-7.5-7.5z"></path>
                            </g>
                        </svg>
                    </button>
                </form>
            </div>
        @endcan
    </div>
@endsection
@section('aside')
    <body>
    <div class="table-container" style="width: 100%; max-width: 100%; margin: 0 auto;">
        <table class="table table-success table-striped-columns ">
            <thead>
            <tr>
                <th>STT</th>
                <th>Food Name</th>
                <th>Name</th>
                <th>Price</th>
                <th>Phone</th>
                @can('edit')
                    <th>Function</th>
                @endcan
            </tr>
            </thead>
            <tbody>
            @foreach($food as $lists)
                <tr>
                    <td>{{$lists->id}}</td>
                    <td>{{$lists->food_name}}</td>
                    <td>{{$lists->customer->name}}</td>
                    <td>{{$lists->price}}</td>
                    <td>{{$lists->customer->phone}}</td>
                    @can('edit')
                        <td>

                            <div class="action-container">
                                <a href="{{ route('food.edit', $lists->id) }}" class="edit">
                                    <i style="color: #0b5ed7;" class="fa-solid fa-pencil"></i>
                                </a>
                                <button type="submit" class="btn"
                                        style="background: none; border: none; cursor: pointer;"
                                        data-bs-toggle="modal"
                                        data-bs-target="#{{$lists->id}}"><i style="color: red;"
                                                                            class="fa-solid fa-trash"></i>
                                </button>

                                <!-- Modal -->
                                <div class="modal fade" id="{{$lists->id}}" tabindex="-1"
                                     aria-labelledby="exampleModalLabel"
                                     aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="exampleModalLabel">Xoa bai viet</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                Ban co chac chan muon xoa bai viet {{$lists->id}} nay khong?
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                                    <i
                                                        class="fa fa-close" style="margin-right: 1%"></i>
                                                </button>
                                                <form action="{{ route('food.destroy', $lists->id)}}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-secondary">
                                                        <i style="color: red;" class="fa-solid fa-trash"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                    @endcan
                </tr>
            @endforeach
            </tbody>
        </table>
        {{$food->appends(request()->all())->links()}}
    </div>
    </body>
@endsection
