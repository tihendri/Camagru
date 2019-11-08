<?php
  if ($_GET[err]){echo "<script>alert(\"".htmlentities($_GET[err])."\");window.location.href = \"profile.php\";</script>";}
  include_once "header.php";
  include_once "footer.php";
?>
<title>Camagru | Profile</title>
<h2>My Profile</h2>

<ul class="profile_list">
            <li><a href="upload_image.php">Upload Image</a></li>
            <li><a href="edit_account.php">Edit Account</a></li>
            <li>Username:  <?php echo $_SESSION['username'] ?></li>
            <li>Email address:  <?php echo $_SESSION['email'] ?></li>
</ul>

  <!-- <article class="main">
    <p></p>
  </article>
  <aside class="aside">
    
  </aside>

<form action="" method="POST" enctype="multipart/form-data">
  <input type="file" name="upl_img">
  <button type="submit" name="upload">Upload</button>
</form>
?> -->
