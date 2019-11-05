<?php
  
function change_password($new_pass, $ver_key, $u_email) {
//   header('Location: ../index.php');
//   if (empty($_POST['login']) || empty($_POST['passwd']) || empty($_POST['passwd2']) || empty($_POST['email']) || empty($_POST['hash'])) {
//       header("Location: ../index.php?err=Error! Not connected to database.\n");
//       exit();
//   }
//   if ($_POST['passwd'] != $_POST['passwd2']) {
//       header("Location: ../index.php?err=Passwords do not match.\n");
//       exit();
//   }
//   try {
//       $dbh = new PDO($DB_DSN, $DB_USER, $DB_PASSWORD);
//       $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//       $sth = $dbh->prepare('SELECT COUNT(*) FROM users WHERE login = :login');
//       $sth->bindParam(':login', $_POST['login'], PDO::PARAM_STR);
//       $sth->execute();
//   } catch (PDOException $e) {
//       echo 'Error: '.$e->getMessage();
//       exit;
//   }
  
//   if (!$sth->fetchColumn()) {
//       header("Location: ../index.php?err=Account does not exist.\n");
//       exit();
//   }
//   $passwd = hash(SHA256, $_POST['passwd']);
//   try {
//       $sth = $dbh->prepare('SELECT COUNT(*) FROM users WHERE login = :login AND mail = :email AND forgot = :hash');
//       $sth->bindParam(':login', $_POST['login'], PDO::PARAM_STR);
//       $sth->bindParam(':hash', $_POST['hash'], PDO::PARAM_STR);
//       $sth->bindParam(':email', $_POST['email'], PDO::PARAM_STR);
//       $sth->execute();
//   } catch (PDOException $e) {
//       echo 'Error: '.$e->getMessage();
//       exit;
//   }
//   if ($sth->fetchColumn()) {
//       try {
//           $sth = $dbh->prepare("UPDATE users SET forgot = 'NULL', passwd = :passwd WHERE login = :login AND mail = :email AND forgot = :hash");
//           $sth->bindParam(':passwd', $passwd, PDO::PARAM_STR);
//           $sth->bindParam(':login', $_POST['login'], PDO::PARAM_STR);
//           $sth->bindParam(':hash', $_POST['hash'], PDO::PARAM_STR);
//           $sth->bindParam(':email', $_POST['email'], PDO::PARAM_STR);
//           $sth->execute();
//       } catch (PDOException $e) {
//           echo 'Error: '.$e->getMessage();
//           exit;
//       }
//       header("Location: ../index.php?err=Your password has been changed.\n");
//   } else {
//       header("Location: ../index.php?err=Error.\n");
//   }
try {
    $conn = new PDO("mysql:host=localhost;dbname=camagru", "root", "root1004");
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // include_once '../backend/connect_to_db.php';
    $get_data = $conn->prepare("SELECT * FROM camagruers WHERE email=:u_email");
    $get_data->execute(array(':u_email'=>$u_email));
    $u_data = $get_data->fetch();
    $new_vkey = hash('whirlpool', time().$email_to);
    if ($ver_key != $u_data['verkey']) {
        echo "<script>window.alert('Verification key does not match.')</script>";
        exit();
    }
    else {
        $update = $conn->prepare("UPDATE camagruers SET password_=:new_pass, verkey=:new_vkey WHERE email=:u_email");
        $update->execute(array(':new_pass'=>$new_pass, ':new_vkey'=>$new_vkey, ':u_email'=>$u_email));
        echo "<script>window.alert('Your password has be reset, you may now proceed to login with your new password.')</script>";
        echo "<script>window.open('login_now.php', '_self')</script>";

    }
}
catch(PDOException $e)
    {
    echo "Connection failed: " . $e->getMessage();
    }
}
?>