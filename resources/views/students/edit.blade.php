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
<h2 class="add-card mt-5">Edit Student</h2>

<section class="add-card page">
    @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif
    <form class="form" method="POST" action="{{ route('students.update', $student->id) }}"
          enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <label for="name" class="label">
            <span class="title">Name</span>
            <input
                class="input-field"
                type="text"
                name="name"
                placeholder="Enter your full name"
                value="{{ old('name', $student->name) }}"
            />
            @if ($errors->has('name'))
                <span style="color: red;">{{ $errors->first('name') }}</span>
            @endif
        </label>

        <label for="email" class="label">
            <span class="title">Email</span>
            <input
                class="input-field"
                type="email"
                name="email"
                placeholder="Enter your email"
                value="{{ old('email', $student->email) }}"
            />
            @if ($errors->has('email'))
                <span style="color: red;">{{ $errors->first('email') }}</span>
            @endif
        </label>

        <label for="address" class="label">
            <span class="title">Address</span>
            <input
                class="input-field"
                type="text"
                name="address"
                placeholder="Enter your address"
                value="{{ old('address', $student->address) }}"
            />
            @if ($errors->has('address'))
                <span style="color: red;">{{ $errors->first('address') }}</span>
            @endif
        </label>
        <div class="split">
            <label for="student_id" class="label">
                <span class="title">Student ID</span>
                <input
                    class="input-field"
                    type="text"
                    name="student_id"
                    placeholder="Enter your ID"
                    value="{{ old('student_id', $student->student_id) }}">
                @if ($errors->has('student_id'))
                    <span style="color: red;">{{ $errors->first('student_id') }}</span>
                @endif
            </label>
            <label for="class_id" class="label">
                <span class="title">Class</span>
                <select name="class_id" class="input-field">
                    <option value="" style="justify-items: center;align-items: center">___Class___</option>
                    @foreach($classes as $class)
                        <option
                            value="{{ $class->id }}" {{ old('class_id', $student->class_id) == $class->id ? 'selected' : '' }}>
                            {{ $class->name }}
                        </option>
                    @endforeach
                </select>
            </label>
            <label for="gender" class="label">
                <span class="title">Gender</span>
                <select name="gender" class="input-field">
                    <option value="">___Gender___</option>
                    <option value="male" {{ old('gender', $student->gender) == 'male' ? 'selected' : '' }}>Male</option>
                    <option value="female" {{ old('gender', $student->gender) == 'female' ? 'selected' : '' }}>Female
                    </option>
                </select>
            </label>
        </div>
        <label class="custum-file-upload" for="file">
            <div class="icon">
                <svg xmlns="http://www.w3.org/2000/svg" fill="" viewBox="0 0 24 24">
                    <g stroke-width="0" id="SVGRepo_bgCarrier"></g>
                    <g stroke-linejoin="round" stroke-linecap="round" id="SVGRepo_tracerCarrier"></g>
                    <g id="SVGRepo_iconCarrier">
                        <path fill=""
                              d="M10 1C9.73478 1 9.48043 1.10536 9.29289 1.29289L3.29289 7.29289C3.10536 7.48043 3 7.73478 3 8V20C3 21.6569 4.34315 23 6 23H7C7.55228 23 8 22.5523 8 22C8 21.4477 7.55228 21 7 21H6C5.44772 21 5 20.5523 5 20V9H10C10.5523 9 11 8.55228 11 8V3H18C18.5523 3 19 3.44772 19 4V9C19 9.55228 19.4477 10 20 10C20.5523 10 21 9.55228 21 9V4C21 2.34315 19.6569 1 18 1H10ZM9 7H6.41421L9 4.41421V7ZM14 15.5C14 14.1193 15.1193 13 16.5 13C17.8807 13 19 14.1193 19 15.5V16V17H20C21.1046 17 22 17.8954 22 19C22 20.1046 21.1046 21 20 21H13C11.8954 21 11 20.1046 11 19C11 17.8954 11.8954 17 13 17H14V16V15.5ZM16.5 11C14.142 11 12.2076 12.8136 12.0156 15.122C10.2825 15.5606 9 17.1305 9 19C9 21.2091 10.7909 23 13 23H20C22.2091 23 24 21.2091 24 19C24 17.1305 22.7175 15.5606 20.9844 15.122C20.7924 12.8136 18.858 11 16.5 11Z"
                              clip-rule="evenodd" fill-rule="evenodd"></path>
                    </g>
                </svg>
            </div>
            <div class="text">
                <span>Click to upload image</span>
            </div>
            <input id="file" type="file" name="image[]" multiple><br>
            <div class="image-preview">
                @if ($student->image)
                    @foreach (explode(',', $student->image) as $image)
                        <img src="{{ asset($image) }}" alt="Current Image" style="max-width: 150px; max-height: 150px;">
                    @endforeach
                @endif

            </div>
            @if ($errors->has('image.*'))
                <span style="color: red;">{{ $errors->first('image.*') }}</span>
            @endif
        </label>
        <input class="checkout-btn" type="submit" value="Update"/>
    </form>
</section>
</body>
</html>
