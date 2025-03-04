<?php
session_start();
header("Content-Type: application/json"); // Ensure JSON response

if (!isset($_SESSION['user_id'])) {
    http_response_code(403); // Forbidden
    echo json_encode(["status" => "error", "message" => "Access Denied"]);
    exit();
}

include __DIR__ . '/../db/db_connect.php';

$query = "SELECT * FROM products";
$result = $mysqli->query($query);

if ($result) {
    $products = [];

    while ($row = $result->fetch_assoc()) {
        $products[] = $row; // Add each row as an array element
    }

    echo json_encode(["status" => "success", "data" => $products]);
} else {
    echo json_encode(["status" => "error", "message" => "Error: " . $mysqli->error]);
}

$mysqli->close();
?>
