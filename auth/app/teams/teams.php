<?php
$msg = "";
session_start();
include('../../conn.php'); 
include '../../mail.php';      
if(!empty($_SESSION['login'])){
  $username = $_SESSION['login'];
  
function checkUser($username, $con){
  $sql = mysqli_query($con,"SELECT * FROM team WHERE userid='$username'");    
      if (mysqli_num_rows($sql) == 0) {
          return true;
      }    
      return false;
}
function checkteam($code, $con){
  $sql = mysqli_query($con,"SELECT tname FROM team WHERE tid = '$code'");
  $sql1 = mysqli_query($con,"SELECT * FROM evedetails");
  $row = mysqli_fetch_array($sql1, MYSQLI_ASSOC);
  
      if (mysqli_num_rows($sql) != $row['teamsz'] ) {
          return true;
      }    
      return false;

}
function tcode($code, $con){
  $sql = mysqli_query($con,"SELECT * FROM team WHERE tid = '$code'");
  if(mysqli_num_rows($sql) != 0){
    return true;
  }
  return false;
}
function add($code, $username, $con){
  $sql = mysqli_query($con,"SELECT * FROM team WHERE tid = '$code'");
  $row = mysqli_fetch_array($sql, MYSQLI_ASSOC);

  $name = $row['tname'];
  $logo = $row['tlogo'];
  $desc = $row['tdesc'];

  $sql = mysqli_query($con,"INSERT into team (tname, tid, userid, tlogo, tdesc) VALUES ('$name', '$code', '$username','$logo','$desc' )");
  if($sql){
    return true;
  }
  return false;

}
$user = checkUser($username, $con);
  if($user){
    if(!empty($_POST['code'])){
        $code = $_POST['code'];
        //to prevent from mysqli injection  
        $code = stripcslashes($code);  
        $code = mysqli_real_escape_string($con, $code);        
        $sql = mysqli_query($con,"SELECT * FROM team where tid = '$code'");
        $row = mysqli_fetch_array($sql, MYSQLI_ASSOC);
        $name = $row['tname'];
        $result = checkteam($code, $con);
        if($result){
            if (tcode($code, $con)) {
              $result = add($code, $username, $con);
              if ($result) {
              $msg = "Team Joined Successfully<br> <a href = '../profile/profile.php'> Go to dashboard </a>" ;
            }
            else{
              $msg = "Internal Server error" ;
            }
          }else{
            $msg = "Invalid Team Code" ;
          }}
    else{
      $msg = "Team Size already full";
    }
  }
}
  else{
    header("location: ../profile/profile.php");
  }
}
else{
  header("location: ../../login.php");
}

?>
<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Teams Page</title>
  <link rel="stylesheet" href="./style.css">

</head>  
<body>
<!-- partial:index.partial.html -->
<section class="wrapper">
  <div class="content">
    <header>
      <h1>Create / Join Team</h1>
    </header>
    <section>
      <form action="" method="post" class="login-form">
        <div class="input-group">
          <label for="verification">Team Code</label>
          <input type="text" placeholder="XX-XX-XX-XX" name="code" required>
        </div>

        <div class="input-group" ><button>Join the Team</button></div>
      </form>
    </section>
    <footer>
    <div class="input-group">
      <label class='error'><?php echo $msg ?></lable>
    </div><br>
      
    <div class="input-group" >
      <button onclick="location.href='create_team.php'">Create New Team</button></div>

    </footer>
  </div>
</section>
<!-- partial -->
 
</body>
</html>
