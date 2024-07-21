<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nhập mã OTP</title>
    <link rel="stylesheet" href="{{ asset('admin') }}/css/customize.css">

</head>

<body>
    <div class="login-container">
        <h2>Nhập mã OTP</h2>
        <div class="dividerotp">Nhập mã OTP bên dưới</div>
        <form action="#" method="POST">
            @csrf
            <input class="form" type="num" name="number_otp" placeholder="OTP" required>
            <button type="submit" class="submit-btn">Đăng nhập</button>
        </form>
    </div>
</body>

</html>
