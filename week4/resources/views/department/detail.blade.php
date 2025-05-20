<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Detail Department</title>
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
</head>
<body>
<h2 class="add-card mt-5 text-center">Detail Department {{$department->name}}</h2>
<a class="checkout-btn" type="submit" href="{{route('departments.index')}}">Home</a><section class="add-card page">
    <form class="form" method="POST">
        <label for="name" class="label">
            <span class="title">Code</span>
            <input
                class="input-field"
                type="text"
                name="code"
                value="{{$department->code}}" disabled
            />
        </label>
        @foreach($department->classes as $class)
            <label for="name" class="label">
                <span class="title">Class</span>
                <input
                    class="input-field"
                    type="text"
                    name="code"
                    value="{{$class->name}}" disabled
                />
            </label>
        @endforeach
    </form>
</section>
</body>
</html>


