<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập</title>
    <link rel="stylesheet" href="{{ asset('admin') }}/css/customize.css">

</head>

<body>
    <div class="login-container">
        <h2>Đăng Nhập</h2>

        <a href="{{ route('auth.google') }}" class="google-button">Đăng nhập với Google</a>

        <div class="divider">hoặc đăng nhập với</div>
        <form action="#" method="POST">
            @csrf
            <input type="email" name="email" placeholder="Email" required>
            <button type="submit" class="submit-btn">Đăng nhập</button>
        </form>
    </div>
</body>

</html>
