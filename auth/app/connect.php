<?php
function generateRandomString($length = 6) {
  return substr(str_shuffle(str_repeat($x='0123456789ABCDEFGHIJKLMNOPQRSTU', ceil($length/strlen($x)) )),1,$length);
}   
function recapture($recaptcha){
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
$id = generateRandomString();
$msg = "";
include('../conn.php');
include('../mail.php');
include('session.php');
$username = $_SESSION['login'];
$sql = mysqli_query($con,"SELECT * FROM evedetails");
$row = mysqli_fetch_array($sql, MYSQLI_ASSOC);
$sql1 = mysqli_query($con,"SELECT * FROM usdetails where userid  = '$username'");
$row1 = mysqli_fetch_array($sql1, MYSQLI_ASSOC);
$sql3 = mysqli_query($con,"SELECT * FROM users where userid  = '$username'");
$row3 = mysqli_fetch_array($sql3, MYSQLI_ASSOC);
$sql4 = mysqli_query($con,"SELECT * FROM ctfch");
$sql5 = mysqli_query($con,"SELECT Email FROM admin ");
$recaptcha = $_POST['g-recaptcha-response'];
$email = $row3['email'];
if(isset($_POST['msg'])){
    $cname = stripslashes($_POST['cname']);
    $cname = mysqli_real_escape_string($con, htmlentities($cname));
    $subject = stripslashes($_POST['sub']);
    $subject = mysqli_real_escape_string($con, htmlentities($subject));
    $msg = stripslashes($_POST['msg']);
    $msg = mysqli_real_escape_string($con, htmlentities($msg));
    if(recapture( $recaptcha )){ 
    $result = mysqli_query($con,"INSERT INTO contact (messageid, username, email, ctfname, subject, descrip) VALUES ('$id','$username','$email','$cname','$subject','$msg')");
    if($result){
      if ($sql5->num_rows > 0) {
        while($row5 = $sql5->fetch_assoc()) {
          $admmail = $row5['Email'];
      $mail->addAddress("$admmail");
        $mail->Subject = 'Enquiry Submitted';
        $mail->Body    = 'new enquery submitted kindly check the email';
        $mail->send();
        $msg = "Admin will reply you through Mail";
        }
      }
    }
    else{
        $msg = "error occured";
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
  <title>Profile Update</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<link rel="stylesheet" href="./style.css">
<script src="https://www.google.com/recaptcha/api.js" async defer>
    </script>

</head>
<body>
<!-- partial:index.partial.html -->
<div class="app-container">
<div class="app-left">
    <button class="close-menu">
      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/></svg>
    </button>
    <div class="app-logo">
    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-activity"><path d="M4 15s1-1 4-1 5 2 8 2 4-1 4-1V3s-1 1-4 1-5-2-8-2-4 1-4 1z"></path><line x1="4" y1="22" x2="4" y2="15"></line></svg>
        <line x1="18" y1="20" x2="18" y2="10"/>
        <line x1="12" y1="20" x2="12" y2="4"/>
        <line x1="6" y1="20" x2="6" y2="14"/>       </svg>
      <span><?php echo $row['ctfname']; ?></span>
    </div>
    <ul class="nav-list">
      <li class="nav-list-item">
        <a class="nav-list-link" href="dashboard.php">
          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-columns"><path d="M12 3h7a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2h-7m0-18H5a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h7m0-18v18"/></svg>
          Dashboard
        </a>
      </li>
       <li class="nav-list-item">
        <a class="nav-list-link" href="teams.php">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-activity"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>
          Teams
        </a>
      </li>
       <li class="nav-list-item">
        <a class="nav-list-link" href="leader.php">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-activity"><rect x="18" y="3" width="4" height="18"></rect><rect x="10" y="8" width="4" height="13"></rect><rect x="2" y="13" width="4" height="8"></rect></svg>
          Leaderboard
        </a>
      </li>
      <li class="nav-list-item">
        <a class="nav-list-link" href="ctf.php">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-activity"><path d="M4 15s1-1 4-1 5 2 8 2 4-1 4-1V3s-1 1-4 1-5-2-8-2-4 1-4 1z"></path><line x1="4" y1="22" x2="4" y2="15"></line></svg>
          CTF
        </a>
      </li>
      <li class="nav-list-item">
        <a class="nav-list-link" href="../profile/index.php?uuid=<?php echo base64_encode($username); ?>">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-activity"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
          Profile Card
        </a>
      </li>
      <li class="nav-list-item">
        <a class="nav-list-link" href="award.php">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-activity"><circle cx="12" cy="8" r="7"></circle><polyline points="8.21 13.89 7 23 12 20 17 23 15.79 13.88"></polyline></svg>
          award
        </a>
      </li>
      <li class="nav-list-item active">
        <a class="nav-list-link" href="#">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-activity"><path d="M9.09 9a3 3 0 0 1 5.83 1c0 2-3 3-3 3"></path><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="17" x2="12" y2="17"></line></svg>
          support
        </a>
      </li>
      <?php 
      if (strcmp($row1['Admin'],"verified") == 0 ) {
        $_SESSION['UPLOAD'] = $username;
      ?>
      <li class="nav-list-item">
        <a class="nav-list-link" href="upload.php">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-activity"><path d="M3 17v3a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-3"></path><polyline points="16 6 12 2 8 6"></polyline><line x1="12" y1="2" x2="12" y2="16"></line></svg>
          Upload CTF
        </a>
      </li>
      <?php }?>    
       <li class="nav-list-item">
          <a class="nav-list-link" href="Rule.php">
              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-activity"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-bookmark"><path d="M19 21l-7-5-7 5V5a2 2 0 0 1 2-2h10a2 2 0 0 1 2 2z"></path></svg></svg>
                Rules
          </a>
          </li>
      <li class="nav-list-item">
        <a class="nav-list-link" href="logout.php">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-activity"><path d="M10 22H5a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h5"></path><polyline points="17 16 21 12 17 8"></polyline><line x1="21" y1="12" x2="9" y2="12"></line></svg>
          Logout
        </a>
      </li>
    </ul>
  </div>

  <div class="app-main">
  <div class="main-header-line">
      <h1>Contact Admin Support</h1>
      <label class='msg' style="color:#FFFFFF"><?php echo $msg ?></lable>
      </div>
    <div class="chart-container-wrapper small">
        <div class="chart-container">
        <form action="" method="POST">
      <div class="form-row">
        <div class="form-col">
      <label for="" style="color:#FFFFFF">USERNAME</label><br>
      <input class="form-control" id="disabledInput" type="text" name="uid" value="<?php echo $username; ?>" >
      </div>
      <div class="form-col">&nbsp;&nbsp;&nbsp;&nbsp;</div>
      <div class="form-col">
      <label for="" style="color:#FFFFFF">Email</label><br>
      <input class="form-control" id="disabledInput" type="text" name="email" value="<?php echo $row3['email'] ?>" >
      </div>
      </div>
      <div class="form-row"><br></div>
      <div class="form-row">
      <div class="form-col">
      <div class="form-group">
      <div class="form-group">
    <label for="exampleFormControlSelect1" style="color:#FFFFFF">CTF NAME</label>
    <select class="form-control" id="exampleFormControlSelect1" name="cname" >
    <?php

if ($sql4->num_rows > 0) {
  while($row4 = $sql4->fetch_assoc()) {
     ?>
      <option><?php echo ($row4['ctfname']); ?></option>
      <?php
         }
        }?>
    </select>
  </div>
      <div class="form-row">
      <label for="" style="color:#FFFFFF">Contact Subject</label><br>
      <input type="text" name="sub" class="form-control" placeholder="Problem while solving ctf" required >
      <small id="passwordHelpBlock" class="form-text text-muted">Make sure you write only the subject of the problem</small> </div>
      <div class="form-row"><br></div>
      <div class="form-row">
      <label for="" style="color:#FFFFFF">Message</label><br>
      <textarea class="form-control" id="exampleFormControlTextarea1" rows="4" name="msg" required></textarea>
      <small name="resource" class="form-text text-muted">Write your problem in deatils so admins can get back to you with solutions</small></div>
    </div>
    <div class="form-row"><br></div>
        <div class="g-recaptcha"  data-sitekey="6Lc23xcdAAAAAL1YQxDM01iUS29udCAG89Fnlb7B">
        </div>
    <div class="form-row"><br></div>
    <div class="form-row"> <button type="submit" class="btn btn-primary">SUBMIT</button></div>
      </div>
      </div>
      </form>
      </div> 
      </div>
      </div>
      
</div>
<!-- partial -->
  <script src='https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.js'>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </script><script  src="./script.js"></script>
  <script>
// When the user clicks on <div>, open the popup
</script>
</body>
</html>
