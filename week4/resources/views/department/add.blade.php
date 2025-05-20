<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create New Department</title>
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
</head>
<body>
<h2 class="add-card mt-5 text-center">Add classes</h2>
<section class="add-card page">
    <form class="form" method="POST" action="{{route('departments.store')}}">
        @csrf
        <label for="name" class="label">
            <span class="title">Name Class</span>
            <input
                class="input-field"
                type="text"
                name="name"
            />
            @if($errors->has('name'))
                <span style="color: red;">{{ $errors->first('name') }}</span>
            @endif
        </label>
        <label for="name" class="label">
            <span class="title">Code</span>
            <input
                class="input-field"
                type="text"
                name="code"
            />
            @if($errors->has('code'))
                <span style="color: red;">{{ $errors->first('code') }}</span>
            @endif
        </label>
        <input class="checkout-btn" type="submit" value="Update"/>
    </form>
</section>
</body>
</html>


