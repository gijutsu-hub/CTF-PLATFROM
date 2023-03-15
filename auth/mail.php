<?php
  
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
  
require 'vendor/autoload.php';
  
$mail = new PHPMailer(true);
  
    $mail->isSMTP();                                            
    $mail->Host       = 'smtp id';                    
    $mail->SMTPAuth   = true;                             
    $mail->Username   = 'username';                 
    $mail->Password   = 'password';                        
    $mail->SMTPSecure = 'ssl';                              
    $mail->Port       = 465; 
    $mail->SMTPDebug = 0; 
  
    $mail->setFrom('name', 'community');           
       
    $mail->isHTML(true);                                  
  
?>