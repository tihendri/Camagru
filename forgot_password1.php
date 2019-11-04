<?php
  if ($_GET[err]) {
      echo '<script>alert("'.htmlentities($_GET[err]).'");window.location.href = "forgot_password1.php";</script>';
  }
  include_once 'header.php';
  include_once "footer.php";
?>
<title>Camagru | Change password</title>
  <article class="main">

    <form class="login" action="forgot_password1.php" method="post">
      <label><b>Email</b></label>
      <input class="form" type="text" placeholder="Enter Email" name="email" required autofocus="autofocus" tabindex="1">

      <button type="submit" name="submit" class="button" tabindex="4">Submit</button>
    </form>
    <?php
      if (isset($_POST['submit']))
      {
        include "functions/email_before.php";
        fp_email();
      }
    ?>
  </article>
</div>