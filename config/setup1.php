<?php
  include_once 'database.php';
try {
    //Create database
    $conn = new PDO("mysql:host=$DB_DSN", $DB_USER, $DB_PASSWORD);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "CREATE DATABASE Camagru";
    // use exec() because no results are returned
    $conn->exec($sql);
    echo "Database created successfully<br>";
}
catch(PDOException $e) {
    echo $sql . "<br>" . $e->getMessage();
    }

$conn = null;
    
    // Create the table for the users
    $dbh->exec("CREATE TABLE IF NOT EXISTS users (
      id INT(9) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
      login_ VARCHAR(255) NOT NULL,
      mail VARCHAR(255) NOT NULL,
      passwd VARCHAR(255) NOT NULL,
      state_ VARCHAR(255) NOT NULL,
      forgot VARCHAR(255) DEFAULT 'NULL')");
      echo "Table 'users' created successfully.<br>";
    
      // Create the table for the pictures
    $dbh->exec("CREATE TABLE IF NOT EXISTS pictures  (
      id INT(9) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
      login_ VARCHAR(255) NOT NULL,
      img VARCHAR(255) NOT NULL)");
    echo "Table 'pictures' created successfully.<br>";
    
    // Create the table for the comments
    $dbh->exec("CREATE TABLE IF NOT EXISTS comments  (
      id INT(9) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
      login_ VARCHAR(255) NOT NULL,
      img_id VARCHAR(255) NOT NULL,
      comment VARCHAR (255) NOT NULL)");
    echo "Table 'comments' created successfully.<br>";
    
    // Create the table for the likes
    $dbh->exec("CREATE TABLE IF NOT EXISTS likes  (
      id INT(9) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
      login_ VARCHAR(255) NOT NULL,
      img_id VARCHAR(255) NOT NULL)");
    echo "Table 'likes' created successfully.<br>";
  
    $dbh = null;
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Camagru - Setup</title>
  </head>
  <body>
    <form action="../" class="inline">
        <button autofocus="autofocus" tabindex="1">Home</button>
    </form>
  </body>
</html>