<?php
    include "header.php";
    include "footer";
    include "functions/img_display.php";
    img_display();
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