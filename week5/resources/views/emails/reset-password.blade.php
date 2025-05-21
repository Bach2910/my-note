<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" />
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f6f8;
            color: #333;
            padding: 20px;
        }
        .container {
            max-width: 600px;
            background: white;
            margin: 0 auto;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
        }
        h1 {
            color: #007BFF;
        }
        .button {
            display: inline-block;
            background-color: #007BFF;
            color: white !important;
            padding: 12px 25px;
            text-decoration: none;
            border-radius: 6px;
            font-weight: bold;
            margin: 20px 0;
        }
        .footer {
            font-size: 12px;
            color: #777;
            margin-top: 30px;
        }
    </style>
</head>
<body>
<div class="container">
    <h1>Xin chào {{ $name }}!</h1>

    <p>Bạn nhận được email này vì chúng tôi nhận được yêu cầu đặt lại mật khẩu cho tài khoản của bạn.</p>

    <p><a href="{{ $url }}" class="button">Đặt lại mật khẩu ngay</a></p>

    <p>Liên kết này sẽ hết hạn sau 3 phút.</p>

    <p>Nếu bạn không yêu cầu đặt lại mật khẩu, bạn có thể bỏ qua email này.</p>

    <div class="footer">
        Trân trọng,<br />
        Đội ngũ hỗ trợ của bạn
    </div>
</div>
</body>
</html>
