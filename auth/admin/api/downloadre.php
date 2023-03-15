<?php 
 session_start();
// Load the database configuration file 
include_once '../../conn.php'; 
if(isset($_SESSION['download'])){
// Fetch records from database 
$query = $con->query("SELECT * FROM result ORDER BY point DESC"); 
if($query->num_rows > 0){ 
    $delimiter = ","; 
    $filename = "Result_" . date('Y-m-d') . ".csv"; 
     
    // Create a file pointer 
    $f = fopen('php://memory', 'w'); 
     
    // Set column headers 
    $fields = array('Name', 'userid', 'email', 'point'); 
    fputcsv($f, $fields, $delimiter); 
     
    // Output each row of the data, format line as csv and write to file pointer 
    while($row = $query->fetch_assoc()){  
        $lineData = array($row['Name'], $row['userid'], $row['email'], $row['point']); 
        fputcsv($f, $lineData, $delimiter); 
    } 
     
    // Move back to beginning of file 
    fseek($f, 0); 
     
    // Set headers to download file rather than displayed 
    header('Content-Type: text/csv'); 
    header('Content-Disposition: attachment; filename="' . $filename . '";'); 
     
    //output all remaining data on a file pointer 
    fpassthru($f); 
} 
exit; 
}
else{
    header("location: ../../errorpage/404/index.html");
}

 
?>