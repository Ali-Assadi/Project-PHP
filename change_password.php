<?php
session_start();
include "db_config.php"; // Include database connection

// Ensure the user is logged in and logged in with a temporary password
if (!isset($_SESSION['user_id']) || !isset($_SESSION['temp_password'])) {
    header("Location: signin.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $newPassword = $_POST['new_password'] ?? null;
    $confirmPassword = $_POST['confirm_password'] ?? null;

    if ($newPassword && $confirmPassword) {
        if ($newPassword === $confirmPassword) {
            $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);

            // Update the user's password in the database
            $stmt = $conn->prepare("UPDATE users SET password = ?, temp_password = NULL, failed_attempts = 0 WHERE id = ?");
            $stmt->bind_param("si", $hashedPassword, $_SESSION['user_id']);
            $stmt->execute();

            // Clear temp password flag
            unset($_SESSION['temp_password']);

            echo "<p style='color: green; text-align: center;'>Password successfully updated. You can now log in with your new password.</p>";
            header("Refresh: 3; URL=signin.php");
            exit();
        } else {
            echo "<p style='color: red; text-align: center;'>Passwords do not match. Please try again.</p>";
        }
    } else {
        echo "<p style='color: red; text-align: center;'>Please fill in both password fields.</p>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css_files/change_password.css">
    <title>Change Password</title>
</head>
<body>
    <div class="container">
        <h2>Change Your Password</h2>
        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
            <input type="password" name="new_password" required placeholder="New Password" />
            <input type="password" name="confirm_password" required placeholder="Confirm New Password" />
            <input type="submit" value="Update Password" />
        </form>
    </div>
</body>
</html>
