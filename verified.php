<?php
  // if ($_GET[err]){echo "<script>alert(\"".htmlentities($_GET[err])."\");window.location.href = \"verified.php\";</script>";}
  include_once "header.php";
  include_once "footer.php";
?>

<title>Camagru - Home</title>
  <article class="main">
    <?php    
        // include "functions/verify_account.php";
        // verify();
        // include "../backend/connect_to_db.php";
        $conn = new PDO("mysql:host=localhost;dbname=camagru", "root", "root1004");
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        if (isset($_GET['key'])) {
            $get_user_data = $conn->prepare("SELECT * FROM camagruers WHERE verkey = ?");
            $get_user_data->execute([$_GET['key']]);
            $userdata = $get_user_data->fetch();
            // print_r($userdata);
            if ($userdata['verified'] == 1) {
                // $_SESSION['email'] = $userdata['email'];
                // $_SESSION['id'] = $userdata['id'];
                // $_SESSION['username'] = $userdata['username'];
                echo "<p>Your account has already been verified! Stop mucking about and sign in.</p>";
            }
    
            else if ($userdata) {
                $email = $userdata['email'];
                $verikey = $userdata['verkey'];
                $update = $conn->prepare("UPDATE camagruers SET verified=1 WHERE email=?");
                $update->execute([$email]);
                // $_SESSION['email'] = $userdata['email'];
                // $_SESSION['id'] = $userdata['id'];
                // $_SESSION['username'] = $userdata['username'];
                echo "<p>Your account has successfully been verified. Have a very nice day.</p>";
            }
    
            else if (!$userdata) {
    
                echo "<p>Account not found. Error 404 bruh.</p>";
            }
        }
        else {
            echo "<p>No verification code found! Please click on the link sent to you email.</p>";
        }
    ?>
  </article>
  <aside class="aside">
    
  </aside>
</div>
</html>