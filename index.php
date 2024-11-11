




<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="css/style.css">
        <title>Document</title>
    </head>
    <body>
        <main class="loginForm">
            <div class="container">
                <form action="modeli/login.php" method="POST" class="form" >
                    <input type="email" placeholder="email" name="email" required>
                    <input type="password" placeholder="password" name="password" required>
                    <button class="button" type="submit" >Login</button>
                </form>
                <div class="register">
                    <p>Don't have account?</p>
                    <a href="registerForm.php">Register</a>
                </div>

            </div>
        </main>
    </body>
</html>