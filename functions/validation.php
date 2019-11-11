<?php
    function validate_firstname($name) {
        if (!preg_match("/^[a-zA-Z ]*$/", $name)) {
            echo "<script>window.alert('Firstname may only contain lowercase and uppercase letters.')</script>";
            exit();
        }
    }
    function validate_lastname($lastname) {
        if (!preg_match("/^[a-zA-Z ]*$/", $lastname)) {
            echo "<script>window.alert('Lastname may only contain lowercase and uppercase letters.')</script>";
            exit();
        }
    }
    function validate_email($email) {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            echo "<script>window.alert('Email is not valid.')</script>";
            exit();
        }
    }
    function validate_password($passwd) {
        if (!preg_match('/^(?=.*\d)(?=.*[a-zA-Z])[0-9a-zA-Z!@#$%]{6,50}$/', $passwd)) {
            echo "<script>window.alert('Password must be more than 5 alphanumeric characters and must include atleast one special character.')</script>";
            exit();
        }
    }

    function validate_comment($comment) {
        if (preg_match("/^.*<script.*$/", $comment)) {
            return false;
        }
        return true;
    }
?>