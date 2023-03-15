<?php
session_start();
$msg = "";
include_once 'conn.php';
if(isset($_SESSION['verify'])){
   $username = $_SESSION['verify']; 
    $sql = mysqli_query($con,"SELECT * FROM users WHERE userid='$username'");
    $row = mysqli_fetch_array($sql, MYSQLI_ASSOC);
      if(isset($_POST['verification'])){
        $verification = stripslashes($_POST['verification']);
        $verification = mysqli_real_escape_string($con, $verification); //get input text
      if(strcasecmp($row["veri"],$verification)==0){
          mysqli_query($con,"UPDATE users SET verified='verified' WHERE userid='$username'");
          mysqli_query($con,"UPDATE users SET veri='NULL' WHERE userid='$username'");  
          $_SESSION['error'] = array("User Verified Successfully ");
        header("location: email/index.html");      
      }
      else{
        $msg = "Invalid verification code";
      }
    }
  }
  else{
    header("location: errorpage/404/index.html");
  }
    


?>
<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Verification Page</title>
  <link rel="stylesheet" href="./style.css">

</head>  
<script>
  var timeleft = 180;
var downloadTimer = setInterval(function(){
  if(timeleft <= 0){
    clearInterval(downloadTimer);
    document.getElementById("countdown").innerHTML = '<label for="msg"><a href="reotp.php" title="Forgot Password">Resend OTP</a></lable>';
  } else {
    document.getElementById("countdown").innerHTML = '<label for="verify">'+timeleft + 'seconds remaining </label>';
  }
  timeleft -= 1;
}, 1000);
</script>
<body>
<!-- partial:index.partial.html -->
<section class="wrapper">
  <div class="content">
    <header>
      <h1>Verification</h1>
    </header>
    <section>
      <form action="" method="post" class="login-form">
        <div class="input-group">
          <label for="verification">Verification Code</label>
          <input type="text" placeholder="XX-XX-XX-XX" name="verification" required>
        </div>
        <div class="input-group" ><button>Verify</button></div>
      </form>
    </section>
    <footer>
    <label class='vter'><?php echo $msg ?></lable><br>
          <?php if (isset($_SESSION['Mail'])): ?>
        <?php foreach($_SESSION['Mail'] as $Mail): ?>
      <label class='Mail'><?php echo $Mail ?></lable>
    <?php endforeach; ?>
    <?php endif; ?>
    <br>
    <label for="msg">OTP Valid for 180 sec</label>
          <lable for = "veri"><div id="countdown"></div></label>
</div>
    </footer>
  </div>
</section>
<!-- partial -->
 
</body>
</html>
