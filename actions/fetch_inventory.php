<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    http_response_code(403); // Forbidden
    exit("Access Denied");
}

include __DIR__ . '/../db/db_connect.php';

$query = "SELECT * FROM products";
if ($result = $mysqli->prepare($query)) {
    $result->execute();
    $result->bind_result($id, $name, $quantity, $price);

    while ($result->fetch()) {
        echo "<tr>
                <td>{$id}</td>
                <td>{$name}</td>
                <td>{$quantity}</td>
                <td>\${$price}</td>
              </tr>";
    }
    $result->close();
} else {
    echo "Error: " . $mysqli->error;
}

$mysqli->close();
?>
