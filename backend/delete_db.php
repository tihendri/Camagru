#!/usr/bin/php
<?php
include 'database.php';
// DELETE DATABASE
try {
        $dbh = new PDO($DB_DSN_LIGHT, $DB_USER, $DB_PASSWORD);
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "DROP DATABASE `".$DB_NAME."`";
        $dbh->exec($sql);
        echo "Database deleted successfully\n";
    } catch (PDOException $e) {
        echo "ERROR DELETING DB: \n".$e->getMessage()."\n";
    }
?>