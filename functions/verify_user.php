<?php
// Checks if user id corresponds to registered user
function verify_user($user_id) {
	try {
		$con = new PDO("mysql:host=localhost;dbname=camagru", "root", "root1004");
		$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$u_verif = $con->prepare("SELECT * FROM camagruers WHERE id=? AND verified=1");
	$u_verif->execute([$user_id]);
	$row = $u_verif->fetch();
	if ($row['id'] == $user_id)
		return true;
	else
		return false;
    } catch(PDOException $e) {
		echo "ERROR: ".$e->getMessage();
    }
}
?>