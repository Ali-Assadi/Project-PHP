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
            'failed_attempts' => 0 // Add default failed attempts
        ],
        [
            'username' => 'test2',
            'firstname' => 'aabah',
            'lastname' => 'bahbhan',
            'email' => 'test2@example.com',
            'phone' => '0987654321',
            'password' => 'password2',
            'failed_attempts' => 0 // Add default failed attempts
        ]
    ];
}

// Reset lock and failed attempts if reset button is clicked
if (isset($_GET['reset']) && $_GET['reset'] === 'true') {
    // Reset all users' failed attempts to 0
    foreach ($_SESSION['users'] as &$user) {
        $user['failed_attempts'] = 0;
    }
    header("Location: " . htmlspecialchars($_SERVER['PHP_SELF'])); // Redirect to avoid resubmission
    exit();
}

// Lock message initialization
$lockMessage = "";
// Process login attempt
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $userFound = false; // Tracks if the user exists
    $passwordMatch = false; // Tracks if the password matches

    foreach ($_SESSION['users'] as &$user) {
        if ($user['username'] === $username) {
            $userFound = true;

            // Check if the user is locked
            if ($user['failed_attempts'] >= 3) {
                $lockMessage = "Your account is locked due to too many failed login attempts.";
            } else {
                // Check password
                if ($user['password'] === $password) {
                    $passwordMatch = true;
                    $user['failed_attempts'] = 0; // Reset failed attempts
                    echo "<script>alert('Login successful!');</script>";
                    echo "<script>window.location.href='" . htmlspecialchars($_SERVER['PHP_SELF']) . "';</script>";
                    exit();
                } else {
                    $user['failed_attempts']++;
                    $attemptsLeft = 3 - $user['failed_attempts'];

                    if ($attemptsLeft > 0) {
                        echo "<script>alert('Invalid password. You have $attemptsLeft attempts left.');</script>";
                    } else {
                        echo "<script>alert('Your account is now locked due to too many failed attempts.');</script>";
                    }
                }
            }
            break; // Break the loop after finding the user
        }
    }

    // Handle case where username does not exist
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
                <input type="submit" value="Sign In" />
            </form>
        </div>
    <?php endif; ?>
</body>
</html>
