@extends('layout.layout')
@section('title','Create')
@section('main')
    <div class="container">
        <form action="{{route('news.store')}}" method="POST">
            @csrf
            <div class="mb-2">
                <label for="title" class="form-label" >Title</label>
                <input class="form-control"  name="title" id="title" >
            </div>
            <div class="mb-2">
                <label for="content" class="form-label">Content</label>
                <textarea class="form-control" name="content" id="content" ></textarea>
            </div>
            <div class="mb-2">
                <label for="short_content" class="form-label">Short</label>
                <input class="form-control"  name="short_content" id="short_content">
            </div>
            <div class="mb-2">
                <label for="time_day" class="form-label">Time</label>
                <input  class="time_day" name="time_day" id="time_day">
            </div>
            <button type="submit" class="btn btn-primary">Save</button>
        </form>
    </div>
@endsection
