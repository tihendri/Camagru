<?php



////////////////////////////////////////Not using this function///////////////////////////////////////////////////




function forgot_passwd() {
  // header('Location: ../index.php');
  include_once '../config/database.php'; 
//   if (empty($_POST[login])) {
//       header("Location: ../forgot_pass.php?err=Please fill in all the spaces.\n");
//      exit();
//   }
  // try {
  //     $dbh = new PDO($DB_DSN, $DB_USER, $DB_PASSWORD);
  //     $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  //     $sth = $dbh->prepare('SELECT COUNT(*) FROM users WHERE login = :login');
  //     $sth->bindParam(':login', $_POST[login], PDO::PARAM_STR);
  //     $sth->execute();
  // } catch (PDOException $e) {
  //     echo 'Error: '.$e->getMessage();
  //     exit;
  // }
  // if (!($result = $sth->fetchColumn())) {
  //     header("Location: ../forgot_username.php?err=The account does not exist.\n");
  //     exit();
  // $hash = md5(rand(0, 1000));
  try {
      // $sth = $dbh->prepare("UPDATE users SET forgot = '$hash' WHERE login = :login");
      // $sth->bindParam(':login', $_POST[login], PDO::PARAM_STR);
      // $sth->execute();
      // $sth = $dbh->prepare('SELECT mail FROM users WHERE login = :login');
      // $sth->bindParam(':login', $_POST[login], PDO::PARAM_STR);
      // $sth->execute();
  
    $email = $_POST['email'];
//   $user = $sth->fetch();
//   $to = $user[mail];
  $subject = 'Camagru | Forgot your password';
  $message = "
  ------------------------
  Username: '$_POST[username]'
  ------------------------
  Click on the following link to reactivate your account with a new password.
  http://localhost:8080/Camagru/forgot_password2.php?email=$email&hash=$hash
  ";
  $headers = 'From:tihendri@student.wethinkcode.co.za'."\r\n";
  mail($email, $subject, $message, $headers);
  echo "<script>window.alert('To change your password click on the link sent to your email.\n')</script>";
//   header("Location: ../index.php?err=To change your password click on the link sent to your email.\n");
  } catch (PDOException $e) {
        echo 'Error: '.$e->getMessage();
        exit;
    }
}
?>