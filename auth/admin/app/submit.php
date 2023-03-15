<?php
include('../../conn.php');
include('../../mail.php');
include('session.php');
$cid = $_COOKIE['ccode'];
unset($_COOKIE['ccode']);
    if(isset($_POST['name'])){
        $name = stripslashes($_POST['name']);
        $name = mysqli_real_escape_string($con, $name);
        $point    = stripslashes($_POST['points']);
        $point    = mysqli_real_escape_string($con, $point);
        $resource = stripslashes($_POST['resource']);
        $resource = mysqli_real_escape_string($con, $resource);
        $flag = stripslashes($_POST['flag']);
        $flag = mysqli_real_escape_string($con, $flag);
        $desc = stripslashes(htmlspecialchars(($_POST['desc'])));
        $desc = mysqli_real_escape_string($con, $desc);
        $level = stripslashes($_POST['level']);
        $level = mysqli_real_escape_string($con, $level);
        $type = stripslashes($_POST['type']);
        $type = mysqli_real_escape_string($con, $type);
        $st = stripslashes($_POST['st']);
        $st = mysqli_real_escape_string($con, $st);
        $min = stripslashes($_POST['min']);
        $min = mysqli_real_escape_string($con, $min);
        $ft = stripslashes($_POST['ft']);
        $ft = mysqli_real_escape_string($con, $ft);
        $tpoint = stripslashes($_POST['tpoint']);
        $tpoint = mysqli_real_escape_string($con, $tpoint);
        if(strcmp($st, "Flase")==0){
            $st = "FALSE";
        }
            else{
                $st = "TRUE";
            }
    
            
            $header = json_encode(['typ' => 'JWT', 'alg' => 'HS256']);

// Create token payload as a JSON string
$payload = json_encode(['user_id' => $cid]);

// Encode Header to Base64Url String
$base64UrlHeader = str_replace(['+', '/', '='], ['-', '_', ''], base64_encode($header));

// Encode Payload to Base64Url String
$base64UrlPayload = str_replace(['+', '/', '='], ['-', '_', ''], base64_encode($payload));

// Create Signature Hash
$signature = hash_hmac('sha256', $base64UrlHeader . "." . $base64UrlPayload, 'bugxploitisbackwithsexme', true);

// Encode Signature to Base64Url String
$base64UrlSignature = str_replace(['+', '/', '='], ['-', '_', ''], base64_encode($signature));

// Create JWT
$jwt = $base64UrlHeader . "." . $base64UrlPayload . "." . $base64UrlSignature;



if(strcmp($ft, "True")== 0){
$query    = "INSERT into ctfch (challengeid, ctfname, createdby, type, level, point, description, flag, resource,scorning, minpt, jwt) VALUES ('$cid','$name', 'Admin',  '$type',  '$level',  '$point',  '$desc',  '$flag', '$resource', '$st', '$min', '$jwt')";
$getss   = mysqli_query($con, $query);
if ($getss) { 
    $mail->addAddress("$username");
                $mail->Subject = 'Secret code for virtual flag';
                $mail->Body    = 'please enter this line in php <br>
                "make a post request to -> domain/auth/admin/api with parametes <b>id</b> and value <br>'.$base64UrlPayload;
                $mail->send();
                $_SESSION['msg'] = array("Challenge Submited waiting for admin approval");
                header("location: upload.php");
            }else{
            $_SESSION['msg'] = array("Error Occured");
            header("location: upload.php");
            }
            }
    
    else{
        $query    = "INSERT into ctfch (challengeid, ctfname, createdby, type, level, point, description, flag, resource,scorning,thrpoint, minpt) VALUES ('$cid','$name', 'Admin',  '$type',  '$level',  '$point',  '$desc',  '$flag', '$resource', '$st', '$tpoint', '$min')";
$getss   = mysqli_query($con, $query);
if ($getss) { 
     $_SESSION['msg'] = array("Challenge Submited waiting for admin approval");
                header("location: upload.php");
            }else{
            $_SESSION['msg'] = array("Error Occured");
            header("location: upload.php");
            }
        
    }
    }
       
?>