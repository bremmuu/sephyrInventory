<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="/assets/blueTumn.png">
    <title>Login</title>
    <link rel="stylesheet" href="/css/style.css">
</head>
<body>
    
<div id="messageBox"></div>

    <div class="login-container">
        <h2>Login</h2>
        <?php if (isset($_SESSION['error'])): ?>
            <p class="error"><?= $_SESSION['error']; unset($_SESSION['error']); ?></p>
        <?php endif; ?>
        <form action="/auth/login.php" method="POST">
            <label>Username:</label>
            <input type="text" name="username" required>
            <label>Password:</label>
            <input type="password" name="password" required>
            <button type="submit">Login</button>
        <p>Don't have an account? <a href="register.html">Register here</a></p>
        </form>
    </div>
</body>
</html>
