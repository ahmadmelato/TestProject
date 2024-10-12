<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test Questions</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css">
    <style>

* {
    box-sizing: border-box;
    margin: 0;
    padding: 0;
}

body {
    font-family: Arial, sans-serif;
    background-color: #ebe9f7;
    color: #333;
}

header {
    background: #9355ad;
    padding: 20px 0;
    margin-bottom: 5%;
}

nav ul {
    list-style-type: none;
    display: flex;
    justify-content: flex-end; /* Align items to the right */
    padding-right: 20px; /* Add some padding to the right */
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
    align-items: center; /* Center items vertically */
    padding: 50px 20px;
}

h1 {
    font-size: 40px;
    margin-bottom: 20px;
}

.login-wrapper {
    display: flex;
    align-items: center; /* Center items vertically */
    justify-content: center; /* Center items horizontally */
}

.login-options {
    display: flex;
    flex-direction: column; /* Stack buttons vertically */
    margin-right: 20px; /* Space between buttons and image */
}

.login-button {
    display: inline-block;
    padding: 15px 30px;
    margin: 10px 0; /* Vertical margin for spacing */
    border: 2px solid #9355ad;
    background-color: white;
    color: #6c63ff;
    text-decoration: none;
    font-size: 18px;
    border-radius: 5px;
    transition: background-color 0.3s, color 0.3s;
}

.login-button:hover {
    background-color: #9355ad;
    color: white;
}

.illustration {
    width: auto; /* Adjust width as needed */
    height: auto; /* Maintain aspect ratio */
}

footer {
    background: #9355ad;
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
                <li>
                    <a href="{{ route('answer.createAnswer', ['id' => $id,'question_id' => $question_id]) }}">New Answer</a>
                </li>
                <li>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: inline;">
                        @csrf
                        <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                    </form>
                </li>
            </ul>
        </nav>
    </header>

    <main>    
        <div class="container mt-5">
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Answer</th>
                        <th>Is Correct</th>
                        <th>Created At</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($answers as $answer)
                    <tr>
                        <td>{{ $answer->id }}</td>
                        <td>{{ $answer->answer }}</td>
                        <td>{{ $answer->is_correct }}</td>
                        <td>{{ $answer->created_at->format('Y-m-d') }}</td>
                        <td>
                            <form action="{{ route('answer.destroy', ['id' => $id,'question_id' => $question_id,'answer_id'=>$answer->id]) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    </div>
    </main>

    <footer>
        <p>&copy; 2024 Secure Testing. All rights reserved.</p>
    </footer>
</body>

</html>