<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
            crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"></link>
    <style>
        .radio-input input {
            display: none;
        }

        .radio-input {
            --container_width: 520px;
            position: relative;
            display: flex;
            align-items: center;
            border-radius: 4px;
            background-color: #fff;
            color: #000000;
            width: var(--container_width);
            overflow: hidden;
            border: 1px solid rgba(53, 52, 52, 0.226);
        }

        .radio-input label {
            width: 100%;
            padding: 10px;
            cursor: pointer;
            display: flex;
            justify-content: center;
            align-items: center;
            z-index: 1;
            font-weight: 600;
            letter-spacing: -1px;
            font-size: 14px;
        }

        .selection {
            display: none;
            position: absolute;
            height: 100%;
            width: calc(var(--container_width) / 4);
            z-index: 0;
            left: 0;
            top: 0;
            transition: .15s ease;
        }

        .radio-input label:has(input:checked) {
            color: black;
        }

        .radio-input label:has(input:checked) ~ .selection {
            background-color: whitesmoke;
            display: inline-block;
        }

        .radio-input label:nth-child(1):has(input:checked) ~ .selection {
            transform: translateX(calc(var(--container_width) * 0 / 4));
        }

        .radio-input label:nth-child(2):has(input:checked) ~ .selection {
            transform: translateX(calc(var(--container_width) * 1 / 4));
        }

        .radio-input label:nth-child(3):has(input:checked) ~ .selection {
            transform: translateX(calc(var(--container_width) * 2 / 4));
        }

        .radio-input label:nth-child(4):has(input:checked) ~ .selection {
            transform: translateX(calc(var(--container_width) * 3 / 4));
        }

        .image {
            display: flex;
            gap: 10px;
        }
    </style>
</head>
<body>
<div class="container mt-2 d-flex justify-content-between">
    <div class="radio-input">
        <label onclick="selectOption('value-1')">
            <input type="radio" id="value-1" name="value-radio" value="value-1">
            <span>List Students</span>
        </label>
        <label onclick="selectOption('value-2')">
            <input type="radio" id="value-2" name="value-radio" value="value-2">
            <span>List Classes</span>
        </label>
        <label onclick="selectOption('value-3')">
            <input type="radio" id="value-3" name="value-radio" value="value-3">
            <span>List account</span>
        </label>
        <label onclick="selectOption('value-4')">
            <input type="radio" id="value-4" name="value-radio" value="value-4">
            <span>List Role</span>
        </label>
        <span class="selection"></span>
    </div>
    <div class="d-flex gap-3 mt-2 text-center align-text-center ">
        <span class="text-center mt-1">{{Auth::user()->name}}</span>
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button class="btn btn-danger" type="submit">Đăng xuất</button>
        </form>
    </div>
</div>
<div class="container">
    @yield('content')
</div>
</body>
<script>
    function selectOption(value) {
        localStorage.setItem('selectedOption', value);
        if (value === 'value-1') {
            window.location.href = "{{ route('students.index') }}";
        } else if (value === 'value-2') {
            window.location.href = "{{ route('classes.index') }}";
        } else if (value === 'value-3') {
            window.location.href = "{{ route('list-account') }}";
        } else if (value === 'value-4') {
            window.location.href = "{{ route('roles.index') }}";
        } else if (value === 'value-5') {
            window.location.href = "{{ route('api.student') }}";
        }
    }

    window.addEventListener('DOMContentLoaded', () => {
        const selectedValue = localStorage.getItem('selectedOption');
        if (selectedValue) {
            const input = document.querySelector(`input[value="${selectedValue}"]`);
            if (input) input.checked = true;
        }
    });
</script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF"
        crossorigin="anonymous"></script>
</html>
@push('style')
    <style>
        .form {
            display: flex;
            flex-direction: column;
            gap: 10px;
            padding-left: 2em;
            padding-right: 2em;
            padding-bottom: 0.4em;
            background-color: #171717;
            border-radius: 25px;
            transition: .4s ease-in-out;
        }

        .form:hover {
            transform: scale(1.05);
            border: 1px solid black;
        }

        #heading {
            text-align: center;
            margin: 2em;
            color: rgb(255, 255, 255);
            font-size: 1.2em;
        }

        .field {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.5em;
            border-radius: 25px;
            padding: 0.6em;
            border: none;
            outline: none;
            color: white;
            background-color: #171717;
            box-shadow: inset 2px 5px 10px rgb(5, 5, 5);
        }

        .input-icon {
            height: 1.3em;
            width: 1.3em;
            fill: white;
        }

        .input-field {
            background: none;
            border: none;
            outline: none;
            width: 100%;
            color: #d3d3d3;
        }

        .form .btn {
            display: flex;
            justify-content: center;
            flex-direction: row;
            margin-top: 2.5em;
        }

        .button1 {
            padding: 0.5em;
            padding-left: 1.1em;
            padding-right: 1.1em;
            border-radius: 5px;
            margin-right: 0.5em;
            border: none;
            outline: none;
            transition: .4s ease-in-out;
            background-color: #252525;
            color: white;
        }

        .button1:hover {
            background-color: black;
            color: white;
        }

        .button2 {
            padding: 0.5em;
            padding-left: 2.3em;
            padding-right: 2.3em;
            border-radius: 5px;
            border: none;
            outline: none;
            transition: .4s ease-in-out;
            background-color: #252525;
            color: white;
        }

        .button2:hover {
            background-color: black;
            color: white;
        }

        .button3 {
            margin-bottom: 3em;
            padding: 0.5em;
            border-radius: 5px;
            border: none;
            outline: none;
            transition: .4s ease-in-out;
            background-color: #252525;
            color: white;
        }

        .button3:hover {
            background-color: red;
            color: white;
        }
    </style>
@endpush
