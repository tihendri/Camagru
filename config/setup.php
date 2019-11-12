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
    id INT(100) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    firstname VARCHAR(30) NOT NULL,
    lastname VARCHAR(30) NOT NULL,
    username VARCHAR(30) NOT NULL,
    password_ VARCHAR(255) NOT NULL,
    email VARCHAR(50),
    verkey VARCHAR(255) DEFAULT (0) NOT NULL,
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    verified BIT default (0) NOT NULL
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
      img_id INT(100) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
      usr_id INT(100) NOT NULL,
      img_name LONGTEXT,
      date_created TIMESTAMP DEFAULT CURRENT_TIMESTAMP)";
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
		`cmnt_id` INT(100) AUTO_INCREMENT PRIMARY KEY,
		`cmnt_img_id` INT(100) NOT NULL REFERENCES images(img_id),
		`cmnt_usr_id` INT(100) NOT NULL REFERENCES users(user_id),
		`comment` TEXT(255) NOT NULL)";
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
    $sql = "CREATE TABLE IF NOT EXISTS likes(
		`like_id` INT(100) AUTO_INCREMENT PRIMARY KEY,
		`like_img_id` INT(100) NOT NULL REFERENCES pictures(img_id),
		`like_usr_id` INT(100) NOT NULL REFERENCES camagruers(user_id))";
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