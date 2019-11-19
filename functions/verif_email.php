<?php
function verif_email($u_email, $ver_key) {
    $subject = "Activate your account with Camagru.";
    $body = "
    You have requested to change or renew your password. Your credential is as follows:
    ------------------------
    Username: '$data[username]'
    ------------------------
    (If this is not your username, please forgive this misunderstanding and delete this email, thanks.)
    Click on the following link to renew your password
    http://localhost:8080/camagru/verified.php?key=".$ver_key;
    // $headers = "From:tihendri@student.wethinkcode.co.za"."\r\n";
    $headers = "";
    $headers .= "Content-Type: text/html; charset=UTF-8\r\n";
    if (mail($u_email,$subject,$body,""))
        return true;
    else
        return false;
}
?>