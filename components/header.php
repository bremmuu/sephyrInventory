<?php if (isset($_SESSION['user_id'])): ?>
    <a href="/auth/logout.php" class="logout-btn">Logout</a>
<?php endif; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>sephyrStocks</title>
    <link rel="stylesheet" href="/css/style.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <header>
        <h1>sephyrStocks</h1>
        <h3>Inventorty Manager</h3>
    </header>
