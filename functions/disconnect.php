<?php
    function disconnect() {
      if ($_GET['session_status'] == "logout") {
        session_destroy();
        echo"<script>window.open('index.php', '_self')</script>";
      }
    }
  // session_start();
  // header("Location: ../index.php");
  // $_SESSION['username'] = "";
?>