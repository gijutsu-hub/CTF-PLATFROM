<?php
include('../../conn.php');
include('session.php');
$msg = "";
if(isset($_POST['id'])){
  $id = $_POST['id'];
  if(strcmp($id,"User logs of submiting the flags")==0){
    $sql = mysqli_query($con,"SELECT * FROM solve ");
  }
  elseif(strcmp($id,"Team logs of submitting the flags")==0){
    $sql = mysqli_query($con,"SELECT * FROM tsolve ");
  }
  elseif(strcmp($id,"Generate Result")==0){
    $_SESSION['download'] = $id;
    include_once('../api/result.php');
    $sql = mysqli_query($con,"SELECT * FROM result ORDER BY point DESC ");
    $msg = '<a href = "../api/downloadre.php" target="_blank"> Download Result</a>';
  }
}
?>
<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Admin Dashboard</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
<link rel="stylesheet" href="./style.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

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
      <li class="nav-list-item">
        <a class="nav-list-link" href="#">
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
      <li class="nav-list-item active ">
        <a class="nav-list-link" href="#">
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
      <h2 style="color:#FFFFFF">Activity of ctf</h2>
      <label class='msg' style="color:#FFFFFF size:30px"><?php echo $msg ?></lable>
</div>
    <div class="chart-container-wrapper small">
        <div class="chart-container">
        <form action="" method="POST">
        <div class="input-group input-group-lg mb-3">
        <select class="form-control" id="exampleFormControlSelect1" name="id">
      <option>User logs of submiting the flags</option>
      <option>Team logs of submitting the flags</option>
      <option>Generate Result</option>
    </select>
  <div class="input-group-append">
  <button type="submit" class="btn btn-primary">Submit</button>
  </div>
</div>
</form>
        </div>
  <div class="chart-container-wrapper small ">
        <div class="chart-container">
        <table class="table table-dark">
  <thead>
    <?php 
    if(isset($_POST['id'])){
    if(strcmp($id,"User logs of submiting the flags")==0){?>
       <tr>
      <th scope="col">Time</th>
      <th scope="col">Username</th>
      <th scope="col">Challenge</th>
      <th scope="col">Challenge Type</th>
    </tr>
    <?php
    }elseif(strcmp($id,"Team logs of submitting the flags")==0){ ?>
       <tr>
      <th scope="col">Time</th>
      <th scope="col">Team Name</th>
      <th scope="col">Challenge id</th>
      <th scope="col">user id</th>
    </tr>
    <?php }elseif(strcmp($id,"Generate Result")==0){ ?>
      <tr>
      <th scope="col">Name</th>
      <th scope="col">Userid</th>
      <th scope="col">Email</th>
      <th scope="col">Point</th>
    </tr>
    <?php } }else{?>
      <tr>
      <th scope="col">Select a action above</th>
    </tr>
      <?php } ?>

  </thead>
  <tbody>
  <?php 
    if(isset($_POST['id'])){
    if(strcmp($id,"User logs of submiting the flags")==0){?>
    <?php if ($sql->num_rows > 0) {
  while($row = $sql->fetch_assoc()) {
     ?>
    <tr>
      <td><?php echo $row['time']; ?></td>
      <td><?php echo $row['username']; ?></td>
      <td><?php echo $row['challengeid']; ?></td>
      <td><?php echo $row['challengetype']; ?></td>
    </tr>
    <?php
         }
        }?>
    <?php
    }elseif(strcmp($id,"Team logs of submitting the flags")==0){ ?>
        <?php if ($sql->num_rows > 0) {
  while($row = $sql->fetch_assoc()) {
     ?>
    <tr>
      <td><?php echo $row['time']; ?></td>
      <td><?php echo $row['tid']; ?></td>
      <td><?php echo $row['cid']; ?></td>
      <td><?php echo $row['userid']; ?></td>
    </tr>
    <?php
         }
        }?>
    <?php }elseif(strcmp($id,"Generate Result")==0){ ?>
      <?php if ($sql->num_rows > 0) {
  while($row = $sql->fetch_assoc()) {
     ?>
    <tr>
      <td><?php echo $row['Name']; ?></td>
      <td><?php echo $row['userid']; ?></td>
      <td><?php echo $row['email']; ?></td>
      <td><?php echo $row['point']; ?></td>
    </tr>
    <?php
         }
        }?>
    <?php } }else{?>
      <tr>
      <th scope="col">Select a action above</th>
    </tr>
      <?php } ?>
    </tbody>

</table>
        </div>
        
</div>
<!-- partial -->
  <script src='https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.js'>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </script><script  src="./script.js"></script>
  <script>
// When the user clicks on <div>, open the popup
</script>
</body>
</html>
