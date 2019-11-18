<?php
    include "header.php";
    include "footer";
?>

<div class="main" style="text-align:center">
<?php
    if (isset($_SESSION['id'])) {
      include "functions/img_display.php";
      img_display_user();
    }
    else {
      echo "<script>alert('Please Log In or Register to access your gallery!')</script>";
      echo"<script>window.location.replace('index.php')</script>";
    }
?>
</div>
<?php
    if (isset($_GET['session_status'])) {
      if ($_GET['session_status'] == "logout") {
        include "functions/disconnect.php";
        disconnect();
      }
    }
?>