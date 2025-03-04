<?php
include __DIR__ . '/../db/db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $quantity = $_POST['quantity'];
    $price = $_POST['price'];

    $stmt = $mysqli->prepare("UPDATE products SET name = ?, quantity = ?, price = ? WHERE id = ?");
    $stmt->bind_param("sidi", $name, $quantity, $price, $id);

    if ($stmt->execute()) {
        echo json_encode(["status" => "success", "message" => "Product updated successfully!"]);
    } else {
        echo json_encode(["status" => "error", "message" => "Error: " . $stmt->error]);
    }

    $stmt->close();
    $mysqli->close();
}
?>
