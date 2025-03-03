<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();
$host = "localhost";
$user = "root";
$pass = "";
$db = "login_page_db";

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_name = $_POST['username'];
    $password = $_POST['password'];

    // Secure query with prepared statements
    $stmt = $conn->prepare("SELECT password FROM users WHERE user_name=?");
    $stmt->bind_param("s", $user_name);
    $stmt->execute();
    $stmt->store_result();
    $stmt->bind_result($hashed_password);
    $stmt->fetch();

    if ($stmt->num_rows > 0 && password_verify($password, $hashed_password)) {
        $_SESSION["user"] = $user_name;
        
        // Set secure cookie with HttpOnly and Secure flag
        setcookie("auth_user", $user_name, time() + (86400 * 1), "/", "", true, true);

        echo "Login successful!";
        // Redirect to dashboard
        // header("Location: dashboard.php");
    } else {
        echo "Invalid username or password";
    }
    $stmt->close();
}

$conn->close();
?>
