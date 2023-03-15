<?php      
     $host = "localhost";  
     $user = "user";  
     $password = "password";  
     $db_name = "databasename";
      
    $con = mysqli_connect($host, $user, $password, $db_name);  
    if(mysqli_connect_errno()) {  
        die("Failed to connect with MySQL: ". mysqli_connect_error());  
    }
?>  