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
    <link rel="stylesheet" href="{{asset('assets/navbar.css')}}">
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

