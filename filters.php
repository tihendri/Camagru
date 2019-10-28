<?php
    session_start();
    if ($_SESSION[Username] && !empty($_SESSION[Username])) {
        if (!$_GET[page]) {
            header('Location: Gallery.php?page=1');
        }
    } else {
        header('Location: index.php?err=You must login to access this page.');
    }
?>