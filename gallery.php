<?php
    include "header.php";
    include "footer";
?>

<div class="main" style="text-align:center">
<?php
    include "functions/img_display.php";
    img_display_user();
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