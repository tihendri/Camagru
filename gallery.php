<?php
  session_start();
  if ($_SESSION['username']) {
      if (!$_GET['page']) {
          header('Location: Gallery.php?page=1');
      }
  } else {
    //   header('Location: index.php?err=You must login to access this page.');
            echo"<script>window.alert('You must login to access this page!')</script>";
  }
    include_once 'config/database.php';
    $start_ = (($_GET['page'] - 1) * 10);
    try {
        $dbh = new PDO("mysql:host=localhost;dbname=camagru", "root", "root1004");
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sth = $dbh->prepare("SELECT * FROM pictures LIMIT 10 OFFSET 1");
        $sth->bindParam(":start_", $start_, PDO::PARAM_INT);
        $sth->execute();
    } catch (PDOException $e) {
        echo 'Error: '.$e->getMessage();
        exit;
    }
    $result = $sth->fetchAll();
    if (!$result) {
        if ($_GET['page'] > 1) {
            $prev = $_GET['page'] - 1;
            header("Location: Gallery.php?page=$prev");
            exit();
        } else {
            echo "<span class='empty'>The gallery is empty.</span>";
        }
    }
    include_once 'header.php';
    ?>
      <title>Camagru | Gallery</title>
      <article class='main'>
      <div class=container>
      <?php
      foreach ($result as $key => $value) {
          echo "<div class='fleximgbox'>";
          try {
              $sth = $dbh->prepare('SELECT COUNT(*) FROM likes WHERE img_id = :img_id');
              $sth->bindParam(':img_id', $value['id'], PDO::PARAM_INT);
              $sth->execute();
          } catch (PDOException $e) {
              echo 'Error: '.$e->getMessage();
              exit;
          }
          $likes = $sth->fetchColumn();
          if ($value['username'] == $_SESSION['username']) {
              echo "<a href='user/remove_img.php?img=$value[id]&page=$_GET[page]'><img src='images/DeleteRed.png' width='42' style='position:absolute;'></a>";
          }
          echo "<img src='$value[img]' style='width:426px;'>
          <br/>
          Picture by : <i>$value[username]
          <br/></i>Likes: $likes
          <a href='user/Like.php?img_id=$value[id]&page=$_GET[page]' style='float:right; margin-top: -20px;'><img src='images/Like.png' width='42' height='42'></a>
          <form class='comment' action='user/Comment.php?img_id=$value[id]&page=$_GET[page]' method='post'><br/>
          <input class='form' style='width:79%;' type='text' placeholder='Enter your comment' name='comment' required>
          <button type='submit' class='button' style='width: auto;'>Send</button>
          </form>";
          try {
              $sth = $dbh->prepare("SELECT * FROM comments WHERE img_id = $value[id]");
              $sth->execute();
          } catch (PDOException $e) {
              echo 'Error: '.$e->getMessage();
              exit;
          }
          $result = $sth->fetchAll();
          if ($result) {
              echo "<div class='comments'>";
              foreach ($result as $key => $value) {
                  echo "-> <i>$value[username]</i> <br/> $value[comment] <hr>";
              }
              echo '</div>';
          }
          echo '</div>';
      }
      echo '</div><center>
      <ul class="pagination">';
      try {
          $sth = $dbh->prepare('SELECT COUNT(*) FROM pictures');
          $sth->execute();
      } catch (PDOException $e) {
          echo 'Error: '.$e->getMessage();
          exit;
      }
      $nbpage = ($sth->fetchColumn() - 1) / 10 + 1;
      $prev = $_GET['page'] - 1;
      if ($prev > 0) {
          echo "<li><a href='?page=$prev'>«</a></li>";
      }
      for ($i = 1; $i <= $nbpage; ++$i) {
          echo "<li><a href='?page=$i'>$i</a></li>";
      }
      $next = $_GET['page'] + 1;
      if ($next < $nbpage) {
          echo "<li><a href='?page=$next'>»</a></li>";
      }
      echo '</ul></center>';
    ?>
  </article>
</div>