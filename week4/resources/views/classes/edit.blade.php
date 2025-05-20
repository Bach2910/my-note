<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Classes</title>
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
</head>
<body>
<h2 class="add-card mt-5 text-center">Edit classes</h2>
<section class="add-card page">
    <form class="form" method="POST" action="{{route('classes.update',$classes->id)}}">
        @csrf
        @method('PUT')
        <label for="name" class="label">
            <span class="title">Name Class</span>
            <input
                class="input-field"
                type="text"
                name="name"
                value="{{ old('name', $classes->name) }}"
            />
        </label>
        @if ($errors->has('name'))
            <span style="color: red;">{{ $errors->first('name') }}</span>
        @endif
        <label for="name" class="label">
            <span class="title">Year</span>
            <input
                class="input-field"
                type="text"
                name="course_year"
                value="{{$classes->course_year}}"
            />
        </label>
        @if ($errors->has('course_year'))
            <span style="color: red;">{{ $errors->first('course_year') }}</span>
        @endif
        <label for="name" class="label">
            <span class="title">Code class</span>
            <input
                class="input-field"
                type="text"
                name="class_code"
                value="{{$classes->class_code}}"
            />
        </label>
        @if ($errors->has('class_code'))
            <span style="color: red;">{{ $errors->first('class_code') }}</span>
        @endif
        <label for="name" class="label">
            <span class="title">Max students</span>
            <input
                class="input-field"
                type="number"
                name="max_students"
                value="{{$classes->max_students}}"
            />
        </label>
        @if ($errors->has('max_students'))
            <span style="color: red;">{{ $errors->first('max_students') }}</span>
        @endif
        <label for="name" class="label">
            <span class="title">Department</span>
            <select name="department_id" class="input-field">
                <option value="" style="justify-items: center;align-items: center">___Department___</option>
                @foreach($department as $class)
                    <option value="{{$class->id}}"
                        {{old('department_id', $classes->department_id) == $class->id ? 'selected' : '' }}>
                        {{$class->name}}
                    </option>
                @endforeach
            </select>
            @if ($errors->has('department_id'))
                <span style="color: red;">{{ $errors->first('department_id') }}</span>
            @endif
        </label>
        <input class="checkout-btn" type="submit" value="Update"/>
    </form>
</section>
</body>
</html>


