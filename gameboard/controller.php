<?php
include ('../auth/conn.php');
$sql34 = mysqli_query($con, "SELECT * FROM users");
$user = mysqli_num_rows($sql34);

$sql = mysqli_query($con, "SELECT * FROM tpoints");
$team = mysqli_num_rows($sql);

$challenge = mysqli_query($con, "SELECT * FROM ctfch");
$challenge = mysqli_num_rows($challenge);

$sql2 = mysqli_query($con, "SELECT * FROM tpoints ORDER BY tpoints DESC LIMIT 5");
$sql3 = mysqli_query($con, "SELECT * FROM achivment ORDER BY date DESC LIMIT 3 ");

$sql4 = mysqli_query($con, "SELECT * FROM solve where challengetype = 'web'");
$sql5 = mysqli_query($con, "SELECT * FROM solve where challengetype = 'crypto'");
$sql6 = mysqli_query($con, "SELECT * FROM solve where challengetype = 'reverse'");
$sql7 = mysqli_query($con, "SELECT * FROM solve where challengetype = 'binary'");
$sql8 = mysqli_query($con, "SELECT * FROM solve where challengetype = 'forensic'");
$sql9 = mysqli_query($con, "SELECT * FROM solve where challengetype = 'general'");
$sql10 = mysqli_query($con, "SELECT * FROM solve where challengetype = 'pwn'");


$sql11 = mysqli_query($con, "SELECT * FROM ctfch where type = 'web'");
$sql12 = mysqli_query($con, "SELECT * FROM ctfch where type = 'crypto'");
$sql13 = mysqli_query($con, "SELECT * FROM ctfch where type = 'reverse'");
$sql14 = mysqli_query($con, "SELECT * FROM ctfch where type = 'binary'");
$sql15 = mysqli_query($con, "SELECT * FROM ctfch where type = 'forensic'");
$sql16 = mysqli_query($con, "SELECT * FROM ctfch where type = 'general'");
$sql17 = mysqli_query($con, "SELECT * FROM ctfch where type = 'pwn'");

?>