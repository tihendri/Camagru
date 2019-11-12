<?php
function get_image($img_id) {
	include "connect_to_db.php";
	include "comment_stuff.php";
	include "like_stuff.php";
	$get_img_sql = "SELECT * FROM pictures WHERE img_id=?";
	$get_img = $conn->prepare($get_img_sql);
	$get_img->execute([$img_id]);
	$img = $get_img->fetch();
	$img_nme = $img['img_name'];
	$cmnts_amnt = get_comment_count($img_id);
	$likes_amnt = get_like_count($img_id);
	echo "	<div class='tile is-ancestor'>
					<div class='tile is-8 is-vertical'>
						<div class='tile is-parent'>
						<article class='tile is-child box'>
							<figure class='image'>
										<img src='data:image/png;base64,".$img_nme."' />
							</figure>
							<br/>
							<p class='subtitle'>Likes: $likes_amnt Comments: $cmnts_amnt</p>
						</article>
					  </div>
					</div>
				</div>";
}
?>