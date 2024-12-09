<?php
session_start();

// Reset lock and failed attempts if reset button is clicked
if (isset($_GET['reset']) && $_GET['reset'] === 'true') {
    $_SESSION['failed_attempts'] = 0;
    header("Location: " . htmlspecialchars($_SERVER['PHP_SELF'])); // Redirect to avoid resubmission
    exit();
}

// Initialize failed attempts counter
if (!isset($_SESSION['failed_attempts'])) {
    $_SESSION['failed_attempts'] = 0;
}

$lockMessage = "";

// Check if the page is locked
if ($_SESSION['failed_attempts'] >= 3) {
    $lockMessage = "Too many failed attempts. The page is locked!";
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && $_SESSION['failed_attempts'] < 3) {
    $correctUsername = "User123"; // Example correct username
    $correctPassword = "Password123"; // Example correct password

    $username = $_POST['username'];
    $password = $_POST['password'];

    // Validate credentials
    if ($username === $correctUsername && $password === $correctPassword) {
        $_SESSION['failed_attempts'] = 0; // Reset attempts on successful login
        echo "<script>alert('Sign in successful!');</script>";
    } else {
        $_SESSION['failed_attempts']++;
        $attemptsLeft = 3 - $_SESSION['failed_attempts'];
        if ($attemptsLeft > 0) {
            echo "<script>alert('Invalid username or password. You have $attemptsLeft attempts left.');</script>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="css_files/sign_in.css" />
    <title>Sign In</title>
</head>
<body>
    <?php if ($lockMessage): ?>
        <div style="text-align:center; margin-top:20%; color:red;">
            <h1><?php echo $lockMessage; ?></h1>
            <button onclick="window.location.href='?reset=true'">Reset and Start Over</button>
        </div>
    <?php else: ?>
        <div class="container" id="container">
            <h2 style="color: black">Sign In</h2>
            <form
                action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>"
                method="post"
            >
                <input
                    type="text"
                    id="username"
                    name="username"
                    required
                    placeholder="Username"
                />
                <input
                    type="password"
                    id="password"
                    name="password"
                    required
                    placeholder="Password"
                />
                <input type="submit" value="Sign In" />
            </form>
        </div>
    <?php endif; ?>
</body>
</html>
