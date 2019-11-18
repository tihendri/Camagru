<?php
function get_comment_count($img_id) {
	include 'connect_to_db.php';
	$get_cmnts_sql = "SELECT * FROM comments WHERE cmnt_img_id=?";
	$get_cmnts = $conn->prepare($get_cmnts_sql);
	$get_cmnts->execute([$img_id]);
	$cmnts = $get_cmnts->fetchAll();
	$conn = null;
	return count($cmnts);
}
function get_commentor_name($usr_id) {
	include 'connect_to_db.php';
	$cmntr_name_sql = "SELECT username FROM camagruers WHERE id=?";
	$get_cmntr_name = $conn->prepare($cmntr_name_sql);
	$get_cmntr_name->execute([$usr_id]);
	$cmntr_name = $get_cmntr_name->fetch();
	return $cmntr_name['username'];
}
// function get_commentor_img($usr_id) {
// 	include 'connect_to_db.php';
// 	$cmntr_img_sql = "SELECT user_image FROM camagruers WHERE id=?";
// 	$get_cmntr_img = $conn->prepare($cmntr_img_sql);
// 	$get_cmntr_img->execute([$usr_id]);
// 	$cmntr_img = $get_cmntr_img->fetch();
// 	return $cmntr_img['user_image'];
// }
function get_comments($img_id) {
	include 'connect_to_db.php';
	$get_cmnts_sql = "SELECT * FROM comments WHERE cmnt_img_id=? ORDER BY cmnt_id DESC";
	$get_cmnts = $conn->prepare($get_cmnts_sql);
	$get_cmnts->execute([$img_id]);
	while ($cmnts = $get_cmnts->fetch()) {
		$commentor = get_commentor_name($cmnts['cmnt_usr_id']);
		// $cmntr_img = get_commentor_img($cmnts['cmnt_usr_id']);
		$comment = $cmnts['comment'];
		echo "	<div class='tile is-ancestor'>
					<div class='tile is-8 is-vertical'>
						<div class='tile is-parent'>
						<article class='media'>
							<div class='media-content'>
								<div class='content'>
									<p>
										<strong><b><i>$commentor</i></b></strong><br/>
										<small>$comment</small>
									</p>
								</div>
							<div>
						</article>
					  </div>
					</div>
				</div>";
	}
	$conn = null;
}
function post_comment($img) {
	include 'connect_to_db.php';
	include 'comment_notification.php';
    include_once 'validation.php';
	include_once 'get_post_user.php';
	if (isset($_SESSION['id'])) {
		$comment = $_POST['cmntContent'];
		if (validate_comment($comment)) {
			$commentor_id = $_SESSION['id'];
			if ($commentor_id) {
				$post_cmnt_sql = "INSERT INTO comments(cmnt_img_id, cmnt_usr_id, comment) VALUES(:img_id, :cmntr_id, :comment)";
				$post_cmnt = $conn->prepare($post_cmnt_sql);
				$post_cmnt->execute(array(':img_id'=>$img, ':cmntr_id'=>$commentor_id, ':comment'=>$comment));
				$op = get_post_user($img);
				if (($_SESSION['notif'] == 1)) {
					comment_notification($op, $comment, $_SESSION['username']);
				}
				echo "<script>alert('Your comment has been submitted!')</script>";
				echo"<script>window.location.replace('image_page.php?img=".$img."')</script>";
			}
			else {
				echo "<script>alert('Please Log In or Register to like or comment!')</script>";
			}
		}
	}
}
?>