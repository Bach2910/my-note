<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
            crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"></link>
    <link rel="stylesheet" href="{{ asset('assets/css/userHome.css') }}">
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
            <span>List Department</span>
        </label>
        <span class="selection"></span>
    </div>
    <div class="dropdown mt-2">
        <button class="btn btn-primary dropdown-toggle w-100" type="button" id="adminDropdown" data-bs-toggle="dropdown" aria-expanded="false">
            {{Auth::user()->name}}
        </button>
        <ul class="dropdown-menu" aria-labelledby="adminDropdown">
            <li>
                <form action="{{ route('logout') }}" method="POST" class="px-3 py-2">
                    @csrf
                    <button type="submit" class="btn btn-danger w-100">Đăng xuất</button>
                </form>
            </li>
        </ul>
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
            window.location.href = "{{ route('departments.index') }}";
        }
    }
    window.addEventListener('DOMContentLoaded', () => {

        const selectedValue = localStorage.getItem('selectedOption');
        if (selectedValue) {
            const input = document.querySelector(`input[value="${selectedValue}"]`);
            if (input) input.checked = true;
        }
        const logoutForm = document.querySelector('form[action="{{ route('logout') }}"]');
        if (logoutForm) {
            logoutForm.addEventListener('submit', function () {
                localStorage.removeItem('selectedOption');
            });
        }
    });
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</html>
