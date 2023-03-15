
<?php
include('../security/mobile.php'); 
$msg = "";
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
    session_start();
    include('conn.php');  
    if(!empty($_POST['username'])){
    $username = $_POST['username'];  
    $password = $_POST['password'];
        //to prevent from mysqli injection  
        $username = stripcslashes($username);  
        $password = stripcslashes($password);  
        $username = mysqli_real_escape_string($con, $username);  
        $password = mysqli_real_escape_string($con, $password);
        $recaptcha = $_POST['g-recaptcha-response'];  
      if(recapture($recaptcha)){
        $sql = "select *from users where userid = '$username' and pass = '" . md5($password) . "'";  
        $result = mysqli_query($con, $sql);   
        $count = mysqli_num_rows($result);       
        if($count == 1){
            
            $sql1 = "select *from users where userid = '$username' and verified = 'verified'";  
            $result1 = mysqli_query($con, $sql1);  
            $count1 = mysqli_num_rows($result1);
            if($count1 == 1){
              $_SESSION['login'] = $username;
              header("location: app/teams/teams.php");
            }
            else{
              $_SESSION['verify'] = $username; 
              header("location: reotp.php");        
            }
        }  
        else{  
            $msg = "Bad Credentials";
        } 
       }else{
       $msg = "Robot Detected";
       }

      }    
?>
<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Login Page</title>
  <link rel="stylesheet" href="./style.css">
  <script src="https://www.google.com/recaptcha/api.js" async defer>
    </script>

</head>
<body>
<!-- partial:index.partial.html -->
<section class="wrapper">
  <div class="content">
    <header>
      <h1>Login</h1>
    </header>
    <section>
      <div class="social-login">
        <button onclick="location.href='Register.php'"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-activity"><path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="8.5" cy="7" r="4"></circle><line x1="20" y1="8" x2="20" y2="14"></line><line x1="23" y1="11" x2="17" y2="11"></line></svg><span>Register</span></button>
        <button onclick="location.href='fogpass.php'"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-activity"><path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="8.5" cy="7" r="4"></circle><polyline points="17 11 19 13 23 9"></polyline></svg><span>Get Pass</span></button>
      </div>
      <form action="" method = "POST" class="login-form">
        <div class="input-group">
          <label for="username">Username</label>
          <input type="text" placeholder="Username" name="username">
        </div>
        <div class="input-group">
          <label for="password">Password</label>
          <input type="password" placeholder="Password" name="password">
        </div>
        <div class="input-group">
        <div class="g-recaptcha"  data-sitekey="6Lc23xcdAAAAAL1YQxDM01iUS29udCAG89Fnlb7B">
            </div>
        </div>
        <div class="input-group"><button>Login</button></div>
      </form>
    </section>
    <footer>
    <div class="input-group">
      <label class='error'><?php echo $msg ?></lable>
    </div>
    </footer>
  </div>
</section>
<!-- partial -->
  
</body>
</html>
