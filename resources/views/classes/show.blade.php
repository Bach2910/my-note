<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('assets/style.css') }}">
</head>
<body>
<h2>Danh sách sinh viên của lớp: {{ $classes->name }}</h2>

<section class="add-card page">
    <ul>
        @foreach ($classes->students as $student)
            <li>{{ $student->name }}</li>
        @endforeach
    </ul>
</section>
</body>
</html>


