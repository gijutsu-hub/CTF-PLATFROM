<?php
$msg = "";
include('../../conn.php');
include('session.php');
if(isset($_GET['user'])){
$user = $_GET['user'];
$sql = mysqli_query($con,"SELECT * FROM team where tid = '$user'");
$row = mysqli_fetch_array($sql, MYSQLI_ASSOC);
$sql2 = mysqli_query($con,"SELECT userid FROM team where tid = '$user'");
}
else{
  header("location: ../../errorpage/404/index.html");
}
if(isset($_POST['action'])){
  $action = stripslashes($_POST['action']);
  $action = mysqli_real_escape_string($con, $action);
  $tname    = stripslashes($_POST['tname']);
  $tname    = mysqli_real_escape_string($con, $tname);
  $addname    = stripslashes($_POST['addname']);
  $addname    = mysqli_real_escape_string($con, $addname);

  if(strcmp($action,'delteam') == 0){
      $username    = stripslashes($_POST['username']);
  $username    = mysqli_real_escape_string($con, $username);
    mysqli_query($con,"DELETE FROM team WHERE tid = '$username'");
    mysqli_query($con,"DELETE FROM tpoints WHERE tid = '$username'");
    header("location: home.php");
    }

    if(strcmp($action,'add') == 0){ 
      $tname = $row['tname'];
      $tid = $row['tid'];
      $tlogo = $row['tlogo'];
      $tdesc = $row['tdesc'];
      mysqli_query($con,"INSERT INTO team (tname, tid, userid, tlogo, tdesc) VALUES('$tname', '$tid', '$addname', '$tlogo', '$tdesc')");
      header("location: tedit.php?user=".$user);
      }
  if(strcmp($action,'edit') == 0){
    mysqli_query($con,"UPDATE team SET tname = '$tname'  WHERE tid ='$user'");
  }
  if(strcmp($action,'delteam') == 0){
    mysqli_query($con,"DELETE FROM team  WHERE userid='$username'");
    header("location: team.php");
  }
  if(strcmp($action,'ban') == 0){
    if(strcmp($row['ban'],"FALSE")==0){
    mysqli_query($con,"UPDATE team SET ban = 'TRUE'  WHERE tid ='$user'");
    header("location: tedit.php?user=".$user);
    }
  else{
    mysqli_query($con,"UPDATE team SET ban = 'FALSE'  WHERE tid ='$user'");
    header("location: tedit.php?user=".$user);
  }
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
        <li class="nav-list-item">
        <a class="nav-list-link" href="event.php">
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
      <li class="nav-list-item ">
        <a class="nav-list-link" href="ctf.php">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-activity"><path d="M4 15s1-1 4-1 5 2 8 2 4-1 4-1V3s-1 1-4 1-5-2-8-2-4 1-4 1z"></path><line x1="4" y1="22" x2="4" y2="15"></line></svg>
          Challenges
        </a>
      </li>
      <li class="nav-list-item active">
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
      <h1>Team update</h1>
      <label class='msg' style="color:#FFFFFF"><?php $msg ?></lable>
      </div>
    <div class="chart-container-wrapper small">
        <div class="chart-container">
        <form action="" method="POST">
      <div class="form-row">
        <div class="form-col">
      <label for="" style="color:#FFFFFF">Team id</label><br>
      <input class="form-control" id="disabledInput" type="text" value="<?php echo $row['tid'] ?>" disabled>
      </div>
      <div class="form-col">&nbsp;&nbsp;</div>
      <div class="form-col">
      <label for="" style="color:#FFFFFF">Team name</label><br>
      <input class="form-control" id="disabledInput" name="tname" type="text" value="<?php echo $row['tname'] ?>" >
      </div>
      <div class="form-col">&nbsp;&nbsp;</div>
      <div class="form-col">
      <label for="" style="color:#FFFFFF">Team Member</label><br>
      <input type="number" class="form-control" value="<?php echo (mysqli_num_rows($sql)); ?>" disabled>
      </div>
      </div>
      <div class="form-row"><br></div>
      <div class="form-row">
      <label for="" style="color:#FFFFFF">Add username</label><br>
      <input type="text" name="addname" class="form-control" placeholder="Enter username" ?>" >
      <small name="resource" class="form-text text-muted">Enter Username that you wanted to be in team</small></div>
      <div class="form-row"><br></div>
     <div class="form-row">
      <div class="form-col">
      <div class="form-group">
      <label for="" style="color:#FFFFFF">DELET USER</label><br>
      <?php

if ($sql2->num_rows > 0) {
  while($row2 = $sql2->fetch_assoc()) {
     ?>
     <div class="form-check form-check-inline">
  <input class="form-check-input" type="checkbox" name="username" id="inlineCheckbox1" value="<?php echo $row2['userid']; ?>">
  <label class="form-check-label" for="inlineCheckbox1" style="color:#FFFFFF"><?php echo $row2['userid']; ?></label>
  </div>
  <?php
         }
        }?>
</div> 
<label for="" style="color:#FFFFFF">Team Ban information</label><br>
      <div class="form-check form-check-inline">
  <input class="form-check-input" type="checkbox" name="type" id="inlineCheckbox1" value="TRUE" <?php if(strcmp($row['ban'],"FALSE") != 0){echo 'checked';}else{echo "disabled";} ?>>
  <label class="form-check-label" for="inlineCheckbox1" style="color:#FFFFFF" >TRUE</label>
</div>
<div class="form-check form-check-inline">
  <input class="form-check-input" type="checkbox" name="type" id="inlineCheckbox2" value="FALSE" <?php if(strcmp($row['ban'],"FALSE") == 0){echo 'checked';}else{echo "disabled";} ?>>
  <label class="form-check-label" for="inlineCheckbox2" style="color:#FFFFFF">FALSE</label>
</div>
  </div>
      </div>
<div class="form-row"><br></div>
     <div class="form-row">
      <div class="form-col">
      <div class="form-group">
      <label for="" style="color:#FFFFFF">ACTION AGAINST TEAM</label><br>
     <div class="form-check form-check-inline">
  <input class="form-check-input" type="checkbox" name="action" id="inlineCheckbox1" value="del">
  <label class="form-check-label" for="inlineCheckbox1" style="color:#FFFFFF">Delete</label>
  </div>
  <div class="form-check form-check-inline">
  <input class="form-check-input" type="checkbox" name="action" id="inlineCheckbox1" value="add">
  <label class="form-check-label" for="inlineCheckbox1" style="color:#FFFFFF">add</label>
  </div>
  <div class="form-check form-check-inline">
  <input class="form-check-input" type="checkbox" name="action" id="inlineCheckbox1" value="edit">
  <label class="form-check-label" for="inlineCheckbox1" style="color:#FFFFFF">Edit</label>
      </div>
      <div class="form-check form-check-inline">
  <input class="form-check-input" type="checkbox" name="action" id="inlineCheckbox3" value="ban" >
  <label class="form-check-label" for="inlineCheckbox3" style="color:#FFFFFF">Ban </label>
</div>
  <div class="form-check form-check-inline">
  <input class="form-check-input" type="checkbox" name="action" id="inlineCheckbox1" value="delteam">
  <label class="form-check-label" for="inlineCheckbox1" style="color:#FFFFFF">Delete Team</label>
      </div>
  </div>
      </div>
      <div class="form-col">&nbsp;&nbsp;</div>
      <div class="form-col"><br>
      <button type="submit" class="btn btn-primary">SUBMIT</button>
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
