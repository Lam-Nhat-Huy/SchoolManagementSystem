<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập</title>
    <link rel="stylesheet" href="{{ asset('admin') }}/css/customize.css">
    <link rel="icon" href="{{ asset('admin') }}/img/banner_home/logo_web.jpg" type="image/x-icon" />

</head>

<body>
    <div class="login-container">
        <h2 style="margin-bottom: 20px;">Đăng Nhập</h2>

        <a href="{{ route('auth.google') }}" class="google-button">Đăng nhập với Google</a>

        <div class="divider">hoặc đăng nhập với</div>
        <form action="{{ route('login.send_otp') }}" method="POST">
            @csrf
            <input type="email" name="email" value="{{ old('email') }}" placeholder="Email">
            @error('email')
                <div class="message_error">{{ $message }}</div>
            @enderror
            <button type="submit" class="submit-btn">Đăng nhập</button>
        </form>
    </div>
</body>

</html>
