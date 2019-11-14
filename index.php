
<?php
  if ($_GET[err]){echo "<script>alert(\"".htmlentities($_GET[err])."\");window.location.href = \"index.php\";</script>";}
  include_once "header.php";
  include_once "footer.php";
?>
<title>Camagru - Home</title>
  <!-- <article class="main"> -->
  <div class="main" style="text-align:center">
  <?php
    // if (!isset($_SESSION['id'])) {
      echo '<h1 style="text-align:center">Welcome To Camagru</h1>';
    // }
    // else {
      include "functions/img_display.php";
      img_display();
      // }
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
  <!-- </article>
  <aside class="aside">
    
  </aside> -->