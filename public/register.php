<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Register</title>
</head>
<body>
<div id="reglog-container">
    <form id="reglog-form" action="register.php" method="post">
        <h1>Sign Up</h1>
        <div>
            <label for="username">Username:</label><br>
            <input class="reglog-input" type="text" name="username" id="username">
        </div>
        <div>
            <label for="email">Email:</label><br>
            <input class="reglog-input" type="email" name="email" id="email">
        </div>
        <div>
            <label for="password">Password:</label><br>
            <input class="reglog-input" type="password" name="password" id="password">
        </div>
        <div>
            <label for="password2">Password Again:</label><br>
            <input class="reglog-input" type="password" name="password2" id="password2">
        </div>
        <div>
            <label for="agree">
                <input type="checkbox" name="agree" id="agree" value=""/> I agree
                with the
                <a href="https://www.youtube.com/watch?v=0H3ISkauh70" title="term of services">term of services</a>
            </label>
        </div>
        <button id="reglog-button" type="submit">Register</button>
        <footer>Already a member? <a href="login.php">Login here</a></footer>
    </form>
</div>
</body>
</html>