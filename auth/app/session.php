<?php
session_start();
if(isset($_SESSION['login'])){
    $username = $_SESSION['login'];

}
else{
    header("location: ../login.php");
}
?>