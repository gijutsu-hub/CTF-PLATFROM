<?php
include('session.php');
include('../conn.php');
header('Refresh: 40; URL=#');
$id = stripslashes($_GET['id']);
$id = base64_decode($id);
$id = mysqli_real_escape_string($con, $id);
$sql9 = mysqli_query($con,"SELECT * FROM solve where username  = '$username' AND challengeid ='$id' ");
$sqlzrsd = mysqli_query($con,"SELECT * FROM tsolve where cid = '$id' ORDER BY time");
if($sql9->num_rows == 0){
$msg = "FLags are case sesnstive please make sure you enter the exact value that you get in after solving the challenge otherwise it might caused an issue";
$sql3 = mysqli_query($con,"SELECT * FROM ctfch where challengeid = '$id'");
$row3 = mysqli_fetch_array($sql3, MYSQLI_ASSOC);
$sql1 = mysqli_query($con,"SELECT * FROM evedetails");
$row1 = mysqli_fetch_array($sql1, MYSQLI_ASSOC);
$sql5 = mysqli_query($con,"SELECT * FROM solve WHERE challengeid = '$id' AND username = '$username'");
$sqlz = mysqli_query($con,"SELECT * FROM usdetails where userid  = '$username'");
$sqla = mysqli_query($con,"SELECT * FROM team where userid  = '$username'");
$rowc = mysqli_fetch_array($sqla, MYSQLI_ASSOC);
$sqlb = mysqli_query($con,"SELECT * FROM start ");
$rowb = mysqli_fetch_array($sqlb, MYSQLI_ASSOC);
$isstop = $rowb['value'];
$teamname = $rowc['tname'];
$sqlzas = mysqli_query($con,"SELECT * FROM team where userid  = '$username'");
$sdf = mysqli_query($con,"SELECT * FROM tsolve WHERE tid = '$teamname' and cid = '$id'");
$rowz = mysqli_fetch_array($sqlz, MYSQLI_ASSOC);
$rowzas = mysqli_fetch_array($sqlzas, MYSQLI_ASSOC);
if ((mysqli_num_rows($sql5)) == 0) {
if(isset($_POST['flag'])){
$flag = stripslashes($_POST['flag']);
$flag = mysqli_real_escape_string($con, $flag);
$sql = "select *from ctfch where flag = '$flag' and challengeid ='$id' ";  
$result = mysqli_query($con, $sql);   
$count = mysqli_num_rows($result);
$cid = $row3["challengeid"];
$jwt = $row3["jwt"];
$type = $row3["type"];
$tscore = $row3['thrpoint'];
$minpt = $row3['minpt'];
$point = $row3['point'];
$scoring = $row3["scorning"];
if($sdf->num_rows == 0){
if($sql9->num_rows == 0){ 
  if(strcmp($rowzas['ban'],"FALSE") == 0){
if(strcmp($rowz['ban'],"FLASE") == 0){
  if(strcmp($scoring,"TRUE") == 0){      
    $point = $point - $tscore;
  if($point >= $minpt){
    mysqli_query($con,"UPDATE ctfch SET point=point-thrpoint WHERE challengeid='$cid'");
  }
  else{
      $point = $point;
  }
  }
  if(strcmp($isstop,"FALSE")==0){

if($count == 1){
    mysqli_query($con,"UPDATE usrctf SET solved=solved+1 WHERE username='$username'");
    mysqli_query($con,"UPDATE ctfch SET solve=solve+1 WHERE challengeid='$cid'");
    mysqli_query($con,"UPDATE usrctf SET point=point+'$point' WHERE username='$username'");
    $sql4 = mysqli_query($con,"SELECT * FROM team where userid = '$username'");
    $row4 = mysqli_fetch_array($sql4, MYSQLI_ASSOC);
    $tname = $row4['tname'];
    mysqli_query($con,"UPDATE tpoints SET tpoints=tpoints+'$point' WHERE tname='$tname'");
    mysqli_query($con,"INSERT INTO tsolve (tid, cid, userid) VALUES ('$teamname','$cid','$username' )");
    mysqli_query($con,"INSERT INTO solve (username, challengeid, challengetype) VALUES ('$username','$id','$type' )");
    if(!empty($jwt)){
      $value = null;
      mysqli_query($con,"UPDATE ctfch SET flag='$value' WHERE challengeid='$cid'");
    }
    $link = $rowz['proflink'];
    $hacked = "Success fully solved".$row3["ctfname"];
    mysqli_query($con,"INSERT INTO achivment (userid, achivement, achivementdesc, link) VALUES ('$username', 'Solved CTF', '$hacked','$link')");
    $msg = "Wo you have successfully hacked my system, Congrats you have a good brain";
    unset($_COOKIE['login']);
}
else
{
$msg = "Invalid flag please try again later buddy, you can't find me";
}
}
else{
  $msg = "CTF IS OVER YOU CAN'T SUBMIT FLAG";
}

}else{
  $msg = "Account banned by admin";
}
}else{
  $msg = "Team banned by admin";
}
}else{
  $msg = "you have solve the challenge";
}
}
else{
  $msg = "Team member have already solve the challenge";
}
}
}
else{
  header("location: ctf.php");
}
}
else{
  header("location: ctf.php");
}
?>
<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title><?php echo $row1['ctfname']; ?> Dashboard</title>
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
      <span><?php echo $row1['ctfname']; ?></span>
    </div>
    <ul class="nav-list">
      <li class="nav-list-item ">
        <a class="nav-list-link" href="dashboard.php">
          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-columns"><path d="M12 3h7a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2h-7m0-18H5a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h7m0-18v18"/></svg>
          Dashboard
        </a>
      </li>
      <li class="nav-list-item ">
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
      <li class="nav-list-item active">
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
      <li class="nav-list-item">
        <a class="nav-list-link" href="connect.php">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-activity"><path d="M9.09 9a3 3 0 0 1 5.83 1c0 2-3 3-3 3"></path><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="17" x2="12" y2="17"></line></svg>
          support
        </a>
      </li>
      <?php 
      if (strcmp($rowz['Admin'],"verified") == 0 ) {
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
        <a class="nav-list-link" href="#">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-activity"><path d="M10 22H5a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h5"></path><polyline points="17 16 21 12 17 8"></polyline><line x1="21" y1="12" x2="9" y2="12"></line></svg>
          Logout
        </a>
      </li>
    </ul>
  </div>
  <div class="app-main">
       <div class="chart-row three">
      <div class="chart-container-wrapper">
        <div class="chart-container">
          <div class="chart-info-wrapper">
            <h2>Total Solved</h2>
            <span><?php echo $row3["solve"];?></span>
          </div>
          <div class="chart-svg">
            <svg viewBox="0 0 36 36" class="circular-chart pink">
      <path class="circle-bg" d="M18 2.0845
          a 15.9155 15.9155 0 0 1 0 31.831
          a 15.9155 15.9155 0 0 1 0 -31.831"></path>
      <path class="circle" stroke-dasharray="100, 100" d="M18 2.0845
          a 15.9155 15.9155 0 0 1 0 31.831
          a 15.9155 15.9155 0 0 1 0 -31.831"></path>
      <text x="18" y="20.35" class="percentage"><?php echo($row3["solve"])?>%</text>
    </svg>
          </div>
        </div>
      </div>
       <div class="chart-container-wrapper">
        <div class="chart-container">
          <div class="chart-info-wrapper">
            <h2>Total Points</h2>
            <span><?php echo $row3["point"];?></span>
          </div>
          <div class="chart-svg">
            <svg viewBox="0 0 36 36" class="circular-chart blue">
      <path class="circle-bg" d="M18 2.0845
          a 15.9155 15.9155 0 0 1 0 31.831
          a 15.9155 15.9155 0 0 1 0 -31.831"></path>
      <path class="circle" stroke-dasharray="100, 100" d="M18 2.0845
          a 15.9155 15.9155 0 0 1 0 31.831
          a 15.9155 15.9155 0 0 1 0 -31.831"></path>
      <text x="18" y="20.35" class="percentage"><?php echo($row3["point"]) ?></text>
    </svg>
          </div>
        </div>
      </div>
       <div class="chart-container-wrapper">
        <div class="chart-container">
          <div class="chart-info-wrapper">
            <h2>Threshold Points</h2>
            <span><?php echo($row3["thrpoint"]) ?></span>
          </div>
           <div class="chart-svg">
            <svg viewBox="0 0 36 36" class="circular-chart orange">
      <path class="circle-bg" d="M18 2.0845
          a 15.9155 15.9155 0 0 1 0 31.831
          a 15.9155 15.9155 0 0 1 0 -31.831"></path>
      <path class="circle" stroke-dasharray="100, 100" d="M18 2.0845
          a 15.9155 15.9155 0 0 1 0 31.831
          a 15.9155 15.9155 0 0 1 0 -31.831"></path>
      <text x="18" y="20.35" class="percentage"><?php echo($row3["thrpoint"]) ?></text>
    </svg>
          </div>
        </div>
      </div>
    </div>
    <div class="chart-container-wrapper small">
         <h5 style="color:#FFFFFF">Challenging Description Box</h5>
        <div class="chart-container">
        <ul>
        <li><h4 style="color:#FFFFFF">Challenge Name  :  <?php echo $row3["ctfname"]?></h4></li></a><br>
        <li><h5 style="color:#FFFFFF">Challenge owner  :  <?php echo $row3["createdby"]?></h5></li><br>
        <li><h5 style="color:#FFFFFF">Release date  : <?php echo $row3["time"]?></h4></li><br>
        <li><h5 style="color:#FFFFFF">Dificuilty  : <?php echo $row3["level"]?></h5></li><br>
        <li><h5 style="color:#FFFFFF">Points : <?php echo $row3["point"]?></h5></li><br>
        <script type="text/javascript">
        </script>
        <li><h5 style="color:#FFFFFF">Resource  : <a href = "click.php?id=<?php echo $id?>" target="_blank"> Click to view resources</a></h5><li><br>
        <li><h5 style="color:#FFFFFF">Description  : <?php echo $row3["description"]?> </h5></li><br>
      </div>
      <br>
       <h5 style="color:#FFFFFF">Flag Submit box</h5>
      <div class="chart-container" <?php if(isset($_COOKIE['Showme'])){
      $dest=$_COOKIE['Showme']; if(strcmp($id,$dest)==0){?>>
        <ul>
      <li><h4 style="color:#FFFFFF">Submit Flag</h4></li>
      <form action="" method="POST">
      <label for="" style="color:#FFFFFF">Flag Format DAMNCON{XXXX-XXXX-XXXX-XXXX}</label><br>
      <input type="text" name="flag" class="form-control" >
      <small id="passwordHelpBlock" class="form-text text-muted">
        <?php echo $msg; ?>
        </small><br>
      <button type="submit" class="btn btn-primary">Submit</button>
</form>

      <?php }else{?>
        <li><h4 style="color:#FFFFFF">After 10% solving on the challege the submission portal will open</h4></li>
      <?php }}
      else{
        ?>
      <li><h4 style="color:#FFFFFF">After 10% solving on the challege the submission portal will open</h4></li>
      <?php } ?>
      </div>
      <br>

        
</div>
</div>
   


</div>
<!-- partial -->
  <script src='https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.js'>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </script>
</body>
</html>
