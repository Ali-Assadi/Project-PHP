<?php
$imagesPath = "photos/index_images/";
?>

<header class="header" style="background: linear-gradient(-135deg, rgb(63, 63, 63), rgb(182, 165, 132));">
    <a href="signin.php" target="main">
        <img src="<?= $imagesPath ?>login.png" id="usericon" style="height:50px weight:50px"/>
    </a>
    <a href="sign_Up.php" target="main">
        <img src="<?= $imagesPath ?>signup.png" id="usericon"/>
    </a>
    <img src="<?= $imagesPath ?>navBarBackground.png" id="left" />
    <img src="photos/logo_Images/Logo99.png" id="logo" />
    <img src="<?= $imagesPath ?>navBarBackground.png" id="right" />
</header>
