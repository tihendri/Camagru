<?php
function get_post_user($img_id) {
	include 'connect_to_db.php';
	$get_post_usr_sql = "SELECT usr_id FROM pictures WHERE img_id=:img";
	$get_post_usr = $conn->prepare($get_post_usr_sql);
	$get_post_usr->execute([':img'=>$img_id]);
	$post_usr = $get_post_usr->fetch();
	return $post_usr['usr_id'];
}
?>