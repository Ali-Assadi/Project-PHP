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
      <header
        class="header"
        style="background: linear-gradient(-135deg, rgb(63, 63, 63), rgb(182, 165, 132));"
      >
        <a href="signin.php" target="main">
          <img src="<?= $imagesPath ?>usericon.png" id="usericon"/>
        </a>
        <a href="sign_Up.php" target="main">
          <img src="<?= $imagesPath ?>usericon.png" id="usericon"/>
        </a>
        <img src="<?= $imagesPath ?>navBarBackground.png" id="left" />
        <img src="photos/logo_Images/Logo99.png" id="logo" />
        <img src="<?= $imagesPath ?>navBarBackground.png" id="right" />
      </header>

      <div class="leftbar">
        <br /><br />
        <div class="btn">
          <a href="background.php" target="main">
            <button class="button button1">Main</button>
          </a><br /><br />
          <a href="Food.php" target="main">
            <button class="button button2">Food</button>
          </a><br /><br />
          <a href="drink.php" target="main">
            <button class="button button3">Drinks</button>
          </a><br /><br />
          <a href="location.php" target="main">
            <button class="button button5">Our Place</button>
          </a><br /><br />
          <a href="reservation.php" target="main">
            <button class="button button8">Reservation</button>
          </a><br /><br />
          <a href="contact-us.php" target="main">
            <button class="button button7">Contact Us</button>
          </a>
        </div>
      </div>

      <main class="main">
        <iframe src="background.php" name="main"></iframe>
      </main>

      <footer class="footer">
        <marquee style="margin-top: 7px; color: black">
          © 2024 Restaurant. All rights reserved.
        </marquee>
      </footer>
    </div>

    <script>
      document.addEventListener("DOMContentLoaded", function () {
        var images = [
          "photos/index_images/bg3.jpg",
          "photos/index_images/bg1.jpg",
          "photos/index_images/bg2.jpg"
        ];
        var currentIndex = 0;
        var bodyElement = document.getElementById("restaurantBody");

        function changeBackground() {
          currentIndex = (currentIndex + 1) % images.length;
          bodyElement.style.backgroundImage = "url('" + images[currentIndex] + "')";
        }

        changeBackground();

        setInterval(changeBackground, 3000);
      });
    </script>
  </body>
</html>
