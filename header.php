<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="Description" content="Camagru is an Instagram-like web application.">
    <meta name="theme-color" content="#317EFB"/>
    <link rel="stylesheet" href="styles/styles.css">
</head>

<div class="wrapper">
    <header class="header">
        <a href="index.php" id="title"><h1>Camagru</h1></a>
        <ul class="navbar">
            <li><a href="index.php">Home</a></li>
            <!-- <li><a href="filters.php">Filters</a></li>    add something extra maybe... -->
            <li><a href="gallery.php">Gallery</a></li>
            <?php
                if (!isset($_SESSION['id'])) {
                    echo'<li><a href="login_now.php">Sign in</a></li>';
                    echo'<li><a href="create_account.php">Sign up</a></li>';
                }
            ?>
            <?php if ($_SESSION['id']): ?>
              <li><a href='profile.php'>My profile</a></li>
              <li><a href='index.php?session_status=logout'>Sign out</a></li>
            <?php endif; ?>
        </ul>
    </header>

</html>