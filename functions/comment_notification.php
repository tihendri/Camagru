<?php
function comment_notification($user) {
    include "connect_to_db.php";
    include 'verify_user.php';
    if (verify_user($user)) {
        $usr_email_sql = "SELECT * FROM camagruers WHERE id=:usr_id";
        $get_usr_email = $conn->prepare($usr_email_sql);
        $get_usr_email->execute([':usr_id'=>$user]);
        $usr_email = $get_usr_email->fetch();
		// if ($usr_email['notify'] == 1) {
			$subject = "Camagru | Comments";
			$body = "Hey! Someone commented on one of your posts.";
			// $headers = "";
			// $headers .= "Content-Type: text/html; charset=UTF-8\r\n";
			mail($usr_email['email'], $subject, $body, "");
		// }
    }
}
?>