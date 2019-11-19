<?php
  // if ($_GET[err]){echo "<script>alert(\"".htmlentities($_GET[err])."\");window.location.href = \"profile.php\";</script>";}
  include_once "header.php";
  include_once "footer.php";
?>
<title>Camagru | Profile</title>
<h2>My Profile</h2>

<ul class="profile_list">
            <li><a href="upload_image.php">Upload Image</a></li><br /><br />
            <!-- <li><a href="edit_account.php">Edit Account</a></li><br /><br /> -->
            <!-- <li>Username:  <?php // echo $_SESSION['username'] ?></li><br /><br />
            <li>Email address:  <?php // echo $_SESSION['email'] ?></li><br /><br /> -->
</ul>
<section>
  <div>
<?php
    if (isset($_SESSION['id'])) {
      include_once "edit_account.php";
    }
    if (isset($_POST['updt_name'])) {
      include "functions/update_user.php";
      update_user($_SESSION['id']);
    }
    else if (isset($_POST['updt_email'])) {
      include "functions/update_user.php";
      update_user($_SESSION['id']);
    }
    else if (isset($_POST['updt_passwd'])) {
      include "functions/update_user.php";
      update_user($_SESSION['id']);
    }
    else if (isset($_POST['updt_notif'])) {
      include "functions/update_user.php";
      update_user($_SESSION['id']);
    }  
?>

</div>
<div class="main" style="text-align:center">
<?php
include "functions/img_display.php";
      img_display_user();
?>

<?php
    if (isset($_GET['session_status'])) {
      if ($_GET['session_status'] == "logout") {
        include "functions/disconnect.php";
        disconnect();
      }
    }
?>
</div>