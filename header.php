<?php
    session_start();
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="camagru.css">
</head>

<div class="wrapper">
    <header class="header">
        <a href="index.php" id="title"><h1>Camagru</h1></a>
        <ul class="navbar">
            <li><a href="index.php">Index</a></li>
            <li><a href="filters.php">Filters</a></li>
            <li><a href="gallery.php">Gallery</a></li>
            <?php if ($_SESSION[Username] && !empty($_SESSION[Username])): ?>
              <li><a href='functions/disconnect.php'>Sign out</a></li>
            <?php endif; ?>
        </ul>
    </header>

</html>