<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Log in</title>
</head>
<body>
<main>
    <div id="reglog-container">
        <form id="reglog-form" action="login.php" method="post">
            <h1>Log in</h1>
            <div>
                <label for="email">Email:</label><br>
                <input class="reglog-input" type="email" name="email" id="email">
            </div>
            <div>
                <label for="password">Password:</label><br>
                <input class="reglog-input" type="password" name="password" id="password">
            </div>
            <button class="reglog-button" type="submit">Log in</button>
            <footer>Don't have an account yet? <a href="register.php">Register here</a></footer>
        </form>
    </div>
</main>
</body>
</html>