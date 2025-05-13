@extends('layout.layout')
@section('title','Edit')
@section('main')
    <div class="container">
        <form action="{{route('news.update',$news->id)}}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-2">
                <label for="title" class="form-label" >Title</label>
                <input class="form-control"  name="title" id="title" value="{{$news->title}}" >
            </div>
            <div class="mb-2">
                <label for="content" class="form-label">Mo ta</label>
                <textarea class="form-control" name="content" id="content" >{{$news->content}}</textarea>
            </div>
            <div class="mb-2">
                <label for="short_content" class="form-label">Short</label>
                <input class="form-control"  name="short_content" id="short_content" value="{{$news->short_content}}">
            </div>
            <div class="mb-2">
                <label for="time_day" class="form-label">Xuat xu</label>
                <input  class="time_day" name="time_day" id="time_day" value="{{$news->time_day}}">
            </div>
            <button type="submit" class="btn btn-primary">Luu lai</button>
        </form>
    </div>
@endsection
