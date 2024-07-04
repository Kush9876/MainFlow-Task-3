<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Majasg</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <header>
        <h1>Login</h1>
        <nav>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="register.php">Register</a></li>
                <li><a href="login.php">Login</a></li>
            </ul>
        </nav>
    </header>
    <section>
        <form action="login_process.php" method="POST">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required><br>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required><br>
            <button type="submit">Login</button>
        </form>
        <?php
        // Display login error message
        if (isset($_SESSION['login_error'])) {
            echo "<script>alert('" . $_SESSION['login_error'] . "');</script>";
            unset($_SESSION['login_error']); // Clear the session message
        }
        ?>
    </section>
    <footer>
        <p>&copy; 2024 MainFlow</p>
    </footer>
</body>

</html>