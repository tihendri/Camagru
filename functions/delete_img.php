<?php
//   header("Location: ../gallery.php?page=$_GET[page]");
//   session_start();
  include_once '../config/database.php';
  try {
      $dbh = new PDO("mysql:host=localhost;dbname=camagru", "root", "root1004");
      $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $sth = $dbh->prepare("DELETE FROM pictures WHERE usr_id = :u_id AND img_id = :img");
      $sth->bindParam(':login', $_SESSION['id'], PDO::PARAM_STR);
      $sth->bindParam(':img', $_GET['img'], PDO::PARAM_INT);
      $sth->execute();
  } catch (PDOException $e) {
      echo $sql.'<br>'.$e->getMessage();
  }