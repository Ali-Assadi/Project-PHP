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
    <style>
      /* Blurred background style */
      #restaurantBody {
        position: relative;
        margin: 0;
        padding: 0;
        height: 100vh;
        overflow: hidden;
      }

      #restaurantBody::before {
        content: "";
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: url('<?= $imagesPath ?>bg99.jpg') no-repeat center center/cover;
        filter: blur(20px); /* Apply 80% blur effect */
        opacity: 0.8; /* Adjust visibility to 80% */
        z-index: -1; /* Place it behind content */
      }
    </style>
  </head>
  <body id="restaurantBody">
    <div class="Project">
      <?php include 'header.php'; ?>
      <?php include 'navbar.php'; ?>
      <?php include 'mainContent.php'; ?>
      <?php include 'footer.php'; ?>
    </div>
    <!-- <?php include 'backGroundScript.php'; ?> -->
  </body>
</html>
