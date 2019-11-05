<?php
function upload_img($usr_id) {

try {
// include "../backend/connect_to_db.php";
$conn = new PDO("mysql:host=localhost;dbname=camagru", "root", "root1004");
// set the PDO error mode to exception
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
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
//   if (!file_exists('image')) {
//       mkdir('image', 0775, true);
//   }
//   $upload_dir = 'image/';
//   $img = $_POST['img'];
//   $img = str_replace('data:image/png;base64,', '', $img);
//   $img = str_replace(' ', '+', $img);
//   $data = base64_decode($img);
//   $file = $upload_dir.mktime().'.png';
//   $success = file_put_contents($file, $data);
//   echo $success ? $file : 'Unable to save the file.';
//   include_once 'config/database.php';
//   try {
//       $dbh = new PDO($DB_DSN, $DB_USER, $DB_PASSWORD);
//       $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//       $sth->prepare("INSERT INTO snap (login, img) VALUES (':user', ':file')");
//       $sth->bindParam(':user', $_POST[user], PDO::PARAM_STR);
//       $sth->bindParam(':file', $file, PDO::PARAM_STR);
//       $sth->execute();
//   } catch (PDOException $e) {
//       echo 'Error: '.$e->getMessage();
//       exit;
//   }

} catch (PDOException $e) {
    echo 'Error: '.$e->getMessage();
    exit;
}
}
?>