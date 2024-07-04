<?php
session_start();
require_once "db.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Prepare and bind
    $stmt = $conn->prepare("SELECT * FROM usertable WHERE username = ?");
    $stmt->bind_param("s", $username);

    // Execute the statement
    $stmt->execute();

    // Get the result
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();

        // Verify the password
        if (password_verify($password, $row['password'])) {
            // Set session variables
            $_SESSION['username'] = $username;
            $_SESSION['loggedin'] = true;

            // Redirect to index.php
            header("Location: index.php");
            exit;
        } else {
            // Invalid password
            $_SESSION['login_error'] = "Invalid username or password";
            header("Location: login.php");
            exit;
        }
    } else {
        // Invalid username
        $_SESSION['login_error'] = "Invalid username or password";
        header("Location: login.php");
        exit;
    }

    // Close the statement
    $stmt->close();
}
