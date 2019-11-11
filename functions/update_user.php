<?php

include "../backend/connect_to_db.php";

function update_notify($user_id) {
	// include '../includes/connect.php';
	if (isset($_POST['notif'])) {
		$updt_sql = "UPDATE camagruers SET notify=1 WHERE user_id=:id";
		$updt_notif = $con->prepare($updt_sql);
		$updt_notif->execute([':u_id'=>$user_id]);
		$_SESSION['notif'] = 1;
	} else {
		$updt_sql = "UPDATE camagruers SET notify=0 WHERE user_id=:id";
		$updt_notif = $con->prepare($updt_sql);
		$updt_notif->execute([':u_id'=>$user_id]);
		$_SESSION['notif'] = 0;
	}
}
function update_name($user_id, $new_name) {
	// include '../includes/connect.php';
	if (isset($_POST['updt_name'])) {
		$updt_sql = "UPDATE camagruers SET username=:username WHERE user_id=:id";
		$updt_name = $con->prepare($updt_sql);
		$updt_name->execute(array(':u_name'=>$new_name, ':u_id'=>$user_id));
		$_SESSION['user_name'] = $new_name;
	}
}
function update_email($user_id, $new_email) {
	// include '../includes/connect.php';
	if (isset($_POST['updt_email'])) {
		$_SESSION['email'] = $new_email;
		$new_verif = hash('whirlpool', time().$new_email);
		$updt_sql = "UPDATE camagruers SET email=:u_email, verified=0, verkey=:new_verif WHERE user_id=:id";
		$updt_email = $con->prepare($updt_sql);
		$updt_email->execute(array(':u_email'=>$new_email, ':new_verif'=>$new_verif,':u_id'=>$user_id));
		verif_email($new_email, $new_verif);
	}
}
function update_passwd($user_id, $new_passwd) {
	// include '../includes/connect.php';
	if (isset($_POST['updt_passwd'])) {
		$updt_sql = "UPDATE camagruers SET user_passwd=:u_passwd WHERE user_id=:id";
		$updt_passwd = $con->prepare($updt_sql);
		$updt_passwd->execute(array(':u_passwd'=>$new_passwd, ':u_id'=>$user_id));
	}
}
function update_image($user_id, $new_image) {
	// include '../includes/connect.php';
	if (isset($_POST['updt_image'])) {
		$updt_sql = "UPDATE camagruers SET user_image=:u_image WHERE user_id=:id";
		$updt_image = $con->prepare($updt_sql);
		$updt_image->execute(array(':u_image'=>$new_image, ':u_id'=>$user_id));
	}
}

function update_user($user_id) {
	if (isset($_POST['updt_name'])) {
		validate_name($_POST['new_name']);
		update_name($user_id, $_POST['new_name']);
	}
	if (isset($_POST['updt_email'])) {
		validate_email($_POST['new_email']);
		update_email($user_id, $_POST['new_email']);
		log_out("my_account");
		echo "<script>window.open('../index.php', '_self')</script>";
	}
	if (isset($_POST['updt_passwd'])) {
		validate_password($_POST['new_passwd']);
		update_passwd($user_id, hash('whirlpool',$_POST['new_passwd']));
	}
	if (isset($_POST['updt_image'])) {
		//validate_image($_POST['new_image']);
		$new_img_tmp = base64_encode(file_get_contents($_FILES['new_image']['tmp_name']));
		update_image($user_id, $new_img_tmp);
	}
	if (isset($_POST['updt_notif'])) {
		$user = $_SESSION['user_id'];
		update_notify($user);
	}
	echo "<script>window.open('my_account.php', '_self')</script>";
}

?>