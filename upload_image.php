<?php
  if ($_GET[err]){echo "<script>alert(\"".htmlentities($_GET[err])."\");window.location.href = \"upload_image.php\";</script>";}
  include_once "header.php";
  include_once "footer.php";
  include "functions/upload_taken.php";
?>
<html>
	<head>
		<title>Camagru | Upload Image</title>
	</head>
	<body>
<div class="tile is-ancestor">
					<div class="tile is-8">
						<div class="tile is-parent">
							<article class="tile is-child box">
								<p class="title">Take a picture</p>
									<video autoplay id='vid' width='720' height='480' style=''></video>
									<br/>
									<div class="buttons is-centered">
										<button class="button is-centered" id="shoot" >Take Picture</button>
									</div>
									<canvas id='uploadCanvas' width='720' height='480' style=""></canvas>
								<form action="" method="POST" enctype=multipart/form-data>
									<input name="taken" id="taken" type="hidden" value="upload_taken.php">
									<div class="box column has-text-centered is-10 is-offset-1">
										<img src="http://localhost:8080/camagru/filter_images/beer.png" class="supers" width="100" height="100">
										<img src="http://localhost:8080/camagru/filter_images/sexy_elf.png" class="supers" width="100" height="100">
										<img src="http://localhost:8080/camagru/filter_images/water_splash.png" class="supers" width="100" height="100">
										<img src="http://localhost:8080/camagru/filter_images/angel_wings.png" class="supers" width="100" height="100">
										<img src="http://localhost:8080/camagru/filter_images/jim_morrison.png" class="supers" width="100" height="100">
										<img src="http://localhost:8080/camagru/filter_images/windows.png" class="supers" width="100" height="100">
									</div>
									<div class="buttons is-centered">
										<button class="button is-centered is-hidden" type="submit" name="submit_taken" id="submit_taken" style="">Upload Photo</button>
									</div>
								</form>
							</article>
						</div>
					</div>
</div>
<script src="webcam.js"></script>
<h2>Upload Image</h2>
  <article class="main">
    <p></p>
  </article>
  <aside class="aside">
    
  </aside>

<form action="" method="POST" enctype="multipart/form-data">
  <input type="file" name="upl_img">
  <button type="submit" name="upload">Upload</button>
</form>
<?php
if (isset($_POST['upload'])) {
  if (isset($_FILES['upl_img']['name'])) {
    include "functions/upload_img.php";
    echo"<script>window.alert('Your image has been successfully uploaded.')</script>";
    upload_img($_SESSION['id']);
  }
}
?>
		<h2>Images You've Uploaded</h2>
		<div class="tile is-10">
			<div class="tile is-parent">
				<article class="tile is-child box">
					<?php
						// if (isset($_GET['session_status'])){
						// 	include_once 'update_account.php';
						// }
						// else {
							include "functions/uploaded_images.php";
							uploaded_images($_SESSION['id']);
						// }
						if (isset($_POST['updt_name']) || isset($_POST['updt_email']) || isset($_POST['updt_passwd']) || isset($_POST['updt_image']) || isset($_POST['updt_notif'])){
							update_user($u_data['usr_id']);
						}
					?>
				</article>
			</div>
		</div>
		<a id="open-modal" href="my_account.php?session_status=update">Edit Account</a>
	</body>
</html>