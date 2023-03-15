<?php
include 'conn.php';
include 'mail.php';
session_start();


function recapture( $recaptcha ){
    $secret_key = '<recapture key>';
  
    // Hitting request to the URL, Google will
    // respond with success or error scenario
    $url = 'https://www.google.com/recaptcha/api/siteverify?secret='
          . $secret_key . '&response=' . $recaptcha;
  
    // Making request to verify captcha
    $response = file_get_contents($url);
  
    // Response return by google is in
    // JSON format, so we have to parse
    // that json
    $response = json_decode($response);
  
    // Checking, if response is true or not
    if ($response->success == true) {
        return true;
    } else {
        return false; 
    }
}





if ($_SERVER["REQUEST_METHOD"] == "POST") { 
    $username = stripslashes($_POST['username']);
    $username = mysqli_real_escape_string($con, htmlentities($username));
    $email    = stripslashes($_POST['email']);
    $email    = mysqli_real_escape_string($con, htmlentities($email));
    $password = stripslashes($_POST['password']);
    $password = mysqli_real_escape_string($con, $password);
    $recaptcha = $_POST['g-recaptcha-response'];
    if(recapture( $recaptcha )){
         $_SESSION['errors'] = array("Registration closed !!");
        header("location: Register.php");
    }
   else{
         $_SESSION['errors'] = array("Robot Detected");
        header("location: Register.php");
    }
}else{
    header("location: Register.php");
}
    
    
?>