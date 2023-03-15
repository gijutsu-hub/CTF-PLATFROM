<?php
session_start();
if(isset( $_SESSION['adminlogin'])){
    $username = $_SESSION['adminlogin'];
}else{
    header("location: ../../errorpage/404/index.html");
}