<?php
header('Refresh: 30; URL=#');
include('../auth/conn.php');
if(isset($_GET['id'])){
$id = $_GET['id'];
$sql = mysqli_query($con,"SELECT * FROM tpoints where tname = '$id'");
}else{
$sql = mysqli_query($con,"SELECT * FROM tpoints ORDER BY tpoints DESC");
}
?>
<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>All team score</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
<link rel="stylesheet" href="./style.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

</head>
<body>
<!-- partial:index.partial.html -->
<div class="app-container">
  <div class="app-main">
    <h2 style="color:#FFFFFF">TOTAL Teams</h2>
    <div class="chart-container-wrapper small">
        <div class="chart-container">
        <form action="" method="GET">
        <div class="input-group input-group-lg mb-3">
  <input type="text" name="id" class="form-control" placeholder="Team Name" aria-label="Search challenge" aria-describedby="basic-addon2">
  <div class="input-group-append">
  <button type="submit" class="btn btn-primary">Search Team</button>
  </div>
</div>
</form>
        </div>
  <div class="chart-container-wrapper small ">
        <div class="chart-container">
        <table class="table table-dark">
  <thead>
    <tr>
      <th scope="col">Team id</th>
      <th scope="col">Team name</th>
      <th scope="col">Team Score</th>
    </tr>
  </thead>
  <tbody>
  <?php

if ($sql->num_rows > 0) {
  while($row = $sql->fetch_assoc()) {
     ?>
    <tr>
      <td><?php echo $row['tid']; ?></td>
      <td><?php echo $row['tname']; ?></td>
      <td><?php echo $row['tpoints']; ?></td>
      
    </tr>
    <?php
         }
        }?>
  </tbody>
</table>
        </div>
        
</div>
<!-- partial -->
  <script src='https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.js'>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </script><script  src="./script.js"></script>
  <script>
// When the user clicks on <div>, open the popup
</script>
</body>
</html>
