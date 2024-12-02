<?php
// Handle form submission if needed
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    // Perform any necessary form handling here
    // Example: processing the form data
    // $username = $_GET['username'];
    // $password = $_GET['password'];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="css_files/sign_in.css" />
    <script>
        function sign(form) {
            var passed = false;

            // Check if the username contains only letters
            if (!/^[a-zA-Z]+$/.test(form.username.value)) {
                alert("Invalid username. Please enter a correct name.");
            }
            // Check if the password contains both letters and numbers
            else if (!/(?=.*[a-zA-Z])(?=.*\d)/.test(form.password.value)) {
                alert("Invalid password. Please enter a valid password (must contain both letters and numbers).");
            } else {
                passed = true;
            }

            return passed;
        }

        document.addEventListener("DOMContentLoaded", function () {
            var colorSelector = document.getElementById("colorSelector");

            colorSelector.addEventListener("change", function () {
                var container = document.getElementById("container");
                var color = this.value === "Dark" ? "gray" : "white";
                var labelColor = this.value === "Dark" ? "gray" : "white";
                container.style.background = color;
                document.getElementById("label").style.background = labelColor;
            });
        });
    </script>
    <title>Sign In</title>
</head>
<body>
    <div class="container" id="container">
        <h2 style="color: black">Sign In</h2>
        <label id="label" style="margin-left: 15px">Choose Page Color:</label>
        <select
            title="Color Page"
            id="colorSelector"
            style="background: linear-gradient(-135deg, wheat, gray); color: black"
        >
            <option value="White">Morning Mode</option>
            <option value="Dark">Night Mode</option>
        </select>
        <p style="color: black; margin-left: 15px">For Returning Users : - )</p>

        <form
            action=" <?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>"
            method="get"
            onsubmit="return sign(this)"
        >
            <input
                type="text"
                id="username"
                name="username"
                required
                placeholder="Username"
            />
            <input
                type="password"
                id="password"
                name="password"
                required
                placeholder="Password"
            />
            <input type="submit" value="Sign In" />
        </form>
    </div>
</body>
</html>
