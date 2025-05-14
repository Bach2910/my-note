<!DOCTYPE html>
<html>
<head>
    <title>Đăng ký</title>
</head>
<style>
    .form {
        display: flex;
        width: 250px;
        flex-direction: column;
        gap: 10px;
        background-color: rgb(199, 141, 180,1);
        padding: 2.5em;
        border-radius: 25px;
        transition: .4s ease-in-out;
        box-shadow: rgba(0, 0, 0, 0.4) 1px 2px 2px;
    }

    .form:hover {
        transform: translateX(-0.5em) translateY(-0.5em);
        border: 1px solid #171717;
        box-shadow: 10px 10px 0px #666666;
    }

    .heading {
        color: black;
        padding-bottom: 2em;
        text-align: center;
        font-weight: bold;
    }

    .input {
        border-radius: 5px;
        border: 1px solid whitesmoke;
        background-color: whitesmoke;
        outline: none;
        padding: 0.7em;
        transition: .4s ease-in-out;
    }

    .input:hover {
        box-shadow: 6px 6px 0px #969696,
        -3px -3px 10px rgb(199, 141, 180,1);
    }

    .input:focus {
        background: rgb(199, 141, 180,1);
        box-shadow: inset 2px 5px 10px rgba(0, 0, 0, 0.3);
    }

    .form .btn {
        margin-top: 2em;
        align-self: center;
        padding: 0.7em;
        padding-left: 1em;
        padding-right: 1em;
        border-radius: 10px;
        border: none;
        color: black;
        transition: .4s ease-in-out;
        box-shadow: rgba(0, 0, 0, 0.4) 1px 1px 1px;
    }

    .form .btn:hover {
        box-shadow: 6px 6px 0px #969696,
        -3px -3px 10px rgb(199, 141, 180,1);
        transform: translateX(-0.5em) translateY(-0.5em);
    }

    .form .btn:active {
        transition: .2s;
        transform: translateX(0em) translateY(0em);
        box-shadow: none;
    }

    .form-center {
        display: flex;
        justify-content: center;
        align-items: center;
    }
</style>
<body>
<h2>Đăng ký tài khoản</h2>
@if(session('error'))
    <p style="color:red;">{{ session('error') }}</p>
@endif
@if(session('success'))
    <p style="color:green;">{{ session('success') }}</p>
@endif
<div class="form-center">
    <form class="form" action="{{ route('register.process') }}" method="POST">
        @csrf
        <p class="heading">Register</p>
        <input class="input" placeholder="Username" type="text" name="name">
        <input class="input" placeholder="Email" type="text" name="email">
        <input class="input" placeholder="Password" type="text" name="password">
        <input class="input" placeholder="re-enter password" type="text" name="password_confirmation">
        <div class="d-flex gap-3">
            <button class="btn">Submit</button>
            <button class="btn"><a style="text-decoration: none;color:black" href="{{route('login')}}">Sign In</a>
            </button>
        </div>
    </form>
</div>
</body>
</html>
