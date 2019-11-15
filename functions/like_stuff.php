<?php
function post_is_liked($img_id) {
	include 'connect_to_db.php';
	if (isset($_SESSION['id'])) {
		// if (!empty($usr_likes)) {
		// 	return true;
		// }
		// else {
			$like_usr_id = $_SESSION['id'];
			$is_liked_sql = "SELECT * FROM likes WHERE like_usr_id=:id AND like_img_id=:img_id ";
			$is_liked = $conn->prepare($is_liked_sql);
			$is_liked->execute(array(':id'=>$like_usr_id, ':img_id'=>$img_id));
			$usr_likes = $is_liked->fetchAll();
			$conn = null;
		// }
	}
	// return false;
}
function post_like($img) {
	include 'connect_to_db.php';
	if (isset($_SESSION['id'])) {
		$like_usr_id = $_SESSION['id'];
		// if (!post_is_liked($img)) {
			$post_like_sql = "INSERT INTO likes(like_img_id, like_usr_id) VALUES(:img_id, :id)";
			$post_like = $conn->prepare($post_like_sql);
			$post_like->execute(array(':img_id'=>$img, ':id'=>$like_usr_id));
		// }
	// } else {
	// 	echo "<script>alert('Please Log In or Register to like or comment!')</script>";
	}
	$conn = null;
}
function delete_like($img) {
	include 'connect_to_db.php';
	if (isset($_SESSION['id'])) {
		$like_usr_id = $_SESSION['id'];
		$delete_sql = "DELETE FROM likes WHERE like_img_id=:img_id AND like_usr_id=:id";
		$delete_like = $conn->prepare($delete_sql);
		$delete_like->execute(array(':img_id'=>$img, ':id'=>$like_usr_id));
	}
	$conn = null;
}
function get_like_count($img_id) {
	include 'connect_to_db.php';
	$get_likes_sql = "SELECT * FROM likes WHERE like_img_id=?";
	$get_likes = $conn->prepare($get_likes_sql);
	$get_likes->execute([$img_id]);
	$likes = $get_likes->fetchAll();
	$conn = null;
	return count($likes);
}
?>