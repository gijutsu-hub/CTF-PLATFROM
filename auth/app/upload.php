<?php
include('../conn.php');
function generateRandomString($length = 6) {
  return substr(str_shuffle(str_repeat($x='0123456789ABCDEFGHIJKLMNOPQRSTU', ceil($length/strlen($x)) )),1,$length);
} 
$id = generateRandomString();
setcookie('ccode', $id);
session_start();
if(isset($_SESSION['UPLOAD'])){
  $username = $_SESSION['UPLOAD'];
  $sql1 = mysqli_query($con,"SELECT * FROM evedetails");
  $row1 = mysqli_fetch_array($sql1, MYSQLI_ASSOC);
  $sqlz = mysqli_query($con,"SELECT * FROM usdetails where userid  = '$username'");
  $rowz = mysqli_fetch_array($sqlz, MYSQLI_ASSOC);

}
else{
  header("location: ../errorpage/404/index.html");
}

?>
<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title><?php echo $row1['ctfname']; ?> CTF upload</title>
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
       <li class="nav-list-item">
        <a class="nav-list-link" href="leader.php">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-activity"><rect x="18" y="3" width="4" height="18"></rect><rect x="10" y="8" width="4" height="13"></rect><rect x="2" y="13" width="4" height="8"></rect></svg>
          Leaderboard
        </a>
      </li>
      <li class="nav-list-item ">
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
      ?>
      <li class="nav-list-item active">
        <a class="nav-list-link" href="upload.php">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-activity"><path d="M3 17v3a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-3"></path><polyline points="16 6 12 2 8 6"></polyline><line x1="12" y1="2" x2="12" y2="16"></line></svg>
          Upload CTF
        </a>
      </li>
      <?php }?> 
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
      <h1>CTF UPLOAD PORTAL</h1>
      <?php if (isset($_SESSION['msg'])): ?>
    <?php foreach($_SESSION['msg'] as $msg): ?>
      <label class='msg' style="color:#FFFFFF"><?php echo $msg ?></lable>
    <?php endforeach; ?>
    <?php endif; ?>
      </div>
    <div class="chart-container-wrapper small">
        <div class="chart-container">
        <form action="submit.php" method="POST">
      <div class="form-row">
        <div class="form-col">
      <label for="" style="color:#FFFFFF">USERNAME</label><br>
      <input class="form-control" id="disabledInput" type="text" placeholder="<?php echo $username ?>" disabled>
      </div>
      <div class="form-col">&nbsp;&nbsp;</div>
      <div class="form-col">
      <label for="" style="color:#FFFFFF">CTF ID</label><br>
      <input class="form-control" id="disabledInput" type="text" placeholder="<?php echo $id ?>" disabled>
      </div>
      <div class="form-col">&nbsp;&nbsp;</div>
      <div class="form-col">
      <label for="" style="color:#FFFFFF">CTF POINTS</label><br>
      <input type="number" name="points" class="form-control" required>
      </div>
      </div>
      <div class="form-row"><br></div>
      <div class="form-row">
      <label for="" style="color:#FFFFFF">CTF NAME</label><br>
      <input type="text" name="name" class="form-control" required>
      <small id="passwordHelpBlock" class="form-text text-muted">CTF name should be attractive and relate to the CTF that has been Created </small></div>
      <div class="form-row"><br></div>
      <div class="form-row">
      <label for="" style="color:#FFFFFF">CTF Resource</label><br>
      <input type="text" name="resource" class="form-control" required>
      <small name="resource" class="form-text text-muted">Insert the upload file link or the server ip where the ctf is hosted</small></div>
      <div class="form-row"><br></div>
      <div class="form-row">
      <div class="form-col">
      <div class="form-group">
      <label for="" style="color:#FFFFFF">Flag Type</label><br>
      <div class="form-check form-check-inline">
  <input class="form-check-input" type="checkbox" name="ft" id="inlineCheckbox1" value="True">
  <label class="form-check-label" for="inlineCheckbox1" style="color:#FFFFFF">dynamic</label>
</div>
<div class="form-check form-check-inline">
  <input class="form-check-input" type="checkbox" name="ft" id="inlineCheckbox2" value="Flase">
  <label class="form-check-label" for="inlineCheckbox2" style="color:#FFFFFF">static</label>
</div>
    </div>
    <div class="form-row"><br></div>
      <div class="form-row">
      <label for="" style="color:#FFFFFF">CTF FLAG</label><br>
      <input type="text" name="flag" class="form-control" required>
      <small id="passwordHelpBlock" class="form-text text-muted">FLAG FORMATE MUST BE XXXX{XXXX-XXXX-XXXX-XXXX}</small></div>
      <div class="form-row"><br></div>
      <div class="form-row">
      <label for="" style="color:#FFFFFF">CTF Description</label><br>
      <input type="text" name="desc" class="form-control" required>
      <small id="passwordHelpBlock" class="form-text text-muted">NOT MORE THAN 225 CHARACTERS</small>      
      </div>
      <div class="form-row"><br></div>
      <div class="form-row">
      <div class="form-col">
      <div class="form-group">
      <label for="" style="color:#FFFFFF">Scoring Type</label><br>
      <div class="form-check form-check-inline">
  <input class="form-check-input" type="checkbox" name="st" id="inlineCheckbox1" value="True">
  <label class="form-check-label" for="inlineCheckbox1" style="color:#FFFFFF">dynamic</label>
</div>
<div class="form-check form-check-inline">
  <input class="form-check-input" type="checkbox" name="st" id="inlineCheckbox2" value="Flase">
  <label class="form-check-label" for="inlineCheckbox2" style="color:#FFFFFF">static</label>
</div>
    </div>
    <label for="" style="color:#FFFFFF">Minimun point</label><br>
      <input type="number" name="min" class="form-control" required>
      <small id="passwordHelpBlock" class="form-text text-muted">If dynamic only please mention minimun point</small>      
      <label for="" style="color:#FFFFFF">Minimun point</label><br>
      <input type="number" name="min" class="form-control" required>
      <small id="passwordHelpBlock" class="form-text text-muted">If dynamic only please mention minimun point</small>
      <div class="form-row"><br></div>
      <label for="" style="color:#FFFFFF">Threashold point</label><br>
      <input type="number" name="tpoint" class="form-control" required>
      <small id="passwordHelpBlock" class="form-text text-muted">The threashold value of point</small>      
  </div>
</div>
      <div class="form-row"><br></div>
      <div class="form-row">
      <div class="form-col">
      <div class="form-group">
      <label for="" style="color:#FFFFFF">CTF TYPE</label><br>
      <div class="form-check form-check-inline">
  <input class="form-check-input" type="checkbox" name="type" id="inlineCheckbox1" value="web">
  <label class="form-check-label" for="inlineCheckbox1" style="color:#FFFFFF">WEB</label>
</div>
<div class="form-check form-check-inline">
  <input class="form-check-input" type="checkbox" name="type" id="inlineCheckbox2" value="crypto">
  <label class="form-check-label" for="inlineCheckbox2" style="color:#FFFFFF">CRYPTO</label>
</div>
<div class="form-check form-check-inline">
  <input class="form-check-input" type="checkbox" name="type" id="inlineCheckbox3" value="reverse" >
  <label class="form-check-label" for="inlineCheckbox3" style="color:#FFFFFF">REVERSE</label>
</div>
<div class="form-check form-check-inline">
  <input class="form-check-input" type="checkbox" name="type" id="inlineCheckbox3" value="binary" >
  <label class="form-check-label" for="inlineCheckbox3" style="color:#FFFFFF">BINARY</label>
</div>
<div class="form-check form-check-inline">
  <input class="form-check-input" type="checkbox" name="type" id="inlineCheckbox3" value="forensic" >
  <label class="form-check-label" for="inlineCheckbox3" style="color:#FFFFFF">FORENSIC</label>
</div>
<div class="form-check form-check-inline">
  <input class="form-check-input" type="checkbox" name="type" id="inlineCheckbox3" value="general" >
  <label class="form-check-label" for="inlineCheckbox3" style="color:#FFFFFF">GENERAL</label>
</div>
<div class="form-check form-check-inline">
  <input class="form-check-input" type="checkbox" name="type" id="inlineCheckbox3" value="pwn" >
  <label class="form-check-label" for="inlineCheckbox3" style="color:#FFFFFF">PWN</label>
</div>
  </div>
      </div>
      <div class="form-col">&nbsp;&nbsp;</div>
      <div class="form-col">      </div>
      </div>
      <div class="form-row">
      <div class="form-col">
      <div class="form-group">
      <label for="" style="color:#FFFFFF">CTF LEVEL</label><br>
      <div class="form-check form-check-inline">
  <input class="form-check-input" type="checkbox" name="level" id="inlineCheckbox1" value="EASY">
  <label class="form-check-label" for="inlineCheckbox1" style="color:#FFFFFF">EASY</label>
</div>
<div class="form-check form-check-inline">
  <input class="form-check-input" type="checkbox" name="level" id="inlineCheckbox2" value="MEDIUM">
  <label class="form-check-label" for="inlineCheckbox2" style="color:#FFFFFF">MEDIUM</label>
</div>
<div class="form-check form-check-inline">
  <input class="form-check-input" type="checkbox" name="level" id="inlineCheckbox3" value="HARD" >
  <label class="form-check-label" for="inlineCheckbox3" style="color:#FFFFFF">HARD</label>
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
