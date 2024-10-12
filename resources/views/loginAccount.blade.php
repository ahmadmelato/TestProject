<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="{{ asset('css/login.cs') }}"
</head>

<body>
<header>
        <nav>
            <ul>
                <li><a href="/">Home</a></li>
                <li><a href="#">Read More</a></li>
                <li><a href="#">Contact</a></li>
                <li><a href="#">Sign Up</a></li>
            </ul>
        </nav>
    </header>
    <main>
    <center>
        <div class="container">
        <img src="images/icons8-user-96.png" class="logo" alt="logo">
        <br>
        <h2>Login</h2>
        <br>
        <form method="POST"  action="{{ route('login') }}">
            @csrf
            <div>
                <label for="username">Mail</label>
                <br>
                <input type="mail" id="username" class="username" name="email" required autofocus>
            </div>
            <br>
            <div>
                <label for="password">Password</label>
                <br>
                <input type="password" id="password" class="password" name="password" required>
            </div>
            <div class="captcha-form">
                {!! NoCaptcha::renderJs() !!}
                {!! NoCaptcha::display() !!}
            </div>
            <br>
            <input type="submit" class="login-button" value="Login">
        </form>
        @if ($errors->any())
        <div>
            @foreach ($errors->all() as $error)
                <p style="color:red;">{{ $error }}</p>
            @endforeach
        </div>
    @endif
        </div>
    </center>
</main>
    <footer>
        <p>&copy; 2024 Secure Testing. All rights reserved.</p>
    </footer>
</body>

</html>