<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add Student</title>
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
</head>
<body>
<h2 class="add-card mt-5">Create new student</h2>
<section class="add-card page">
    <form class="form" method="POST" action="{{route('students.store')}}" enctype="multipart/form-data">
        @csrf
        <label for="full_name" class="label">
            <span class="title">Name</span>
            <input
                class="input-field"
                type="text"
                name="full_name"
                placeholder="Enter your full name"
                value="{{old('full_name')}}"
            />
            @if ($errors->has('full_name'))
                <span style="color: red;">{{ $errors->first('full_name') }}</span>
            @endif
        </label>
        <label for="email" class="label">
            <span class="title">Email</span>
            <input
                class="input-field"
                type="text"
                name="email"
                placeholder="Enter your email"
                value="{{old('email')}}"
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
                value="{{old('address')}}"

            />
            @if ($errors->has('address'))
                <span style="color: red;">{{ $errors->first('address') }}</span>
            @endif
        </label>
        <label for="birth_date" class="label">
            <span class="title">Birth Date</span>
            <input
                class="input-field"
                type="date"
                name="birth_date"
                placeholder="Enter your birth date"
                value="{{old('birth_date')}}"

            />
            @if ($errors->has('birth_date'))
                <span style="color: red;">{{ $errors->first('birth_date') }}</span>
            @endif
        </label>
        <label for="phone" class="label">
            <span class="title">Phone</span>
            <input
                class="input-field"
                type="text"
                name="phone"
                placeholder="Enter your phone"
                value="{{old('phone')}}"
            />
            @if ($errors->has('phone'))
                <span style="color: red;">{{ $errors->first('phone') }}</span>
            @endif
        </label>
        <div class="split">
            <label for="ExDate" class="label">
                <span class="title">Student ID</span>
                <input
                    id="ExDate"
                    class="input-field"
                    type="text"
                    name="student_code"
                    placeholder="Enter your id"
                    value="{{old('student_code')}}"
                    />
                @if ($errors->has('student_code'))
                    <span style="color: red;">{{ $errors->first('student_code') }}</span>
                @endif
            </label>
            <label for="cvv" class="label">
                <span class="title">Class</span>
                <select name="classroom_id" class="input-field" >
                    <option value="" style="justify-items: center;align-items: center">___Class___</option>
                    @foreach($classes as $class)
                        <option value="{{$class['id']}}" {{old('classroom_id') == $class->id ? 'selected' : '' }}>
                            {{$class['name']}}
                        </option>
                    @endforeach
                </select>
                @if ($errors->has('classroom_id'))
                    <span style="color: red;">{{ $errors->first('classroom_id') }}</span>
                @endif
            </label>
            <label for="gender" class="label">
                <span class="title">Gender</span>
                <select name="gender" class="input-field" >
                    <option value="">___Gender___</option>
                    <option value="male" {{ old('gender') == 'male' ? 'selected' : '' }}>Male</option>
                    <option value="female" {{ old('gender') == 'female' ? 'selected' : '' }}>Female</option>
                </select>
                @if ($errors->has('gender'))
                    <span style="color: red;">{{ $errors->first('gender') }}</span>
                @endif
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
            <input id="file" type="file" name="image[]" multiple ><br>
            @if ($errors->has('image.*'))
                <span style="color: red;">{{ $errors->first('image') }}</span>
            @endif
        </label>
        <input class="checkout-btn" type="submit" value="Add"/>
    </form>
</section>
</body>
</html>

