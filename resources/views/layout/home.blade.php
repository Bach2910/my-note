<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        .radio-input input {
            display: none;
        }

        .radio-input {
            --container_width: 300px;
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
            width: calc(var(--container_width) / 2);
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
            transform: translateX(calc(var(--container_width) * 0/2));
        }

        .radio-input label:nth-child(2):has(input:checked) ~ .selection {
            transform: translateX(calc(var(--container_width) * 1/2));
        }
        .image{
            display: flex;
            gap:10px;
        }
    </style>
</head>
<body>
<div class="radio-input">
    <label onclick="selectOption('value-1')">
        <input type="radio" id="value-1" name="value-radio" value="value-1">
        <span>List Students</span>
    </label>
    <label onclick="selectOption('value-2')">
        <input type="radio" id="value-2" name="value-radio" value="value-2">
        <span>List Classes</span>
    </label>
    <span class="selection"></span>
</div>
@yield('content')
</body>
<script>
    function selectOption(value) {
        localStorage.setItem('selectedOption', value);
        if (value === 'value-1') {
            window.location.href = "{{ route('students.index') }}";
        } else if (value === 'value-2') {
            window.location.href = "{{ route('classes.index') }}";
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
</html>

