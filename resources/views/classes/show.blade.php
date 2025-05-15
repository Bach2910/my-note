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
<h2>Classes: {{ $classes->name }}</h2>
<section class="add-card page">
    <form class="form">
        @foreach ($classes->students as $student)
            <label for="name" class="label">
                <span class="title">Name Student</span>
                <input
                    class="input-field"
                    type="text"
                    name="name"
                    value="{{$student->name}}"
                />
            </label>
        @endforeach
    </form?
</section>
</body>
</html>


