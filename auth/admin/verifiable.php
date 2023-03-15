<?php
include ('../conn.php');
$ip = $_SERVER['REMOTE_ADDR'];
session_start();
if(isset($_POST['code'])){
$username = stripcslashes($_POST['code']);  
$username = mysqli_real_escape_string($con, $username);  
$sql = "select * from admin where Code = '$username' and IP = '$ip'";   //
        $result = mysqli_query($con, $sql);   
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
        $email = $row['Email'];
        $count = mysqli_num_rows($result);            
        if($count == 1){
            $_SESSION['adminlogin'] = $email;
            header("location: app/home.php");
            mysqli_query($con,"UPDATE admin SET Code=NULL where Email = '$email' ");
            mysqli_query($con,"UPDATE admin SET IP=NULL where Email = '$email'");
            
        }
        else{
            header("location: login.php");
        }


}
 

?>