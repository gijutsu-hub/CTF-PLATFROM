<?php
include_once 'conn.php';
include 'mail.php';
include('../security/mobile.php'); 
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
$msg = "";
if(isset($_POST['email'])){
    $email = stripslashes($_POST['email']);
    $email = mysqli_real_escape_string($con, $email);
    $sql = mysqli_query($con,"SELECT * FROM users WHERE email='$email'");
    $row = mysqli_fetch_array($sql, MYSQLI_ASSOC);
    $recaptcha = $_POST['g-recaptcha-response'];
    if(recapture( $recaptcha )){   
    if (mysqli_num_rows($sql) == 0) {
        $msg = "No user found with the email";
    }
    else{
        $userid = $row['userid'];
    $mail->addAddress("$email");
        $mail->Subject = 'User ID';
        $mail->Body    = '<h1>Your User Id is</h1><h4>'.$userid.'</h4>';
        if($mail->send()){
            $msg = "Mail send Successfull";
        }else{
            $msg = "Error Occured! Try again later";
        }
    }
}else{
  $msg = "Recapture verification failed";
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
      <h1>Forget UserId</h1>
    </header>
    <section>
      <form action="" method="post" class="login-form">
        <div class="input-group">
          <label for="verification">Email</label>
          <input type="email" placeholder="doe@example.com" name="email" required>
        </div>
        <div class="input-group">
        <div class="g-recaptcha"  data-sitekey="6Lc23xcdAAAAAL1YQxDM01iUS29udCAG89Fnlb7B">
        </div>
        <div class="input-group" ><button>Submit</button></div>
      </form>
    </section>
    <footer>
    <label class='vter'><?php echo $msg ?></lable>
    </footer>
  </div>
</section>
<!-- partial -->
 
</body>
</html>
