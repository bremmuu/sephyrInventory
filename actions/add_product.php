<?php
include __DIR__ . '/../db/db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $quantity = $_POST['quantity'];
    $price = $_POST['price'];

    $stmt = $mysqli->prepare("INSERT INTO products (name, quantity, price) VALUES (?, ?, ?)");
    $stmt->bind_param("sid", $name, $quantity, $price);

    if ($stmt->execute()) {
        echo "Product added successfully!";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $mysqli->close();
}
?>
