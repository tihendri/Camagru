<?php
    function is_my_post($img) {
        include 'connect_to_db.php';
        if (isset($_SESSION['username'])) {
            $get_img_sql = "SELECT usr_id FROM pictures WHERE img_id=:img_id";
            $img_usr_id = $conn->prepare($get_img_sql);
            $img_usr_id->execute([':img_id'=>$img]);
            $img_usr = $img_usr_id->fetch();
            if ($img_usr['usr_id'] == $_SESSION['id']) {
                return true;
            }
            return false;
        }
    }
?>