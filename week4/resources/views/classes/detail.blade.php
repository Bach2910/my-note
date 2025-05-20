<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Detail Classes</title>
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
</head>
<body>
<h2 class=" add-card">Classes: {{ $classes->name }}</h2>
<a class="checkout-btn" type="submit" href="{{route('classes.index')}}">Home</a>
<section class="add-card page">
    <form class="form">
        @foreach ($classes->students as $student)
            <label for="name" class="label">
                <span class="title">Name Student</span>
                <input
                    class="input-field"
                    type="text"
                    name="name"
                    value="{{$student->full_name}}" disabled
                />
            </label>
        @endforeach
        <label for="name" class="label">
            <span class="title">Department</span>
            <input
                class="input-field"
                type="text"
                name="name"
                value="{{ $classes->department->name ?? 'Không có khoa' }}" disabled
            />
        </label>
        <label for="name" class="label">
            <span class="title">Code</span>
            <input
                class="input-field"
                type="text"
                name="name"
                value="{{ $classes->department->code ?? 'Không có khoa' }}" disabled
            />
        </label>
    </form>
</section>
</body>
</html>


