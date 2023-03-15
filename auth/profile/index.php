<?php
include('../conn.php');
if(isset($_GET['uuid'])){
$username = stripslashes($_GET['uuid']);
$username = base64_decode($username);
$username = mysqli_real_escape_string($con, $username);
$sql = mysqli_query($con,"SELECT * FROM usdetails where userid = '$username'");
$row = mysqli_fetch_array($sql, MYSQLI_ASSOC);
$sql1 = mysqli_query($con,"SELECT * FROM usrctf where username = '$username'");
$row1 = mysqli_fetch_array($sql1, MYSQLI_ASSOC);
$sql2 = mysqli_query($con,"SELECT DISTINCT (achivement) FROM achivment where userid = '$username'");
}
else{
	//header("location: ../login.php");

}
?>
<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title><?php echo $row['name']?> Profile</title>
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.0/css/all.min.css'><link rel="stylesheet" href="./style.css">

</head>
<body>
<!-- partial:index.partial.html -->
<div class="card-container">
	<span class="pro"><?php echo $row1['position']?></span>
	<img class="round" src="<?php echo $row["proflink"]?>" alt="user" />
	<h3><?php echo $row['name']?></h3>
	<p>Country : <?php echo $row['country']?></p>
	<p>Total Points : <?php echo $row1['point']?></p>
	<div class="buttons">
		<button class="primary" onclick="location.href='<?php echo $row['sociallink'] ?>';">
			Contact
		</button>
	</div>
	<div class="skills">
		<h6>Awards & Badges</h6>
		<ul>
			<?php
		if ($sql2->num_rows > 0) {
    while($row2 = $sql2->fetch_assoc()) {
       ?>
			<li><?php echo $row2['achivement']?></li>
		<?php
		}
        } else {?>
		<li>No Achivements</li>
		<?php }
        ?>
        
		</ul>
	</div>
</div>

<!-- partial -->
  
</body>
</html>
