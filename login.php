<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();

echo "Debug: Script started<br>";

$host = "localhost";
$user = "root";
$pass = "";
$db = "login_page_db";

// Create database connection
$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Debug: Connection failed - " . $conn->connect_error);
}

echo "Debug: Connected to database<br>";

// Check if form is submitted.
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    echo "Debug: Form submitted<br>";

    if (!isset($_POST['username']) || !isset($_POST['password'])) {
        die("Debug: Username or password not received");
    }

    $user_name = $_POST['username'];
    $password = $_POST['password'];

    echo "Debug: Username received: $user_name<br>";
    echo "Debug: Password received<br>";

    // Prepare SQL statement
    $stmt = $conn->prepare("SELECT password FROM users WHERE user_name=?");
    if (!$stmt) {
        die("Debug: Prepare statement failed - " . $conn->error);
    }

    $stmt->bind_param("s", $user_name);
    $stmt->execute();
    $stmt->store_result();

    echo "Debug: Query executed<br>";

    if ($stmt->num_rows > 0) {
        $stmt->bind_result($hashed_password);
        $stmt->fetch();
        echo "Debug: User found in database<br>";

        if (password_verify($password, $hashed_password)) {
            $_SESSION["user"] = $user_name;
            echo "Login successful!";
            exit();
        } else {
            echo "Debug: Invalid username or password<br>";
        }
    } else {
        echo "Debug: User not found!<br>";
    }

    $stmt->close();
} else {
    echo "Debug: No POST request received.<br>";
}

$conn->close();
?>
