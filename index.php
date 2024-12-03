<?php
// Define the path for images and resources
$imagesPath = "photos/index_images/";
$cssPath = "css_files/maincss.css";
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= $cssPath ?>" />
    <title>Restaurant</title>
  </head>
  <body id="restaurantBody">
    <div class="Project">
    <?php include 'header.php'; ?>
      <?php include 'navbar.php'; ?>
      <?php include 'mainContent.php'; ?>
      <?php include'footer.php'; ?>
    </div>
    <?php include 'backGroundScript.php'; ?>
  </body>
</html>
