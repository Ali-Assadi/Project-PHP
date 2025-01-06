<?php
session_start();

// Check if the user is logged in
$user = null;
if (isset($_SESSION['username'])) {
    foreach ($_SESSION['users'] as $u) {
        if ($u['username'] === $_SESSION['username']) {
            $user = $u;
            break;
        }
    }
}

// Define paths for resources
$imagesPath = "photos/index_images/";
$cssPath = "css_files/maincss.css";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= $cssPath ?>" />
    <title>Home</title>
</head>
<body id="restaurantBody">
    <div class="Project">
        <?php include 'header_home.php'; ?>
        <?php include 'navbar.php'; ?>
        <?php include 'mainContent.php'; ?>
        <?php include 'footer.php'; ?>
    </div>
</body>
</html>
