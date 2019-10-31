<?php
function log_in() {
//   header('Location: ../index.php');
//   include_once '../config/database.php';
//   if (empty($_POST[login]) || empty($_POST[passwd])) {
//       header("Location: ../index.php?err=You must create an account first!.\n");
//       exit();
//   }
//   try {
//       $dbh = new PDO($DB_DSN, $DB_USER, $DB_PASSWORD);
//       $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//       $sth = $dbh->prepare('SELECT COUNT(*) FROM users WHERE login = :login');
//       $sth->bindParam(':login', $_POST[login], PDO::PARAM_STR);
//       $sth->execute();
//   } catch (PDOException $e) {
//       echo $sql.'<br>'.$e->getMessage();
//   }
//   if ($camagruer = $sth->fetchColumn()) {
//       try {
//           $passwd = hash(SHA256, $_POST[passwd]);
//           $sth = $dbh->prepare('SELECT COUNT(*) FROM users WHERE passwd = :passwd AND login = :login');
//           $sth->bindParam(':login', $_POST[login], PDO::PARAM_STR);
//           $sth->bindParam(':passwd', $passwd, PDO::PARAM_STR);
//           $sth->execute();
//       } catch (PDOException $e) {
//           echo $sql.'<br>'.$e->getMessage();
//       }
//       if ($sth->fetchColumn()) {
//           try {
//               $sth = $dbh->prepare("SELECT COUNT(*) FROM users WHERE passwd = :passwd AND login = :login AND state = 'active'");
//               $sth->bindParam(':login', $_POST[login], PDO::PARAM_STR);
//               $sth->bindParam(':passwd', $passwd, PDO::PARAM_STR);
//               $sth->execute();
//           } catch (PDOException $e) {
//               echo $sql.'<br>'.$e->getMessage();
//           }
//           if ($sth->fetchColumn()) {
//               $_SESSION[Username] = $_POST[login];
//               exit();
//           } else {
//               header("Location: ../index.php?err=Activate your account.\n");
//           }
//       } else {
//           header("Location: ../index.php?err=Invalid password.\n");
//           exit();
//       }
//   } else {
//       header("Location: ../index.php?err=Account does not exist.\n");
//       exit();
//   }

try {
    //  include '../backend/connect_to_db.php';
    $username = $_POST['username'];
    $passwd = hash(SHA256, $_POST['passwd']);
   // echo $username." ".$passwd;
    //   $hash = md5(rand(0, 1000));
    $conn = new PDO("mysql:host=localhost;dbname=camagru", "root", "root1004");
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//      $sth = $dbh->prepare('INSERT INTO users (login, mail, passwd, state) VALUES (:login, :mail, :passwd, :hash)');
        $sql = $conn->prepare("SELECT * FROM camagruers WHERE username = :username");
        $sql->execute(['username' => $username]);
        $data = $sql->fetch();
        
        if (empty($data) || $username != $data['username'] || $passwd != $data['password_'])
        {
            echo"<script>window.alert('Username or Password invalid!')</script>";
        }
        
        if ($username == $data['username'] && $passwd == $data['password_'])
        {
           // echo $username." ".$passwd;
       // echo $data['username']." ".$data['password_'];
            $_SESSION['email'] = $data['email'];
            $_SESSION['id'] = $data['id'];
            $_SESSION['username'] = $data['username'];
            echo"<script>window.alert('You are now logged in!')</script>";
        }
    }
    catch (PDOException $e) {
        echo $sql.'<br>'.$e->getMessage();
    }
    $conn = NULL;
    //   $data->execute(array(':firstname'=>$firstname, ':lastname'=>$lastname, ':email'=>$email, ':username'=>$username, ':password_'=>$passwd));
    //   $sth->bindParam(':login', $_POST[login], PDO::PARAM_STR);
    //   $sth->bindParam(':mail', $_POST[mail], PDO::PARAM_STR);
    //   $sth->bindParam(':passwd', $passwd, PDO::PARAM_STR);
    //   $sth->bindParam(':hash', $hash, PDO::PARAM_STR);
    //   $sth->execute();
}
?>