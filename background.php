<?php
// Define the path for images and resources
$imagesPath = "photos/index_images/";
$cssPath = "css_files/maincss.css";
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="<?= $jsPath ?>" defer></script>
    <link rel="stylesheet" href="<?= $cssPath ?>" />
    <title>Restaurant</title>
    <style>
      /* Inline CSS for max height and max width */
      body {
        max-width: 400px;
        max-height: 400px;
        margin: 0 auto; /* Center the body */
        overflow: hidden; /* Prevent overflow */
        background-size: cover;
        background-position: center;
      }
    </style>
  </head>
  <body id="restaurantBody" style="background-image: url('<?= $imagesPath ?>bg99.jpg') ">   
  </body>
</html>

<?php include 'backGroundScript.php'; ?>
