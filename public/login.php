    <?php

        require __DIR__ . '/../src/bootstrap.php';
        require __DIR__ . '/../src/login.php';

    ?>

    <div id="reglog-container">
    <?php view('header', ['title' => 'Login']) ?>

    <?php if (isset($errors['login'])) : ?>
        <div id="everyerror">
            <?= $errors['login'] ?>
        </div>
    <?php endif ?>

        <form id="reglog-form" action="login.php" method="post">
            <h1>Login</h1>
            <div>
                <label for="username">Username:</label>
                <input class="reglog-input" type="text" name="username" id="username" value="<?= $inputs['username'] ?? '' ?>">
                
                <small class="error"><?= $errors['username'] ?? '' ?></small>
            </div>
            <div>
                <label for="password">Password:</label><br>
                <input class="reglog-input" type="password" name="password" id="password">

                <small class="error"><?= $errors['password'] ?? '' ?></small>
            </div>
            <button class="reglog-button" type="submit">Login</button>
            <footer>Don't have an account yet? <a href="register.php">Register here</a></footer>
        </form>
    </div>
