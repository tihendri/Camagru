<?php
    function disconnect() {
      if ($_GET['session_status'] == "logout") {
        session_destroy();
        echo"<script>window.open('index.php', '_self')</script>";
      }
    }
?>