<?php
function upload_img($usr_id) {
    try {
        include "connect_to_db.php";
        if (!empty($usr_id)) {
            $upload_img_name = $_FILES['upl_img']['name'];
            if (!$upload_img_name) {
                exit();
            }
            $upload_img_tmp = base64_encode(file_get_contents($_FILES['upl_img']['tmp_name']));
            $sql = "INSERT INTO pictures(usr_id, img_name) VALUES(:usr_id, :img_name)";
            $upload = $conn->prepare($sql);
            $upload->execute(array(':usr_id'=>$usr_id, ':img_name'=>$upload_img_tmp));
        }

    } catch (PDOException $e) {
        echo 'Error: '.$e->getMessage();
        exit;
    }
}
?>