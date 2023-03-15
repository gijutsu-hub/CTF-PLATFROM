<?php
include('../../conn.php');
$sql = mysqli_query($con,"SELECT * FROM evedetails");
$row = mysqli_fetch_array($sql, MYSQLI_ASSOC);
function generateRandomString($length = 15) {
    return substr(str_shuffle(str_repeat($x='0123456789ABCDEFGHIJKLMNOPQRSTU', ceil($length/strlen($x)) )),1,$length);
} 


if(isset($_POST['id'])){
    $id = $_POST['id'];
                    // Create token header as a JSON string
$header = json_encode(['typ' => 'JWT', 'alg' => 'HS256']);


// Encode Header to Base64Url String
$base64UrlHeader = str_replace(['+', '/', '='], ['-', '_', ''], base64_encode($header));

// Create Signature Hash
$signature = hash_hmac('sha256', $base64UrlHeader . "." . $id, 'bugxploitisbackwithsexme', true);

// Encode Signature to Base64Url String
$base64UrlSignature = str_replace(['+', '/', '='], ['-', '_', ''], base64_encode($signature));

// Create JWT
$jwt = $base64UrlHeader . "." . $id . "." . $base64UrlSignature;
$sql = mysqli_query($con,"SELECT * FROM ctfch where jwt = '$jwt'");
$row = mysqli_fetch_array($sql, MYSQLI_ASSOC);
$cid = $row['challengeid'];
    if(mysqli_num_rows ( $sql ) > 0){
    $flag = "DAMNCON"."{".generateRandomString()."}";
    mysqli_query($con,"UPDATE ctfch SET flag = '$flag'  WHERE challengeid ='$cid'");
    echo $flag;
    }
}
else{
    header("location: ../../errorpage/404/index.html");
}
?>