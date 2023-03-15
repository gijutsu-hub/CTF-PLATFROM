<?php
include('auth/conn.php');  
include('security/mobile.php'); 
$sql = mysqli_query($con,"SELECT * FROM evedetails");
$row = mysqli_fetch_array($sql, MYSQLI_ASSOC);

?>
<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title><?php echo $row['ctfname'];?> CTF</title>
  <link rel="stylesheet" href="./style.css">

</head>
<body>
<!-- partial:index.partial.html -->
<button class="menu"><span></span></button>
<div class="wrapper">
  <nav role='navigation'>
  <div class="elem" style="transform: perspective(1000px) rotateY(0deg) rotateX(0deg);">
  <ul>
    <li name="home"><a href="#">Home</a></li>
    <li name="about"><a href="#">Organizer</a></li>
    <li name="login"><a href="auth/Register.php">Register</a></li>
    <li name="Game"><a href="gameboard/index.php">Game Board</a></li>
  </ul>
    </div>
</nav>
</div>  
 <div class="section-wrap">   
   <section class="page home active">
     <div class="vertical-align" >
       <div class="wrap">
         <h2>Welcome to <?php echo $row['ctfname'];?> CTF</h2>
         <p><?php echo $row['ctfdesc'];?></p>
       </div>
     </div>
   </section>
   
      <section class="page about">
     <div class="vertical-align">
       <div class="wrap">
         <h2>About <?php echo $row['orgnizer'];?> </h2>
         <p><?php echo $row['orgnizerdeta'];?></p>
       </div>
     </div>
   </section>
<!-- partial -->
  <script src='//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script><script  src="./script.js"></script>
</body>
</html>
