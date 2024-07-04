<?php
session_start();
require_once "db.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    // Check if passwords match
    if ($password !== $confirm_password) {
        $_SESSION['password_mismatch'] = true;
        header("Location: register.php");
        exit;
    }

    // Hash the password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    $stmt = $conn->prepare("INSERT INTO usertable (username, password) VALUES (?, ?)");
    $stmt->bind_param("ss", $username, $hashed_password);

    if ($stmt->execute()) {
        // Registration successful, set session message
        $_SESSION['register_success'] = true;
    } else {
        // Registration unsuccessful, set session message
        $_SESSION['register_error'] = true;
    }

    // Close the statement
    $stmt->close();
    // Redirect back to register.php to display the message
    header("Location: register.php");
    exit;
}
