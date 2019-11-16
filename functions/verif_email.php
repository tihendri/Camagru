<?php
    function verif_email($u_email, $ver_key) {
        $subject = "Activate your account with Camagru.";
        $body = "Please click <a href='http://localhost:8080/Camagru/client/verify_email.php?ver_key=".$ver_key."'>here</a> to activate your account.";
        $headers = "";
        $headers .= "Content-Type: text/html; charset=UTF-8\r\n";
        if (mail($u_email,$subject,$body,""))
            return true;
        else
            return false;
    }
?>