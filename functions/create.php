<?php
function create_account() {
  include "validation.php";
  $firstname = $_POST['firstname'];
  validate_firstname($firstname);
  $lastname = $_POST['lastname'];
  validate_lastname($lastname);
  $username = $_POST['username'];
  //validate_username($username); /////////////////////////////////////// For later, maybe...
  $email = $_POST['email'];
  validate_email($email);
  validate_password($_POST['passwd']);
  $ver_key = hash('whirlpool', $username.$_POST['passwd']);
  try {
      include 'connect_to_db.php';
      $passwd = hash('whirlpool', $_POST['passwd']);
      $sql = ("INSERT INTO camagruers (`firstname`, `lastname`, `email`, `username`, `password_`, `verkey`) values(:firstname, :lastname, :email, :username, :password_, :verkey)");
      $data = $conn->prepare($sql);
      $data->execute(array(':firstname'=>$firstname, ':lastname'=>$lastname, ':email'=>$email, ':username'=>$username, ':password_'=>$passwd, ':verkey'=>$ver_key));

      $to = $_POST['email'];
      $subject = "Camagru | Registration";
      $message = "
      Your account has successfully been created. Your credential is as follows:
      ------------------------
      Username: '$_POST[username]'
      ------------------------
      Click on the following link to activate your account
      http://localhost:8080/camagru/verified.php?key=".$ver_key;
      $headers = "From:tihendri@student.wethinkcode.co.za"."\r\n";
      echo "<script>window.alert('A verification email has been sent to your email address. Please click on the link to verify your account.')</script>";
      mail($to, $subject, $message, "");
  } catch (PDOException $e) {
      echo 'Error: '.$e->getMessage();
      exit;
  }
}