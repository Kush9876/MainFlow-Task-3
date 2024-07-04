<?php
session_start();

// Logout logic
if (isset($_GET['logout'])) {
    session_unset(); // Unset all session variables
    session_destroy(); // Destroy the session
    header("Location: index.php"); // Redirect to the homepage after logout
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <header>
        <h1>Homepage</h1>
        <nav>
            <ul>
                <li><a href="index.php">Home</a></li>
                <?php if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) { ?>
                    <li><a href="register.php">Register</a></li>
                    <li><a href="login.php">Login</a></li>
                <?php } else { ?>
                    <li><a href="?logout">Logout</a></li>
                    <div class="user-info">
                        <?php echo htmlspecialchars($_SESSION['username']); ?>
                    </div>
                <?php } ?>
            </ul>
        </nav>
    </header>

    <div class="content">
        <section class="content-section" id="welcome-section">
            <h2>Welcome to the Landing Website</h2>
            <p>This platform facilitates seamless connection with registering id's, login process, and landing page.</p>
        </section>

        <section class="content-section" id="how-to-use-section">
            <h2>How to Use the Platform</h2>
            <ul>
                <li>Register and login to access your dashboard.</li>
            </ul>
        </section>
    </div>

    <footer>
        <p>&copy; 2024 MainFlow</p>
    </footer>
</body>

</html>