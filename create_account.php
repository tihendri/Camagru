<?php
  if ($_GET[err]){echo "<script>alert(\"".htmlentities($_GET[err])."\");window.location.href = \"create_account.php\";</script>";}
  include_once 'header.php';
  include_once "footer.php";
  session_start();
?>
<title>Camagru | Create an account</title>
  <article class="main">

    <form class="login" action="create_account.php" method="post">
    <label><b>Firstname</b></label>
      <input class="form" type="text" placeholder="Enter Firstname" name="firstname" required autofocus="autofocus" tabindex="1">

      <label><b>Lastname</b></label>
      <input class="form" type="text" placeholder="Enter Lastname" name="lastname" required autofocus="autofocus" tabindex="2">

      <label><b>Username</b></label>
      <input class="form" type="text" placeholder="Enter Username" name="username" required autofocus="autofocus" tabindex="3">

      <label><b>Email address</b></label>
      <input class="form" type="email" placeholder="Enter Email" name="email" required tabindex="4">

      <label><b>Password</b></label>
      <input class="form" type="password" placeholder="Enter Password" name="passwd" required tabindex="5">

      <label><b>Retype your password</b></label>
      <input class="form" type="password" placeholder="Enter Password" name="passwd2" required tabindex="6">

      <button type="submit" name="create_account" class="button" tabindex="7">Create Account</button>
    </form>
    <?php
    if (isset($_POST['create_account'])){
        include 'functions/create.php';
        create_account();
    }
    ?>
  </article>
</div>