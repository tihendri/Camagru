<?php
function log_in() {
    try {
        include 'connect_to_db.php';
        $username = $_POST['username'];
        $passwd = hash('whirlpool', $_POST['passwd']);
        $sql = $conn->prepare("SELECT * FROM camagruers WHERE username = :username");
        $sql->execute(['username' => $username]);
        $data = $sql->fetch();
        if (empty($data) || $username != $data['username'] || $passwd != $data['password_'])
        {
            echo"<script>window.alert('Username or Password invalid!')</script>";
        }
        else if ($username == $data['username'] && $passwd == $data['password_'] && $data['verified'] == 1)
        {
            $_SESSION['email'] = $data['email'];
            $_SESSION['id'] = $data['id'];
            $_SESSION['username'] = $data['username'];
            echo"<script>window.alert('You are now logged in!')</script>";
            echo"<script>window.location.replace('profile.php')</script>";
        }
        else if ($username == $data['username'] && $passwd == $data['password_'] && $data['verified'] == 0) {
            
            echo"<script>window.alert('Please verify your account with the link sent to your email!')</script>";
            $_SESSION['email'] = $data['email'];
            $_SESSION['id'] = $data['id'];
            $_SESSION['username'] = $data['username'];
        }
        else {
            echo"<script>window.alert('Your account does not exist! Please signup to join Camagru.')</script>";
        }
    } catch (PDOException $e) {
        echo $sql.'<br>'.$e->getMessage();
    }
    $conn = NULL;
}
?>