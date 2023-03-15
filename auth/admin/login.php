<?php
include ('../conn.php');
function generateRandomString($length = 70) {
    return substr(str_shuffle(str_repeat($x='0123456789ABCDEFGHIJKLMNOPQRSTU', ceil($length/strlen($x)) )),1,$length);
} ?>

<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Admin Login</title>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Admin Panel Log in</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">

    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet"> <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-beta/css/bootstrap.min.css'>
<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css'>
<link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Roboto'><link rel="stylesheet" href="./style.css">

</head>
<body>
<!-- partial:index.partial.html -->
<div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-2"></div>
            <div class="col-lg-6 col-md-8 login-box">
                <div class="col-lg-12 login-key">
                    <i class="fa fa-key" aria-hidden="true"></i>
                </div>
                <div class="col-lg-12 login-title">
                    ADMIN PANEL
                </div>

                <div class="col-lg-12 login-form">
                    <div class="col-lg-12 login-form">
                        <form action="verifiable.php" method="POST">
                            <div class="form-group">
                                <label class="form-control-label">Code</label>
                                <input type="text" name="code" class="form-control">
                            </div>
                                <div class="col-lg-6 login-btm login-button">
                                    <button type="submit" class="btn btn-outline-primary">LOGIN</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-lg-3 col-md-2"></div>
            </div>
        </div>
<!-- partial -->
  
</body>
</html>


<?php
if(isset($_POST['username'])){
    $ip = $_SERVER['REMOTE_ADDR'];
    $code = generateRandomString();
    $username = stripcslashes($_POST['username']);  
    $password = stripcslashes($_POST['pass']);  
    $username = mysqli_real_escape_string($con, $username);  
    $password = mysqli_real_escape_string($con, $password);
    $sql = "select * from admin where Email = '$username' and Pass = '$password'";  
        $result = mysqli_query($con, $sql);   
        $count = mysqli_num_rows($result);            
        if($count == 1){
            mysqli_query($con,"UPDATE admin SET IP='$ip' where Email = '$username'");
            mysqli_query($con,"UPDATE admin SET Code='$code' where Email = '$username'");
            echo "Authorized Success the code is ".$code;
}
}
?>

