<?php
session_start();

// Initialize users array with failed attempts if it doesn't exist
if (!isset($_SESSION['users'])) {
    $_SESSION['users'] = [
        [
            'username' => 'test1',
            'firstname' => 'aban',
            'lastname' => 'abi',
            'email' => 'test1@example.com',
            'phone' => '1234567890',
            'password' => 'password1',
            'failed_attempts' => 0
        ],
        [
            'username' => 'test2',
            'firstname' => 'aabah',
            'lastname' => 'bahbhan',
            'email' => 'test2@example.com',
            'phone' => '0987654321',
            'password' => 'password2',
            'failed_attempts' => 0
        ]
    ];
}

// Reset lock and failed attempts if reset button is clicked
if (isset($_GET['reset']) && $_GET['reset'] === 'true') {
    foreach ($_SESSION['users'] as &$user) {
        $user['failed_attempts'] = 0;
    }
    header("Location: " . htmlspecialchars($_SERVER['PHP_SELF']));
    exit();
}

// Lock message initialization
$lockMessage = "";

// Function to generate a 6-character random password with letters and numbers
function generateRandomPassword() {
    $characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
    $password = '';
    for ($i = 0; $i < 6; $i++) {
        $password .= $characters[rand(0, strlen($characters) - 1)];
    }
    return $password;
}

// Forgot Password Logic
if (isset($_POST['forgotPassword'])) {
    $username = $_POST['username'];
    $userFound = false;

    foreach ($_SESSION['users'] as &$user) {
        if ($user['username'] === $username) {
            $userFound = true;
            $newPassword = generateRandomPassword();
            $user['password'] = $newPassword;

            echo "<script>alert('Your new password is: $newPassword');</script>";
            break;
        }
    }

    if (!$userFound) {
        echo "<script>alert('Username not found. Please try again.');</script>";
    }
}

// Process login attempt
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['signin'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $userFound = false;
    $passwordMatch = false;

    foreach ($_SESSION['users'] as &$user) {
        if ($user['username'] === $username) {
            $userFound = true;

            if ($user['failed_attempts'] >= 3) {
                $lockMessage = "Your account is locked due to too many failed login attempts.";
            } else {
                if ($user['password'] === $password) {
                    $_SESSION['username'] = $username; // Save the username in session
                    $user['failed_attempts'] = 0;
                    echo "<script>alert('Login successful! Redirecting...');</script>";
                    echo "<script>window.top.location.href='home.php';</script>";
                    exit();
                }else {
                    $user['failed_attempts']++;
                    $attemptsLeft = 3 - $user['failed_attempts'];

                    if ($attemptsLeft > 0) {
                        echo "<script>alert('Invalid password. You have $attemptsLeft attempts left.');</script>";
                    } else {
                        echo "<script>alert('Your account is now locked due to too many failed attempts.');</script>";
                    }
                }
            }
            break;
        }
    }

    if (!$userFound) {
        echo "<script>alert('There is no username like this.');</script>";
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
