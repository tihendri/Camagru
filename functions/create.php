<?php

function create_account() {
  //header('Location: ../index.php');
 // include_once '../config/database.php';
//   if (empty($_POST[login]) || empty($_POST[mail]) || empty($_POST[passwd]) || empty($_POST[passwd2])) {
//       header("Location: ../functions/create.php?err=Fill in empty spaces.\n");
//       exit();
//   }
//   try {
//       $dbh = new PDO($DB_DSN, $DB_USER, $DB_PASSWORD);
//       $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//       $sth = $dbh->prepare('SELECT COUNT(*) FROM users WHERE login = :login');
//       $sth->bindParam(':login', $_POST[login], PDO::PARAM_STR);
//       $sth->execute();
//   } catch (PDOException $e) {
//       echo 'Error: '.$e->getMessage();
//       exit;
//   }
//   if ($sth->fetchColumn()) {
//       header("Location: ../create.php?err=Login already exists.\n");
//       exit();
//   }
//   if ($_POST[passwd] != $_POST[passwd2]) {
//       header("Location: ../create.php?err=Passwords do not match.\n");
//       exit();
//   }
include "validation.php";
$firstname = $_POST['firstname'];
validate_firstname($firstname);
$lastname = $_POST['lastname'];
validate_lastname($lastname);
$username = $_POST['username'];
//validate_username($username); /////////////////////////////////////// For later
$email = $_POST['email'];
validate_email($email);
validate_password($_POST['passwd']);
  
  try {
    //  include '../backend/connect_to_db.php';
      $passwd = hash(SHA256, $_POST['passwd']);
    //   $hash = md5(rand(0, 1000));
    $conn = new PDO("mysql:host=localhost;dbname=camagru", "root", "root1004");
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//      $sth = $dbh->prepare('INSERT INTO users (login, mail, passwd, state) VALUES (:login, :mail, :passwd, :hash)');
        $sql = ("INSERT INTO camagruers (`firstname`, `lastname`, `email`, `username`, `password_`) values(:firstname, :lastname, :email, :username, :password_)");
        $data = $conn->prepare($sql);
        $data->execute(array(':firstname'=>$firstname, ':lastname'=>$lastname, ':email'=>$email, ':username'=>$username, ':password_'=>$passwd));
    //   $sth->bindParam(':login', $_POST[login], PDO::PARAM_STR);
    //   $sth->bindParam(':mail', $_POST[mail], PDO::PARAM_STR);
    //   $sth->bindParam(':passwd', $passwd, PDO::PARAM_STR);
    //   $sth->bindParam(':hash', $hash, PDO::PARAM_STR);
    //   $sth->execute();

    $to = $_POST['email'];
    $subject = "Camagru | Registration";
    $message = "
    Your account has successfully been created. Your credential is as follows:
    ------------------------
    Username: '$_POST[username]'
    ------------------------
    Click on the following link to activate your account
    http://localhost:8080/Camagru/verify.php?email=$_POST[mail]&hash=$hash
    ";
    $headers = "From:tihendri@student.wethinkcode.co.za"."\r\n";
    echo "<script>window.alert('Email sent.')</script>";
    mail($to, $subject, $message, $headers);
  } catch (PDOException $e) {
      echo 'Error: '.$e->getMessage();
      exit;
  }
  
  //header("Location: ../index.php?err=Your account was created. Please activate it with the link sent to your email.\n");
}