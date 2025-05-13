@extends('layout.layout')

@section('title','Edit')

@section('main')
    <form action="{{ route('food.update', $food->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="container" style="color: white">
            <div class="mb-2" >
                <label for="name" class="form-label">Customer Name</label>
                <input class="form-control" name="name" id="name" value="{{$food->customer->name}}">
                @error('name')
                <div>{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-2">
                <label for="email" class="form-label">Email</label>
                <input class="form-control" name="email" id="email" value="{{$food->customer->email}}">
                @error('email')
                <div>{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-2">
                <label for="phone" class="form-label">Phone</label>
                <textarea class="form-control" name="phone" id="phone">{{ $food->customer->phone}}</textarea>
                @error('phone')
                <div>{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-2">
                <label for="food_name" class="form-label">Food Name</label>
                <input class="form-control" name="food_name" id="food_name" value="{{$food->food_name}}">
                @error('food_name')
                <div>{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-2">
                <label for="price" class="form-label">Price</label>
                <input class="form-control" name="price" id="price" value="{{$food->price}}">
                @error('price')
                <div>{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-2">
                <label for="detail" class="form-label">Detail</label>
                <input class="form-control" name="detail" id="detail" value="{{$food->detail}}">
                @error('detail')
                <div>{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Lưu lại</button>
        </div>
    </form>
@endsection
