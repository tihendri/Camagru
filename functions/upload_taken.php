<?php
// include "../backend/connect_to_db.php";
// if (session_id() === "") {
//      session_start();
// }
if (isset($_POST['submit_taken'])) {
    if (isset($_POST['taken'])) {
        try {
            $conn = new PDO("mysql:host=localhost;dbname=camagru", "root", "root1004");
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
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
                // echo "<script>window.open('../client/my_account.php','_self')</script>";
            }
        } catch (PDOException $e) {
            echo $upl_sql."<br/>".$e;
        }
    }
}
?>