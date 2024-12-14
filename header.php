<?php
$imagesPath = "photos/index_images/";
?>

<header class="header" style="background: linear-gradient(-135deg, rgb(63, 63, 63), rgb(182, 165, 132));">
    <a href="signin.php" target="main">
        <img src="<?= $imagesPath ?>login.png" id="usericon" style="height:50px; width:50px; margin-right: 20px;"/>
    </a>
    <a href="sign_Up.php" target="main">
        <img src="<?= $imagesPath ?>signup.png" id="usericon" style="height:50px; width:50px; position: relative; right:150px"/>
    </a>
    <img src="<?= $imagesPath ?>navBarBackground.png" id="left" style="max-width:250px; max-height:250px;"/>
    <img src="photos/logo_Images/Logo99.png" id="logo" />
    <img src="<?= $imagesPath ?>navBarBackground.png" id="right" style="max-width:250px; max-height:250px; margin-right: 310px;"/>
</header>
