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