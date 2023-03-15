<?php
session_start();
include('../conn.php');
if(isset($_SESSION['login'])){
    $username = $_SESSION['login'];
    $sql = mysqli_query($con,"SELECT * FROM evedetails");
    $row = mysqli_fetch_array($sql, MYSQLI_ASSOC);

    $sql1 = mysqli_query($con,"SELECT * FROM usdetails where userid  = '$username'");
    $row1 = mysqli_fetch_array($sql1, MYSQLI_ASSOC);

    $sql2 = mysqli_query($con,"SELECT * FROM team where userid  = '$username'");
    $row2 = mysqli_fetch_array($sql2, MYSQLI_ASSOC);

    $sql3 = mysqli_query($con,"SELECT * FROM ctfch");

    $sql4 = mysqli_query($con,"SELECT * FROM usrctf where username  = '$username'");
    $row4 = mysqli_fetch_array($sql4, MYSQLI_ASSOC);

    $sql5 = mysqli_query($con,"SELECT * FROM grand");
    $row5 = mysqli_fetch_array($sql5, MYSQLI_ASSOC);
    
    
    $qty= 0;
    while ($num = mysqli_fetch_assoc ($sql3)) {
    $qty += $num['point'];
    $teamname = $row2['tname'];
    

    $sql7 = mysqli_query($con,"SELECT * FROM team where tname  = '$teamname'");
    $sql8 = mysqli_query($con,"SELECT * FROM usdetails WHERE EXISTS(SELECT userid FROM team WHERE tname = '$teamname');");
    $badgeses = $row4['position'];
    $sql9 = mysqli_query($con,"SELECT * FROM grand WHERE badge='$badgeses'");
    $row9 = mysqli_fetch_array($sql9, MYSQLI_ASSOC);
    $sql10 = mysqli_query($con,"SELECT * FROM solve where username = '$username' AND challengetype = 'web'");
    $sql11 = mysqli_query($con,"SELECT * FROM solve where username = '$username' AND challengetype = 'crypto'");
    $sql12 = mysqli_query($con,"SELECT * FROM solve where username = '$username' AND challengetype = 'reverse'");
    $sql13 = mysqli_query($con,"SELECT * FROM solve where username = '$username' AND challengetype = 'binary'");
    $sql14 = mysqli_query($con,"SELECT * FROM solve where username = '$username' AND challengetype = 'forensic'");
    $sql15 = mysqli_query($con,"SELECT * FROM solve where username = '$username' AND challengetype = 'general'");
    $sql16 = mysqli_query($con,"SELECT * FROM solve where username = '$username' AND challengetype = 'pwn'");
    $sql17 = mysqli_query($con,"SELECT * FROM ctfch where type ='web'");
    $sql18 = mysqli_query($con,"SELECT * FROM ctfch where type ='crypto'");
    $sql19 = mysqli_query($con,"SELECT * FROM ctfch where type ='reverse'");
    $sql20 = mysqli_query($con,"SELECT * FROM ctfch where type ='binary'");
    $sql21 = mysqli_query($con,"SELECT * FROM ctfch where type ='forensic'");
    $sql22 = mysqli_query($con,"SELECT * FROM ctfch where type ='general'");
    $sql23 = mysqli_query($con,"SELECT * FROM ctfch where type ='pwn'");
    $sql24 = mysqli_query($con, "SELECT * FROM achivment  ORDER BY date DESC LIMIT 3 ");
    }



    
}
else{
    header("location: ../login.php");
}

?>
