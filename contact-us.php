<?php
// Handle form submission if needed
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Collect form data
    $name = htmlspecialchars($_POST['name']);
    $phone = htmlspecialchars($_POST['phone']);
    $message = htmlspecialchars($_POST['message']);
    
    // You can now process or store this data as needed
    // Example: sending an email, saving to a database, etc.
    // For now, just a success message
    $form_success = "Thank you for contacting us, we will get back to you soon!";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css_files/contact_us.css">
    <title>Contact Us</title>
</head>
<body>
    <div class="contact">
        <h3>How can we help you?</h3>
        <h1>Contact Us</h1>
        <p>We're here to help and answer any questions you might have.<br>
        We look forward to hearing from you!</p>
        <img src="photos/contact-us_images/hallo.png" class="contact-img" style="width: 400px; float: right;">
        <br>
        <img src="photos/contact-us_images/placeicon.jpg" class="icon">
        <br><br>
        <a href="https://maps.app.goo.gl/yToY4GeEwLhoiwpPA"> Karmiel, OrtBraude</a>
        <br><br>
        <img src="photos/contact-us_images/phoneicon.png" class="icon">
        <br><br>
        <a href="04-20111000">04-20111000</a>
        <br><br>
        <img src="photos/contact-us_images/mailicon.png" class="icon">
        <br><br>
        <a href="name@name.com">name@name.com</a>
        </p>
    </div>
    
    <!-- Display success message if form was submitted -->
    <?php if (isset($form_success)): ?>
        <p style="color: green; text-align: center;"><?php echo $form_success; ?></p>
    <?php endif; ?>

    <!-- Contact Form Box -->
    <div class="contact-form">
        <h2>Send us a message</h2>
        <form action="contact_us.php" method="post">
            <input type="text" name="name" placeholder="Your Name" required>
            <input type="text" name="phone" placeholder="Your Phone Number" required>
            <textarea name="message" placeholder="Your Message" required></textarea>
            <button type="submit" class="submit-btn">Submit</button>
        </form>
    </div>

</body>
</html>

<style>
body {
  background: linear-gradient(-135deg, rgb(104, 93, 61), wheat);
  margin-left: 50px;
  margin-top: 10px;
  padding-bottom: 380px;
  overflow: hidden;
}

img {
  width: 20px;
  aspect-ratio: 3/2;
  object-fit: contain;
  mix-blend-mode: color-burn;
}

img:hover {
  scale: 1.1;
  transition: 0.8s ease;
  rotate: -8deg;
}

a {
  color: black;
  text-decoration: none;
}

a:hover {
  color: gray;
  scale: 1.1;
}

@media screen and (max-width: 540px) {
  img {
    display: none;
  }
}

.contact p {
  font-size: large;
}

.contact-img {
  width: 400px;
  float: right;
}

.icon {
  height: 20px;
  width: 20px;
}

/* Styles for Contact Form */
.contact-form {
    background-color: rgba(255, 255, 255, 0.8);
    padding: 20px;
    border-radius: 10px;
    width: 100%;
    max-width: 500px;
    margin-top: 40px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
}

.contact-form h2 {
    font-size: 1.8rem;
    margin-bottom: 20px;
    text-align: center;
}

.contact-form input,
.contact-form textarea {
    width: 100%;
    padding: 12px;
    margin: 10px 0;
    border: 1px solid #ddd;
    border-radius: 8px;
    box-sizing: border-box;
    font-size: 1rem;
}

.contact-form input[type="text"],
.contact-form textarea {
    resize: vertical;
}

.contact-form button {
    width: 100%;
    padding: 12px;
    background-color: wheat;
    color: black;
    border: none;
    border-radius: 8px;
    font-size: 1.1rem;
    cursor: pointer;
}

.contact-form button:hover {
    background-color: #4cae4c;
}

/* Responsive adjustments */
@media screen and (max-width: 600px) {
    .contact-form {
        width: 90%;
    }
}
</style>
