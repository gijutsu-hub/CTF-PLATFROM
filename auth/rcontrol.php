<?php
include 'conn.php';
include 'mail.php';
session_start();


function generateRandomString($length = 6) {
    return substr(str_shuffle(str_repeat($x='0123456789ABCDEFGHIJKLMNOPQRSTU', ceil($length/strlen($x)) )),1,$length);
}

  $verifi = generateRandomString();

  if (isset($_POST['username'])) {
    $username = stripslashes($_POST['username']);
    $username = mysqli_real_escape_string($con, $username);
    $email    = stripslashes($_POST['email']);
    $email    = mysqli_real_escape_string($con, $email);
    $password = stripslashes($_POST['password']);
    $password = mysqli_real_escape_string($con, $password);
  

    function checkUser($username ){
    
        $sql = mysql_query("SELECT * FROM users WHERE userid='$username'");
    
        if (mysql_num_rows($sql) == 0) {
            return true;
        }
    
        return false;
    }

    function checkEmail($email) {
        $email = mysql_real_escape_string($email);
    
        $sql = mysql_query("SELECT * FROM users WHERE email='$email'");
    
        if (mysql_num_rows($sql) == 0) {
            return true;
        }
    
        return false;
    }

    if(checkUser($username)) {
        if(checkEmail($email)){
            $query    = "INSERT into users (userid, email, pass, veri)
            VALUES ('$username','$email', '" . md5($password) . "',  '$verifi')";
            $result   = mysqli_query($con, $query);
                if ($result) {    
                    header("location: verify.php");
                    $_SESSION['verify'] = $username;
                    $mail->addAddress("$email");
                    $mail->Subject = 'Verification Message';
                    $mail->Body    = '<h1>Your verification Code is</h1><h4>'.$verifi.'</h4>';
                    $mail->send();
        }
        else{
            $_SESSION['errors'] = array("This email is already being used");
        }
    }
    else{
        $_SESSION['errors'] = array("This Userid is already being used");
    }

    

?>

