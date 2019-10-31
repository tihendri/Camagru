<?php
include_once 'header.php';
    session_start();
    if ($_SESSION['Username'] && !empty($_SESSION['Username'])):
    ?>
      <form class='login' action='functions/disconnect.php' method='post'>
        <h3><?=$_SESSION['Username'];?></h3><br/>
        <button type='submit' class='button'>Sign out</button>
      </form>
    <?php else: ?>
      <form class="login" action="index.php" method="post">
        <label><b>Username</b></label>
        <input class="form" type="text" placeholder="Enter Username" name="username" required autofocus="autofocus" tabindex="1">

        <label><b>Password</b></label>
        <input class="form" type="password" placeholder="Enter Password" name="passwd" required tabindex="2">

        <button type="submit" class="button" name="login" tabindex="4">Sign in</button>
        <a href="forgot_password.php" id="mdp_forgot">Forgot your password</a>
        <br/>
        <br/>
        <br/>
        <div class="strike"><span>New?</span></div>
        <button class="button" id="button_new" tabindex="5"><a href="create_account.php">Create your account</a></button>
      </form>
    <?php endif;
    if (isset($_POST['login']))
    {
          include "functions/login.php";
          log_in();
    }
?>