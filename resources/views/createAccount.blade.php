<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css">
    <style>
* {
    box-sizing: border-box;
    margin: 0;
    padding: 0;
}

body {
    font-family: Arial, sans-serif;
    background-color: #9355ad;
    color: #333;
}

header {
    background: #5c2c70;
    padding: 20px 0;    
}

nav ul {
    list-style-type: none;
    display: flex;
    justify-content: flex-end;
    padding-right: 20px;
}

nav ul li {
    margin: 0 15px;
}

nav ul li a {
    color: white;
    text-decoration: none;
    font-weight: bold;
}

.container {
    text-align: center;
    align-items: center;
    padding: 50px 20px;
}

h2 {
    color: white;
    font-size:40px;
    font-weight: bold;
}

label {
    color: white;
}

.username {
    text-align: center;
    padding: 15px 30px;
    margin: 5px;
    font-size: 18px;
    border: 2px solid #56415f;
}

.password {
    text-align: center;
    padding: 15px 30px;
    margin: 5px;
    font-size: 18px;
    border: 2px solid #56415f;
}

.login-button {
    display: inline-block;
    padding: 15px 30px;
    width: 250px;
    margin: 10px 0; /* Vertical margin for spacing */
    border: 2px solid #56415f;
    background-color: #ebe9f7;
    color: #6c63ff;
    text-decoration: none;
    font-size: 18px;
    border-radius: 5px;
    transition: background-color 0.3s, color 0.3s;
}


.logo {
    width: 120px;
    height: 120px;
}

.large-checkbox {
    width: 15px;
    height: 15px;
    transform: scale(1.5);
    cursor: pointer;
}

footer {
    background: #5c2c70;
    color: white;
    text-align: center;
    padding: 15px 0;
    position: relative;
    bottom: 0;
    width: 100%;
    margin-top: 20px;
}

.captcha-form {
    display: flex;
    flex-direction: column;
    align-items: center; /* Center horizontally */
}

.g-recaptcha {
    margin: 20px 0; /* Add some spacing */
}

    </style>
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
        <h2>Register</h2>
        <br>
        <form method="POST" action="{{ route('register') }}">
             @csrf
            <div>
                <label for="name">your name</label>
                <br>
                <input type="text" class="username" id="name" name="name" required>
             </div>
            <div>
                <label for="email">Email</label>
                <br>
                <input type="email" id="email" class="username" name="email" required>
            </div>
            <div>
                <label for="password">Password</label>
                <br>
                <input type="password" id="password" class="password" name="password" required>
            </div>
            <div>
                <label for="password_confirmation">password confirmation</label>
                <br>
                <input type="password" id="password_confirmation" name="password_confirmation" class="password" required>
            </div> 
            <div>
                <input type="checkbox" id="subscribe" name="is_admin" value="1" class="large-checkbox">
                <label for="subscribe">Teacher Account</label>
            </div>
            <button type="submit" class="login-button">Register</button>
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