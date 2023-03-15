<?php
include('session.php');
include('../conn.php');
$id = ($_GET['id']);
setcookie('Showme', $id, time() + (86400 * 30), "/");
$sql3 = mysqli_query($con,"SELECT * FROM ctfch where challengeid = '$id'");
$row3 = mysqli_fetch_array($sql3, MYSQLI_ASSOC);
$resource = $row3['resource'];
header("location: $resource");
?>
