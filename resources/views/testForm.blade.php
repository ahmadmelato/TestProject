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
        <label for="table">Please press the save button after completing the test. If you fail to save the test, it will be cancelled.</label>
            <table id="table" class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Question</th>
                        <th>Your Answer</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($questions as $question)
                    <tr>
                        <td>{{ $question->id }}</td>
                        <td>{{ $question->content }}</td>
                        <td>
                        <div>
                            @foreach ($answers as $answer)
                                @if ($answer->question_id === $question->id)
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="question_{{ $question->id }}" id="answer_{{ $answer->id }}" value="{{ $answer->id }}">
                                        <label class="form-check-label" for="answer_{{ $answer->id }}">
                                            {{ $answer->answer }}
                                        </label>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="mb-3">
                <button type="button" class="btn btn-primary" id="saveBtn">Save</button>
            </div>
        </div>


        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script>
        document.getElementById('saveBtn').addEventListener('click', function() {
            const selectedAnswers = {};
            const questions = @json($questions); // Use Blade to inject PHP array as JSON
            console.log('Questions:', 'asdsa;dsad');
            alert('Data saved successfully!');
            questions.forEach(question => {
                const selected = document.querySelector(`input[name="question_${question.id}"]:checked`);
                if (selected) {
                    selectedAnswers[question.id] = selected.value;
                }
            });

            if (Object.keys(selectedAnswers).length > 0) {
                console.log('Selected Answers:', selectedAnswers);
                alert('Data saved successfully!'); // Placeholder action
                // Here you could send selectedAnswers to your server via AJAX
            } else {
                alert('Please select answers for the questions.');
            }
        });
    </script>

    </div>
    <script>
    alert('Please press the save button after completing the test. If you fail to save the test, it will be cancelled');
    </script>
    </main>

    <footer>
        <p>&copy; 2024 Secure Testing. All rights reserved.</p>
    </footer>
</body>

</html>