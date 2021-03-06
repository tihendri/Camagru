<?php
function comment_notification($user, $cmnt, $commenter) {
    include "connect_to_db.php";
    if ($_SESSION['username']) {
        $usr_email_sql = "SELECT * FROM camagruers WHERE id=:usr_id";
        $get_usr_email = $conn->prepare($usr_email_sql);
        $get_usr_email->execute([':usr_id'=>$user]);
        $usr_email = $get_usr_email->fetch();
        $subject = "Camagru | Comments";
        $body = "Hey! Someone commented on one of your posts: \n
        \n".$commenter."\n".$cmnt;
        $headers = "";
        // $headers .= "MIME-Version 1.0" . "\r\n";
        // $headers .= "Content-Type: text/html; charset=UTF-8" . "\r\n";
        mail($usr_email['email'], $subject, $body, $headers);
    }
    else {
        echo"<script>window.alert('You must be logged in to comment on pictures. If you do not have an account, please signup to join Camagru.')</script>";
        echo"<script>window.location.replace('login_now.php')</script>";
    }
}
?>