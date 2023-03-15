<?php
include('../../conn.php');
mysqli_query($con,"DELETE FROM result");
$sql3 = mysqli_query($con,"SELECT * FROM usrctf ORDER BY  point DESC");
if ($sql3->num_rows > 0) {
while($row3 = $sql3->fetch_assoc()) {
$username = $row3['username'];
$sql = mysqli_query($con,"SELECT * FROM users where userid='$username'");
$row = mysqli_fetch_array($sql, MYSQLI_ASSOC);
$sql2 = mysqli_query($con,"SELECT * FROM usdetails where userid='$username'");
$row2 = mysqli_fetch_array($sql2, MYSQLI_ASSOC);
$email = $row['email'];
$name = $row2['name'];
$points = $row3['point'];
mysqli_query($con,"INSERT INTO result (Name, userid, email, point) VALUES ('$name','$username','$email','$points')");
}
}
?>