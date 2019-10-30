
<?php
  if ($_GET[err]){echo "<script>alert(\"".htmlentities($_GET[err])."\");window.location.href = \"index.php\";</script>";}
  include_once "header.php";
?>
<title>Camagru - Home</title>
  <article class="main">
    <p>Welcome to Camagru!</p>
  </article>
  <aside class="aside">
    <?php
    session_start();
    if ($_SESSION[Username] && !empty($_SESSION[Username])):
    ?>
      <form class='login' action='functions/disconnect.php' method='post'>
        <h3><?=$_SESSION[Username];?></h3><br/>
        <button type='submit' class='button'>Sign out</button>
      </form>
    <?php else: ?>
      <form class="login" action="functions/login.php" method="post">
        <label><b>Username</b></label>
        <input class="form" type="text" placeholder="Enter Username" name="login" required autofocus="autofocus" tabindex="1">

        <label><b>Password</b></label>
        <input class="form" type="password" placeholder="Enter Password" name="passwd" required tabindex="2">

        <button type="submit" class="button" tabindex="4">Sign in</button>
        <a href="forgot_password.php" id="mdp_forgot">Forgot your password</a>
        <br/>
        <br/>
        <br/>
        <div class="strike"><span>New?</span></div>
        <button class="button" id="button_new" tabindex="5"><a href="create_account.php">Create your account</a></button>
      </form>
    <?php endif; ?>
  </aside>
</div>