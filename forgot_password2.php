<?php
  if ($_GET[err]) {
      echo '<script>alert("'.htmlentities($_GET[err]).'");window.location.href = "forgot_password2.php";</script>';
  }
  include_once 'header.php';
  include_once "footer.php";
?>
<title>Camagru | Change password</title>
  <article class="main">

    <form class="login" action="forgot_password2.php" method="post">

      <label><b>New Password</b></label>
      <input class="form" type="password" placeholder="Enter Password" name="passwd" required tabindex="2">

      <label><b>Retype New Password</b></label>
      <input class="form" type="password" placeholder="Enter Password" name="passwd2" required tabindex="3">
      <?php if ($_GET['hash'] && $_GET['email']): ?>
        <input type='hidden' name='email' value='<?=$_GET['email']?>'>
        <input type='hidden' name='hash' value='<?=$_GET['hash']?>'>
      <?php endif; ?>
      <button type="submit" class="button" tabindex="4">Change your password</button>
    </form>
    <?php
      if (isset($_POST['login']))
      {
        include "functions/forgot_passwd.php";
        log_in();
        // include "functions/change_password.php";
        // change_password();
      }
    ?>
  </article>
</div>