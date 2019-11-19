<?php
if (isset($_POST['submit_taken'])) {
    if (isset($_POST['taken'])) {
        try {
            include 'connect_to_db.php';
            $image = $_POST['taken'];
            $pre = "data:image/png;base64,";
            if (substr($image, 0, strlen($pre)) == $pre) {
                $image = substr($image, strlen($pre));
            }
            if ($image === "upload_taken.php") {
                echo "<script>console.log('Something went horribly wrong!')</script>";
            }
            else {
                $u_id = $_SESSION['id'];
                $upl_sql = "INSERT INTO pictures(usr_id, img_name) VALUES(:usr_id, :img_name)";
                $upld = $conn->prepare($upl_sql);
                $upld->execute(array(':usr_id'=>$u_id, ':img_name'=>$image));
                echo "<script>alert('Upload Successful!')</script>";
                echo "<script>window.open('upload_image.php','_self')</script>";
            }
        } catch (PDOException $e) {
            echo $upl_sql."<br/>".$e;
        }
    }
}
?>