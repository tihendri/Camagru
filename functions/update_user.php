<?php

// include 'connect_to_db.php';

function update_notify($user_id) {
	include 'connect_to_db.php';
	if (isset($_POST['notif'])) {
		$updt_sql = "UPDATE camagruers SET notify=1 WHERE id=:id";
		$updt_notif = $conn->prepare($updt_sql);
		$updt_notif->execute([':u_id'=>$user_id]);
		$_SESSION['notif'] = 1;
	} else {
		$updt_sql = "UPDATE camagruers SET notify=0 WHERE id=:id";
		$updt_notif = $conn->prepare($updt_sql);
		$updt_notif->execute([':u_id'=>$user_id]);
		$_SESSION['notif'] = 0;
	}
}
function update_name($user_id, $new_name) {
	include 'connect_to_db.php';
	if (isset($_POST['updt_name'])) {
		$updt_sql = "UPDATE camagruers SET username=:username WHERE id=:id";
		$updt_name = $conn->prepare($updt_sql);
		$updt_name->execute(array(':username'=>$new_name, ':id'=>$user_id));
		$_SESSION['username'] = $new_name;
		echo"<script>window.alert('Name updated.')</script>";
	}
}
function update_email($user_id, $new_email) {
	include 'connect_to_db.php';
	if (isset($_POST['updt_email'])) {
		$_SESSION['email'] = $new_email;
		$new_verif = hash('whirlpool', time().$new_email);
		$updt_sql = "UPDATE camagruers SET email=:u_email, verified=0, verkey=:new_verif WHERE id=:id";
		$updt_email = $conn->prepare($updt_sql);
		$updt_email->execute(array(':u_email'=>$new_email, ':new_verif'=>$new_verif,':u_id'=>$user_id));
		verif_email($new_email, $new_verif);
	}
}
function update_passwd($user_id, $new_passwd) {
	include 'connect_to_db.php';
	if (isset($_POST['updt_passwd'])) {
		$updt_sql = "UPDATE camagruers SET password_=:u_passwd WHERE id=:id";
		$updt_passwd = $conn->prepare($updt_sql);
		$updt_passwd->execute(array(':u_passwd'=>$new_passwd, ':u_id'=>$user_id));
	}
}
// function update_image($user_id, $new_image) {
// 	include 'connect_to_db.php';
// 	if (isset($_POST['updt_image'])) {
// 		$updt_sql = "UPDATE camagruers SET user_image=:u_image WHERE id=:id";
// 		$updt_image = $conn->prepare($updt_sql);
// 		$updt_image->execute(array(':u_image'=>$new_image, ':u_id'=>$user_id));
// 	}
// }

function update_user($user_id) {
	include "validation.php";
	if (isset($_POST['updt_name'])) {
		validate_name($_POST['new_name']);
		update_name($user_id, $_POST['new_name']);
	}
	if (isset($_POST['updt_email'])) {
		validate_email($_POST['new_email']);
		update_email($user_id, $_POST['new_email']);
		// log_out("my_account");
		echo "<script>window.open('../index.php', '_self')</script>";
	}
	if (isset($_POST['updt_passwd'])) {
		validate_password($_POST['new_passwd']);
		update_passwd($user_id, hash('whirlpool',$_POST['new_passwd']));
	}
	// if (isset($_POST['updt_image'])) {
	// 	//validate_image($_POST['new_image']);
	// 	$new_img_tmp = base64_encode(file_get_contents($_FILES['new_image']['tmp_name']));
	// 	update_image($user_id, $new_img_tmp);
	// }
	if (isset($_POST['updt_notif'])) {
		$user = $_SESSION['id'];
		update_notify($user);
	}
	echo "<script>window.open('profile.php', '_self')</script>";
}

?>