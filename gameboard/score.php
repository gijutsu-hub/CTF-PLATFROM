<?php
function getdata(){
include ('../auth/conn.php');
$score = array();
$i =0;
$query = mysqli_query($con, "SELECT * FROM tpoints order by tpoints DESC");
while($row = mysqli_fetch_array($query)){
    $x = $row["tpoints"];
    $score[] = Array (
        'pos' => $i + 1,
        'team' => $row["tname"],
        'score' => $x + 1
    );
$i = $i + 1;
}
return json_encode(["standings" => $score]);
}
file_put_contents("score.json", getdata());
echo '<pre>';
print_r(getdata());
echo '<pre>';
?>