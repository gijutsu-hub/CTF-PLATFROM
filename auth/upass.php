<?php
$msg = "";
session_start();
include_once 'conn.php';

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




if(isset($_SESSION['fogpass'])){ $recaptcha = $_POST['g-recaptcha-response'];
    $userid = $_SESSION['fogpass'];
}else{
    header("location: errorpage/404/index.html");
}

    if(isset($_POST['code'])){
         $recaptcha = $_POST['g-recaptcha-response'];
        $code = stripslashes($_POST['code']);
        $code = mysqli_real_escape_string($con, $code);
        $password = stripslashes($_POST['pass']);
        $password = mysqli_real_escape_string($con, $password);
        $sql = mysqli_query($con,"SELECT * FROM users WHERE userid='$userid'");
        $row = mysqli_fetch_array($sql, MYSQLI_ASSOC);
        if(recapture( $recaptcha )){
       if(strcasecmp($row["passveri"],$code) == 0){
       mysqli_query($con,"UPDATE users SET pass = '" . md5($password) . "'  WHERE userid='$userid'");
       mysqli_query($con,"UPDATE users SET passveri = 'NULL'  WHERE userid='$userid'");
       unset($_SESSION['fogpass']);
       header("location: email/email.html");
       }
       else{
        $msg = "Invalid Secret Code";
       }
    }
       else{
          $msg = "Recapture VAlidation failed";
       }
}


    

?>
<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Userid</title>
  <link rel="stylesheet" href="./style.css">
   <script src="https://www.google.com/recaptcha/api.js" async defer>
    </script>
</head>  
<body>
<!-- partial:index.partial.html -->
<section class="wrapper">
  <div class="content">
    <header>
      <h1>Forget Password</h1>
    </header>
    <section>
      <form action="" method="post" class="login-form">
        <div class="input-group">
          <label for="verification">Secret Code</label>
          <input type="text" placeholder="XX-XX-XX" name="code" required>
        </div>
        <div class="input-group">
          <label for="verification">Update Password</label>
          <input type="password" placeholder="Password" name="pass" required>
        </div>
        <div class="input-group">
        <div class="g-recaptcha"  data-sitekey="6Lc23xcdAAAAAL1YQxDM01iUS29udCAG89Fnlb7B">
            </div>
        <div class="input-group" ><button>Submit</button></div>
      </form>
    </section>
    <footer>
    <label class='Mail'><?php echo $msg; ?></lable>
    </footer>
  </div>
</section>
<!-- partial -->
 
</body>
</html>
