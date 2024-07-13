<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <link rel="stylesheet" href="{{ asset('admin') }}/css/customize.css">
</head>

<body>
    <div class="login-container">
        <h2>LogIn</h2>
        <button class="google-login">Login with Google</button>
        <button class="apple-login">Login with Apple</button>
        <div class="divider">or Login with</div>
        <form action="#" method="POST">
            <input type="email" name="email" placeholder="Your Email" required>
            <input type="password" name="password" placeholder="Your Password" required>
            <div class="options">
                <label><input type="checkbox" name="remember"> Remember me</label>
                <a href="#">Forgot password?</a>
            </div>
            <button type="submit" class="submit-btn">Submit</button>
        </form>
        <p>Don't have an account? <a href="#">Signup</a></p>
    </div>
</body>

</html>
