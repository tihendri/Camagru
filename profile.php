<?php
  if ($_GET[err]){echo "<script>alert(\"".htmlentities($_GET[err])."\");window.location.href = \"profile.php\";</script>";}
  include_once "header.php";
  include_once "footer.php";
?>
<title>Camagru | Profile</title>
<h2>My Profile</h2>
  <article class="main">
    <p></p>
  </article>
  <aside class="aside">
    
  </aside>
<form action="" method="POST" enctype="multipart/form-data">
  <input type="file" name="upl_img">
  <button type="submit" name="upload">Upload</button>
</form>
<?php
if (isset($_POST['upload'])) {
  if (isset($_FILES['upl_img']['name'])) {
    include "functions/upload_img.php";
    echo"<script>window.alert('Your image has been successfully uploaded.')</script>";
    upload_img($_SESSION['id']);
  }
}
?>