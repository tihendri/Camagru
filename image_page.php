
<?php
  if ($_GET[err]){echo " <script>alert(\"".htmlentities($_GET[err])."\");window.location.href = \"index.php\";</script>";}
  include_once "header.php";
  include_once "footer.php";
?>
<title>Camagru | Image</title>
  <!-- <article class="main"> -->
  <div class="main" style="text-align:center">


<?php
      if (isset($_POST['comment'])) {
        include "functions/comment_stuff.php";
        post_comment($_GET['img']);
      }
      if (isset($_POST['delete_post'])) {
        include "functions/delete_post.php";
        delete_post($_GET['img']);
      }
      include "functions/get_image.php";
      $img_id = $_GET['img'];
      get_image($img_id);

?>

<div class="comments">
							<form method="POST">
								<?php
                include "functions/is_my_post.php";
								echo "<div class='level'>";
									if (!post_is_liked($_GET['img'])) {
										echo "<div class='level-left'><input class='button is-light' type='submit' name='like' value='Like'></div><br/>";
									} else {
										echo "<div class='level-left'><input class='button is-success' type='submit' name='apathy' value='Liked'></div><br/>";
									}
									if (is_my_post($_GET['img'])) {
										echo "<div class='level-right'><input class='button is-danger' type='submit' name='delete_post' value='Delete'></div>";
									}
								echo "</div>";
								?>
								<input class="textarea" type="text" name="cmntContent" placeholder="Write a comment...">
								<div class="field is-grouped is-grouped-right">
									<input class="button is-success" type="submit" name="comment" value="Submit Comment">
								</div>
							</form>
</div>
<header>Comments</header><br />
<?php
      get_comments($img_id);
      include "functions/like_stuff.php";
      echo"<script>window.alert('You are now logged in!')</script>";
      if (isset($_POST['like'])) {
        post_like($_GET['img']);
      }
      if (isset($_POST['apathy'])) {
        delete_like($_GET['img']);
      }
?>







<?php
    if (isset($_GET['session_status'])) {
      if ($_GET['session_status'] == "logout") {
        include "functions/disconnect.php";
        disconnect();
      }
    }
?>