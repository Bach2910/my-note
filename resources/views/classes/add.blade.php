<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
</head>
<body>
<h2 class="add-card mt-5">Add classes</h2>
<section class="add-card page">
    <form class="form" method="POST" action="{{route('classes.store')}}">
        @csrf
        <label for="name" class="label">
            <span class="title">Name Class</span>
            <input
                class="input-field"
                type="text"
                name="name"
                value="{{old('name')}}"
                />
        </label>
        @if ($errors->has('name'))
            <span style="color: red;">{{ $errors->first('name') }}</span>
        @endif
        <label for="name" class="label">
            <span class="title">Description</span>
            <input
                class="input-field"
                type="text"
                name="description"
                value="{{old('description')}}"
                />
            @if ($errors->has('description'))
                <span style="color: red;">{{ $errors->first('description') }}</span>
            @endif
        </label>
        <input class="checkout-btn" type="submit" value="Add"/>
    </form>
</section>
</body>
</html>


