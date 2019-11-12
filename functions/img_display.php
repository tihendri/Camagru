<?php
function img_display() {
    try {
		include 'connect_to_db.php';
		include_once 'comment_stuff.php';
		include_once 'functions/like_stuff.php';
		$get_imgs = "SELECT * FROM pictures ORDER BY date_created DESC";
		$exe_imgs = $conn->prepare($get_imgs);
		$exe_imgs->execute();
	}
	catch(PDOException $e) {
    	echo "Connection failed: " . $e->getMessage();
    }
	while ($image = $exe_imgs->fetch()) {
		$img_name = $image['img_name'];
		$img_id = $image['img_id'];
		$cmnts_amnt = get_comment_count($img_id);
		$likes_amnt = get_like_count($img_id);
		echo "	<div class='tile is-ancestor'>
					<div class='tile is-12 is-vertical'>
						<div class='tile is-parent'>
						<article class='tile is-child box'>
							<figure class='image'>
									<a href='image_page.php?img=$img_id'>
										<img style='height:30%; width:60%' src='data:image/png;base64,".$img_name."' />
									</a>
							</figure>
							<p class='subtitle'>Likes: $likes_amnt Comments: $cmnts_amnt</p>
						</article>
					  </div>
					</div>
				</div>";
	}
}
?>