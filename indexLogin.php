<?php
// Get the URL parameters
$username = isset($_GET['username']) ? $_GET['username'] : '';
$email = isset($_GET['email']) ? $_GET['email'] : '';
$password = isset($_GET['password']) ? $_GET['password'] : '';
$childName = isset($_GET['childName']) ? $_GET['childName'] : '';
$childPassword = isset($_GET['childPassword']) ? $_GET['childPassword'] : '';
?>
<!DOCTYPE html>
<html>
  <head>
    <link rel="stylesheet" href="css_files/LoginMain.css" />
    <style></style>
  </head>
  <body>
    <div class="Project">
      <header class="header">
        <div class="user-menu">
          <div class="user-info">
            <img
              src="photos/LoginIndex_images/usericon.png.png"
              alt="User Profile Picture"
              class="profile-pic"
            />
            <span class="username" id="username"><?php echo "Welcome, " . htmlspecialchars($username); ?></span>
          </div>
          <ul class="dropdown-menu hidden">
            <li>
              <a
                href="my_account.php"
                id="myAccountLink"
                target="main"
              >My Account</a>
            </li>
            <li><a href="index.php">Sign Out</a></li>
          </ul>
        </div>
      </header>
      <div class="leftbar">
        <br /><br />
        <div class="btn">
          <a href="background.php" target="main">
            <button class="button button1">
              Main
              <div class="button__horizontal"></div>
              <div class="button__vertical"></div>
            </button> 
          </a><br /><br />
          <a href="Food.php" target="main">
            <button class="button button2">
              Food
              <div class="button__horizontal"></div>
              <div class="button__vertical"></div>
            </button> 
          </a><br /><br />
          <a href="drink.php" target="main">
            <button class="button button3">
              Drinks
              <div class="button__horizontal"></div>
              <div class="button__vertical"></div>
            </button> 
          </a><br /><br />
          <a href="ice-cream_minue.php" target="main">
            <button class="button button4">
              Ice Cream
              <div class="button__horizontal"></div>
              <div class="button__vertical"></div>
            </button> 
          </a><br /><br />
          <a href="location.php" target="main">
            <button class="button button5">
              Our Place
              <div class="button__horizontal"></div>
              <div class="button__vertical"></div>
            </button> 
          </a><br /><br />
          <a href="reservation.php" target="main">
            <button class="button button8">
              Reservation
              <div class="button__horizontal"></div>
              <div class="button__vertical"></div>
            </button> 
          </a><br /><br />
          <a href="contact_us.php" target="main">
            <button class="button button7">
              Contact Us
              <div class="button__horizontal"></div>
              <div class="button__vertical"></div>
            </button>
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
      document.addEventListener("DOMContentLoaded", (event) => {
        // Pass the PHP variables to JavaScript by using echo to print them
        const username = "<?php echo htmlspecialchars($username); ?>";
        const email = "<?php echo htmlspecialchars($email); ?>";
        const password = "<?php echo htmlspecialchars($password); ?>";
        const childName = "<?php echo htmlspecialchars($childName); ?>";
        const childPassword = "<?php echo htmlspecialchars($childPassword); ?>";

        if (username) {
          document.getElementById("username").textContent = "Welcome, " + username;
        }

        document
          .getElementById("myAccountLink")
          .addEventListener("click", function (event) {
            event.preventDefault();
            const accountUrl = `../html_files/my_account.php?username=${encodeURIComponent(username)}&email=${encodeURIComponent(email)}&password=${encodeURIComponent(password)}&childName=${encodeURIComponent(childName)}&childPassword=${encodeURIComponent(childPassword)}`;
            window.frames["main"].location.href = accountUrl;
          });
      });
    </script>
    <script>document.querySelector(".profile-pic").addEventListener("click", function () {
  document.querySelector(".dropdown-menu").classList.toggle("hidden");
});
document.getElementById("log-off").addEventListener("click", function (event) {
  event.preventDefault();
  window.close();
});
</script>
  </body>
</html>
