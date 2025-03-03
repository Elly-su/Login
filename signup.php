<?php
$host = "localhost";
$user = "root";
$pass = "";
$db = "login_page_db"; // Updated database name

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$user_name = "testuser";
$password = "password123";
$hashed_password = password_hash($password, PASSWORD_BCRYPT);

$stmt = $conn->prepare("INSERT INTO users (user_name, password) VALUES (?, ?)");
$stmt->bind_param("ss", $user_name, $hashed_password);

if ($stmt->execute()) {
    echo "User registered successfully!";
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
