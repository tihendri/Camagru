<?php
include '../config/database.php';
// DELETE DATABASE
try {
        $conn = new PDO($DB_DSN, $DB_USER, $DB_PASSWORD);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "DROP DATABASE `".$DB_NAME."`";
        $conn->exec($sql);
        echo "Database deleted successfully\n";
    } catch (PDOException $e) {
        echo "ERROR DELETING DB: \n".$e->getMessage()."\n";
    }
?>