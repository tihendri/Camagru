<?php
  
function change_password($new_pass, $ver_key, $u_email) {
    try {
        $conn = new PDO("mysql:host=localhost;dbname=camagru", "root", "root1004");
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        // include_once '../backend/connect_to_db.php';
        $get_data = $conn->prepare("SELECT * FROM camagruers WHERE email=:u_email");
        $get_data->execute(array(':u_email'=>$u_email));
        $u_data = $get_data->fetch();
        $new_vkey = hash('whirlpool', time().$email_to);
        if ($ver_key != $u_data['verkey']) {
            echo "<script>window.alert('Verification key does not match.')</script>";
            exit();
        }
        else {
            $update = $conn->prepare("UPDATE camagruers SET password_=:new_pass, verkey=:new_vkey WHERE email=:u_email");
            $update->execute(array(':new_pass'=>$new_pass, ':new_vkey'=>$new_vkey, ':u_email'=>$u_email));
            echo "<script>window.alert('Your password has be reset, you may now proceed to login with your new password.')</script>";
            echo "<script>window.open('login_now.php', '_self')</script>";
        }
    }
    catch(PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }
}
?>