<?php
    function delete_post($img_id) {
        include 'connect_to_db.php';
        $del_like_sql = "DELETE FROM likes WHERE like_img_id=:img";
        $del_like = $conn->prepare($del_like_sql);
        $del_like->execute(array(':img'=>$img_id));
        $del_cmnt_sql = "DELETE FROM comments WHERE cmnt_img_id=:img";
        $del_cmnt = $conn->prepare($del_cmnt_sql);
        $del_cmnt->execute(array(':img'=>$img_id));
        $del_img_sql = "DELETE FROM pictures WHERE img_id=:img AND usr_id=:usr";
        $del_img = $conn->prepare($del_img_sql);
        $del_img->execute(array(':img'=>$img_id, ':usr'=>$_SESSION['id']));
        $conn = null;
        echo "<script>alert('Post deleted.')</script>";
        echo "<script>window.open('index.php', '_self')</script>";
    }
?>