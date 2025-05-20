<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Department</title>
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
</head>
<body>
<h2 class="add-card mt-5">Edit Department {{$department->name}}</h2>
<section class="add-card page">
    <form class="form" method="POST" action="{{route('departments.update', $department->id)}}">
        @csrf
        @method('PUT')
        <label for="name" class="label">
            <span class="title">Name Class</span>
            <input
                class="input-field"
                type="text"
                name="name"
                value="{{$department->name}}"
            />
            @if($errors->has('name'))
                <span style="color: red;">{{ $errors->first('name') }}</span>
            @endif
        </label>
        <label for="name" class="label">
            <span class="title">code</span>
            <input
                class="input-field"
                type="text"
                name="code"
                value="{{$department->code}}"
            />
            @if($errors->has('code'))
                <span style="color: red;">{{ $errors->first('code') }}</span>
            @endif
        </label>
        <input class="checkout-btn" type="submit" value="Save"/>
    </form>
</section>
</body>
</html>


