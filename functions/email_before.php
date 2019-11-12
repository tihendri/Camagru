<?php

function fp_email() {

  
  // include "validation.php";  
  try {
    include "connect_to_db.php";
    $email_to = $_POST['email'];
    // validate_email($email_to);
    $get_data = $conn->prepare("SELECT * FROM camagruers WHERE email=?");
    $get_data->execute([$email_to]);
    $data = $get_data->fetch();
    $ver_key = hash('whirlpool', time().$email_to);
    $update = $conn->prepare('UPDATE camagruers SET verkey=:ver_key WHERE email=:email_to');
    $update->execute(array(':ver_key'=>$ver_key, ':email_to'=>$data['email']));
    $subject = "Camagru | Change Password";
    $message = "
    You have requested to change or renew your password. Your credential is as follows:
    ------------------------
    Username: '$data[username]'
    ------------------------
    (If this is not your username, please forgive this misunderstanding and delete this email, thanks.)
    Click on the following link to renew your password
    http://localhost:8080/camagru/forgot_password2.php?ver_key=".$ver_key;
    // $headers = "From:tihendri@student.wethinkcode.co.za"."\r\n";
    echo "<script>window.alert('Check your email for a link to change your password.')</script>";
    mail($email_to, $subject, $message, " ");
  } catch (PDOException $e) {
      echo 'Error: '.$e->getMessage();
      exit;
  }
}