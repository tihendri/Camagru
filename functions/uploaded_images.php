<?php

function uploaded_images($user) {
	try {
		include 'connect_to_db.php';
		// echo "Connected successfully";
		if (!empty($user)) {
			$get_imgs_sql = "SELECT * FROM pictures WHERE usr_id=:usr_id ORDER BY date_created DESC LIMIT 5";
			$get_user_imgs = $conn->prepare($get_imgs_sql);
			$get_user_imgs->execute(array(':usr_id'=>$user));
			while ($img = $get_user_imgs->fetch()) {
				$img_name = $img['img_name'];
				$img_id = $img['img_id'];
				echo "	<figure class='image'>
							<a href='image_page.php?img=$img_id'>
								<img src='data:image/png;base64,".$img_name."' />
							</a>
						</figure>";
			}
		}
	} catch(PDOException $e) {
	echo "Connection failed: " . $e->getMessage();
	}
}
?>