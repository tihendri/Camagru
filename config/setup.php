<?php
  include_once 'database.php';
try {
// Create database
    $conn = new PDO("mysql:host=$DB_DSN", $DB_USER, $DB_PASSWORD);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "CREATE DATABASE IF NOT EXISTS Camagru";
    // use exec() because no results are returned
    $conn->exec($sql);
    echo "Database created successfully<br>";
}   catch(PDOException $e) {
        echo $sql . "<br>" . $e->getMessage();
    }
    $conn = null;
    

try {
// Create the table for the users named Camagruers.
    $conn = new PDO("mysql:host=$DB_DSN;dbname=$DB_NAME", $DB_USER, $DB_PASSWORD);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // sql to create table
    $sql = "CREATE TABLE IF NOT EXISTS Camagruers   (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    firstname VARCHAR(30) NOT NULL,
    lastname VARCHAR(30) NOT NULL,
    username VARCHAR(30) NOT NULL,
    password_ VARCHAR(255) NOT NULL,
    email VARCHAR(50),
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    )";
    // use exec() because no results are returned
    $conn->exec($sql);
    echo "Table 'camagruers' created successfully<br>";
}   catch(PDOException $e) {
      echo $sql . "<br>" . $e->getMessage();
    }
    $conn = null;
    
    
try {
// Create the table for the pictures
    $conn = new PDO("mysql:host=$DB_DSN;dbname=$DB_NAME", $DB_USER, $DB_PASSWORD);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      // sql to create table
    $sql = "CREATE TABLE IF NOT EXISTS Pictures (
      id INT(9) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
      login_ VARCHAR(255) NOT NULL,
      img VARCHAR(255) NOT NULL)";
    $conn->exec($sql);
    echo "Table 'pictures' created successfully.<br>";
}   catch(PDOException $e) {
        echo $sql . "<br>" . $e->getMessage();
    }
    $conn = NULL;


try {
// Create the table for the comments
    $conn = new PDO("mysql:host=$DB_DSN;dbname=$DB_NAME", $DB_USER, $DB_PASSWORD);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // sql to create table
    $sql = "CREATE TABLE IF NOT EXISTS Comments (
      id INT(9) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
      login_ VARCHAR(255) NOT NULL,
      img_id VARCHAR(255) NOT NULL,
      comment VARCHAR (255) NOT NULL)";
    $conn->exec($sql);
    echo "Table 'comments' created successfully.<br>";
}   catch(PDOException $e) {
        echo $sql . "<br>" . $e->getMessage();
    }
    $conn = NULL;
    
    
try {
// Create the table for the likes
    $conn = new PDO("mysql:host=$DB_DSN;dbname=$DB_NAME", $DB_USER, $DB_PASSWORD);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // sql to create table
    $sql = "CREATE TABLE Likes  (
      id INT(9) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
      login_ VARCHAR(255) NOT NULL,
      img_id VARCHAR(255) NOT NULL)";
    $conn->exec($sql);
    echo "Table 'likes' created successfully.<br>";
    $conn = NULL;
}
catch(PDOException $e) {
    echo $sql . "<br>" . $e->getMessage();
}

?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Camagru - Setup</title>
  </head>
  <body>
    <form action="../" class="inline">
        <button autofocus="autofocus" tabindex="1">To Camagru Main Site</button>
    </form>
  </body>
</html>