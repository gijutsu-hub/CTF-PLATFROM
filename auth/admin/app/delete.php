<?php
include('../../conn.php');
include ('session.php');
mysqli_query($con,"DELETE FROM contact where solved = 'TURE'");
?>