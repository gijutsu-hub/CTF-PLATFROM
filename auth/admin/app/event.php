<?php
$msg = "";
include('../../conn.php');
include('session.php');
if(isset($_POST['btn1'])){
  $name    = stripslashes($_POST['ename']);
  $name    = mysqli_real_escape_string($con, $name);
  $edesc    = stripslashes($_POST['edesc']);
  $edesc    = mysqli_real_escape_string($con, $edesc);
  $oname    = stripslashes($_POST['oname']);
  $oname    = mysqli_real_escape_string($con, $oname);
  $odesc    = stripslashes($_POST['odesc']);
  $odesc    = mysqli_real_escape_string($con, $odesc);
  $maxno    = stripslashes($_POST['maxno']);
  $maxno    = mysqli_real_escape_string($con, $maxno);
  mysqli_query($con,"UPDATE evedetails SET ctfname='$name',ctfdesc='$edesc',orgnizer='$oname',orgnizerdeta='$odesc',teamsz='$maxno'");
  $msg = "Successfully updated the event";
}
if(isset($_POST['btn2'])){
  $action = $_POST['action'];
  if(strcmp($action,"stop")==0){
    mysqli_query($con,"UPDATE start SET value ='TRUE'");
    $msg = "Successfully updated the time";
  }
  else{
    mysqli_query($con,"UPDATE start SET value ='FALSE'");
    $msg = "Successfully update the time";
  }
}
if(isset($_POST['btn3'])){
  $emails    = stripslashes($_POST['emails']);
  $emails    = mysqli_real_escape_string($con, $emails);
  mysqli_query($con,"INSERT into veriemails (domains) VALUES ('$emails')");
   $msg = "Successfully update the domain";
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
        <span>ADMIN</span>
    </div>
    <ul class="nav-list">
    <li class="nav-list-item active">
        <a class="nav-list-link" href="#">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-activity"><path d="M22 19a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h5l2 3h9a2 2 0 0 1 2 2z"></path></svg>
          Events
        </a>
</li>
      <li class="nav-list-item">
        <a class="nav-list-link" href="home.php">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-activity"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
          Users
        </a>
      </li>
      <li class="nav-list-item">
        <a class="nav-list-link" href="ctf.php">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-activity"><path d="M4 15s1-1 4-1 5 2 8 2 4-1 4-1V3s-1 1-4 1-5-2-8-2-4 1-4 1z"></path><line x1="4" y1="22" x2="4" y2="15"></line></svg>
          Challenges
        </a>
      </li>
      <li class="nav-list-item">
        <a class="nav-list-link" href="team.php">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-activity"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>
          Team
        </a>
      </li>
      <li class="nav-list-item">
        <a class="nav-list-link" href="award.php">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-activity"><circle cx="12" cy="8" r="7"></circle><polyline points="8.21 13.89 7 23 12 20 17 23 15.79 13.88"></polyline></svg>
          award
        </a>
      </li>

      <li class="nav-list-item">
        <a class="nav-list-link" href="contact.php">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-activity"><path d="M9.09 9a3 3 0 0 1 5.83 1c0 2-3 3-3 3"></path><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="17" x2="12" y2="17"></line></svg>
          support
        </a>
      </li>
      <li class="nav-list-item ">
        <a class="nav-list-link" href="mail.php">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-activity"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path><polyline points="22,6 12,13 2,6"></polyline></svg>
          Mail
        </a>
      </li>
      <li class="nav-list-item ">
        <a class="nav-list-link" href="activity.php">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-activity"><polyline points="22 12 18 12 15 21 9 3 6 12 2 12"></polyline></svg>
          Activity
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
      <h1>CTF Event</h1>
      <label class='msg' style="color:#FFFFFF"><?php echo $msg ?></lable>
      </div>
    <div class="chart-container-wrapper small">
        <div class="chart-container">
        <form action="" method="POST">
      <div class="form-row">
      <label for="" style="color:#FFFFFF">CTF Name</label><br>
      <input type="text" class="form-control" name = "ename" placeholder="CTF NAME" >
      <small name="resource" class="form-text text-muted">Tell the event name which should be the ctf name</small></div>
      <div class="form-row"><br></div>
      <div class="form-row">
      <label for="" style="color:#FFFFFF">CTF Description</label><br>
      <input type="text" class="form-control" name="edesc" placeholder="CTF Details">
      <small name="resource" class="form-text text-muted">Give the ctf description which should be the ctf description</small></div>
      <div class="form-row"><br></div>
      <div class="form-row">
      <label for="" style="color:#FFFFFF">Event Oragnizer</label><br>
      <input type="text" class="form-control" name="oname" placeholder="Organizer Name">
      <small name="resource" class="form-text text-muted">Tell the organizer name which should be the ctf </small></div>
      <div class="form-row"><br></div>
      <div class="form-row">
      <label for="" style="color:#FFFFFF">Event Description</label><br>
      <input type="text" class="form-control" name="odesc" placeholder="Organizer Details" >
      <small name="resource" class="form-text text-muted">Tell the organizer details which should be the ctf </small></div>
      <div class="form-row"><br></div>
      <div class="form-row">
      <label for="" style="color:#FFFFFF">Maxmiun Team Member</label><br>
      <input type="number" class="form-control" name="maxno" placeholder="1,2.3...." >
      <small name="resource" class="form-text text-muted">Tell the max no details which should be the ctf </small></div>
      <div class="form-row"><br></div>
      <div class="form-col"><br>
      <button type="submit" class="btn btn-primary" name="btn1" >SUBMIT</button>
      <div class="form-row"><br></div>
      <div class="form-row">
      <div class="form-col">
      <div class="form-group">
      <label for="" style="color:#FFFFFF">Stop the ctf</label><br>
      <div class="form-check form-check-inline">
  <input class="form-check-input" type="checkbox" name="action" id="inlineCheckbox1" value="stop">
  <label class="form-check-label" for="inlineCheckbox1" style="color:#FFFFFF">Stop</label>
</div>
<div class="form-check form-check-inline">
  <input class="form-check-input" type="checkbox" name="action" id="inlineCheckbox2" value="start">
  <label class="form-check-label" for="inlineCheckbox2" style="color:#FFFFFF">Start</label>
</div>
  </div>
      </div>
      <div class="form-col">&nbsp;&nbsp;</div>
      <div class="form-col"><br>
      <button type="submit" class="btn btn-primary" name="btn2">SUBMIT</button>
      </div>
      </div>
      </form>
       <form action="" method="POST">
      <div class="form-row"><br></div>
      <label for="" style="color:#FFFFFF">Email Verification Needed</label><br>
      <div class="input-group input-group-lg mb-3">
  <input type="text" name="emails" class="form-control" placeholder="domain.com" aria-label="Search challenge" aria-describedby="basic-addon2">
  <div class="input-group-append">
  <button type="submit" class="btn btn-primary" name="btn3">submit</button>
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
