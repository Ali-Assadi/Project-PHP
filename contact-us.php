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
    <title>Contact Us</title>
<style>
/* Body Scrollbar Styling */
body {
  background: linear-gradient(-135deg, rgb(104, 93, 61), wheat);
  margin-left: 50px;
  margin-top: 10px;
  overflow-y: scroll; /* Ensure scroll is visible when content exceeds */
}

body::-webkit-scrollbar {
  width: 12px; /* Scrollbar width */
}

body::-webkit-scrollbar-track {
  background: rgba(104, 93, 61, 0.2); /* Track background */
  border-radius: 10px;
}

body::-webkit-scrollbar-thumb {
  background: rgb(104, 93, 61); /* Thumb color */
  border-radius: 10px;
  border: 2px solid rgba(255, 255, 255, 0.6); /* Space around thumb */
}

body::-webkit-scrollbar-thumb:hover {
  background: rgb(63, 58, 42); /* Darker thumb on hover */
}

/* Contact Form Scrollbar Styling */
.contact-form {
  position: relative;
  right: 34%;
  background: linear-gradient(-135deg, rgb(104, 93, 61), wheat);
  border: 1px solid #ddd;
  padding: 20px;
  margin: 30px auto;
  border-radius: 10px;
  box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.2);
  max-width: 450px;
  overflow-y: auto; /* Enable scrolling if content exceeds form box */
  max-height: 500px; /* Set a max height for the form box */
}

.contact-form::-webkit-scrollbar {
  width: 10px; /* Scrollbar width for form */
}

.contact-form::-webkit-scrollbar-track {
  background: rgba(104, 93, 61, 0.1); /* Track background */
  border-radius: 10px;
}

.contact-form::-webkit-scrollbar-thumb {
  background: rgb(63, 58, 42); /* Thumb color for contact form */
  border-radius: 10px;
}

.contact-form::-webkit-scrollbar-thumb:hover {
  background: rgb(104, 93, 61); /* Darker thumb on hover */
}

/* Smooth scrolling behavior */
html {
  scroll-behavior: smooth; /* Smooth scroll effect */
}

/* Custom Scrollbars for All Browsers */
* {
  scrollbar-width: thin; /* Firefox */
  scrollbar-color: rgb(104, 93, 61) rgba(104, 93, 61, 0.2); /* Firefox */
}

/* Base styles */
body {
  background: linear-gradient(-135deg, rgb(104, 93, 61), wheat);
  margin-left: 50px;
  margin-top: 10px;
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

/* Contact Form Styling */
.contact-form {
  position: relative;
  right: 34%;
  background: linear-gradient(-135deg, rgb(104, 93, 61), wheat);
  border: 1px solid #ddd;
  padding: 20px;
  margin: 30px auto;
  border-radius: 10px;
  box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.2);
  max-width: 450px;
}

.contact-form h2 {
  text-align: center;
  color: rgb(63, 58, 42);
  margin-bottom: 20px;
}

.contact-form input,
.contact-form textarea {
  width: 95%;
  padding: 10px;
  margin-bottom: 15px;
  border: none;
  border-radius: 5px;
  background: rgba(212, 212, 212, 0.9);
  box-shadow: inset 0px 2px 4px rgba(0, 0, 0, 0.1);
  font-size: 1rem;
}

.contact-form input:focus,
.contact-form textarea:focus {
  outline: none;
  border: 2px solid rgb(104, 93, 61);
  box-shadow: 0px 0px 5px rgb(104, 93, 61);
}

.contact-form textarea {
  resize: vertical;
  min-height: 100px;
}

.submit-btn {
  width: 100%;
  padding: 10px;
  background: rgb(63, 58, 42);
  color: wheat;
  font-size: 1rem;
  font-weight: bold;
  text-transform: uppercase;
  border: none;
  border-radius: 5px;
  cursor: pointer;
  transition: background 0.3s ease, transform 0.3s ease;
}

.submit-btn:hover {
  background: rgb(104, 93, 61);
  transform: scale(1.05);
}

/* Responsive Design */
@media screen and (max-width: 540px) {
  img {
    display: none;
  }

  .contact-form {
    width: 90%;
  }
}


</style>
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
