
<?php
  if ($_GET[err]){echo "<script>alert(\"".htmlentities($_GET[err])."\");window.location.href = \"index.php\";</script>";}
  include_once "header.php";
  include_once "footer.php";
?>
<title>Camagru | Image</title>
  <!-- <article class="main"> -->
  <div class="main" style="text-align:center">
</div>


<?php

      include "functions/get_image.php";
      get_image($_GET['img']);
?>










<?php
    if (isset($_GET['session_status'])) {
      if ($_GET['session_status'] == "logout") {
        include "functions/disconnect.php";
        disconnect();
      }
    }
?>