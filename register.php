<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - Majasg</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <header>
        <h1>Register</h1>
        <nav>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="register.php">Register</a></li>
                <li><a href="login.php">Login</a></li>
            </ul>
        </nav>
    </header>
    <section>
        <form action="register_process.php" method="POST">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required><br>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required><br>

            <label for="confirm_password">Confirm Password:</label>
            <input type="password" id="confirm_password" name="confirm_password" required><br>

            <button type="submit">Register</button>
        </form>
        <?php
        // Check for registration success message
        if (isset($_SESSION['register_success'])) {
            echo "<script>alert('Registration Successful');</script>";
            unset($_SESSION['register_success']); // Clear the session message
        }
        // Check for registration error message
        if (isset($_SESSION['register_error'])) {
            echo "<script>alert('Registration Unsuccessful');</script>";
            unset($_SESSION['register_error']); // Clear the session message
        }
        // Check for password mismatch error message
        if (isset($_SESSION['password_mismatch'])) {
            echo "<script>alert('Passwords do not match');</script>";
            unset($_SESSION['password_mismatch']); // Clear the session message
        }
        ?>
    </section>
    <footer>
        <p>&copy; 2024 MainFlow</p>
    </footer>
</body>

</html>