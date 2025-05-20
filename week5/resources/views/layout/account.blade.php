<!DOCTYPE html>
<html>
<head>
    <title>@yield('title')</title>
</head>
<link rel="stylesheet" href="{{ asset('assets/css/account.css') }}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"></link>
<body>
    @yield('content')
</body>
</html>
<script>
    function toggleType() {
        event.preventDefault();
        const passwordInput = document.getElementById("password");
        const eyeButton = document.getElementById("eye");
        if (passwordInput.type === "password") {
            passwordInput.type = "text";
            eyeButton.innerHTML = '<i class="fa-solid fa-eye-slash"></i>';
        } else {
            passwordInput.type = "password";
            eyeButton.innerHTML = '<i class="fa-solid fa-eye"></i>';
        }
    }
    function toggleType2() {
        event.preventDefault();
        const passwordInput2 = document.getElementById("password_confirmation");
        const eyeButton2 = document.getElementById("eye2");
        if (passwordInput2.type === "password") {
            passwordInput2.type = "text";
            eyeButton2.innerHTML = '<i class="fa-solid fa-eye-slash"></i>';
        } else {
            passwordInput2.type = "password";
            eyeButton2.innerHTML = '<i class="fa-solid fa-eye"></i>';
        }
    }
</script>
