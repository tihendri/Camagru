<?php
  if ($_GET[err]) {
      echo '<script>alert("'.htmlentities($_GET[err]).'");window.location.href = "forgot_password2.php";</script>';
  }
  include_once 'header.php';
  include_once "footer.php";
?>
<title>Camagru | Change password</title>
  <article class="main">

    <form class="login" action="" method="post">

      <label><b>Email</b></label>
      <input class="form" type="text" placeholder="Enter Email" name="email" required tabindex="1">

      <label><b>New Password</b></label>
      <input class="form" type="password" placeholder="Enter Password" name="new_pass" required tabindex="2">

      <!-- <label><b>Retype New Password</b></label>
      <input class="form" type="password" placeholder="Enter Password" name="new_pass" required tabindex="3"> -->

      <button type="submit" name="change_pass" class="button" tabindex="4">Change your password</button>
    </form>
    <?php
      if (isset($_POST['change_pass']))
      {
        include "functions/change_password.php";
        $ver_key = $_GET['ver_key'];
        $u_email = $_POST['email'];
        $new_pass = hash('whirlpool', $_POST['new_pass']);
        change_password($new_pass, $ver_key, $u_email);
        echo"<h2>".$ver_key."</h2><br/>";
      }
    ?>
  </article>
</div>