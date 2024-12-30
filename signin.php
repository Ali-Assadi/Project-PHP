<?php
session_start();
include "db_config.php"; // Include the database connection

// Initialize $lockMessage to avoid undefined variable warnings
$lockMessage = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Safely retrieve username and password from POST
    $username = $_POST['username'] ?? null;
    $password = $_POST['password'] ?? null;

    if ($username && $password) {
        // Query to fetch the user from the database
        $stmt = $conn->prepare("SELECT id, password, failed_attempts FROM users WHERE username = ?");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result && $result->num_rows > 0) {
            $user = $result->fetch_assoc();

            // Check if the account is locked
            if ($user['failed_attempts'] >= 3) {
                $lockMessage = "Your account is locked due to too many failed attempts. Please contact support.";
            } else {
                // Verify the password
                if (password_verify($password, $user['password'])) {
                    // Reset failed attempts on successful login
                    $resetStmt = $conn->prepare("UPDATE users SET failed_attempts = 0 WHERE id = ?");
                    $resetStmt->bind_param("i", $user['id']);
                    $resetStmt->execute();

                    // Set session variables
                    $_SESSION['user_id'] = $user['id'];
                    $_SESSION['username'] = $username;

                    // Redirect to a welcome page or dashboard
                    header("Location: welcome.php");
                    exit();
                } else {
                    // Increment failed attempts
                    $incrementStmt = $conn->prepare("UPDATE users SET failed_attempts = failed_attempts + 1 WHERE id = ?");
                    $incrementStmt->bind_param("i", $user['id']);
                    $incrementStmt->execute();

                    echo "<p style='color: red; text-align: center;'>Invalid password. Please try again.</p>";
                }
            }
        } else {
            echo "<p style='color: red; text-align: center;'>No user found with the username provided.</p>";
        }

        $stmt->close();
    } else {
        echo "<p style='color: red; text-align: center;'>Please enter both username and password.</p>";
    }
}

// Close the database connection
$conn->close();
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
            <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
                <input type="text" id="username" name="username" required placeholder="Username" />
                <input type="password" id="password" name="password" required placeholder="Password" />
                <input type="submit" name="signin" value="Sign In" />
            </form>

            <!-- Forgot Password Section -->
            <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" style="margin-top: 20px;">
    <!-- Default "Forgot your password?" text -->
    <span id="forgotPasswordText" onclick="toggleForgotPasswordForm()" style="color: black; cursor: pointer;">Forgot your password?</span>

    <!-- Hidden form (initially hidden) to input username and reset password -->
    <div id="forgotPasswordForm" style="display: none;">
        <br />
        <label for="forgotUsername" style="color: black;">Enter your username:</label>
        <input type="text" id="forgotUsername" name="username" required placeholder="Username" />
        <input type="submit" name="forgotPassword" value="Reset Password" />
    </div>
</form>
<script>
function toggleForgotPasswordForm() {
    // Toggle the visibility of the form when the text is clicked
    const form = document.getElementById('forgotPasswordForm');
    form.style.display = form.style.display === 'block' ? 'none' : 'block';

    // Toggle the text of the link
    const text = document.getElementById('forgotPasswordText');
    text.innerHTML = form.style.display === 'block' ? 'Hide Reset Password Form' : 'Forgot your password?';
}
</script>


        </div>
    <?php endif; ?>
</body>
</html>
