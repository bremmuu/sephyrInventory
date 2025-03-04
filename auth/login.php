<?php
session_start();
include __DIR__ . '/../db/db_connect.php'; // Corrected path

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if ($mysqli) { // Ensure the database connection is established
        $stmt = $mysqli->prepare("SELECT id, password FROM users WHERE username = ?");
        if ($stmt) {
            $stmt->bind_param("s", $username);
            $stmt->execute();
            $stmt->store_result();

            if ($stmt->num_rows > 0) {
                $stmt->bind_result($id, $hashed_password);
                $stmt->fetch();
                
                if (password_verify($password, $hashed_password)) {
                    $_SESSION['user_id'] = $id;
                    header("Location: /public/index.php");
                    exit();
                } else {
                    echo "Invalid password.";
                }
            } else {
                echo "User not found.";
            }
            $stmt->close();
        } else {
            echo "Query preparation failed: " . $mysqli->error;
        }
    } else {
        echo "Database connection error.";
    }
}
?>
