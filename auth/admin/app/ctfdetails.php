<?php
$msg = "";
include('../../conn.php');
include('session.php');
include '../../mail.php';
if(isset($_GET['user'])){
$user = $_GET['user'];
$sql = mysqli_query($con,"SELECT * FROM ctfch where challengeid = '$user'");
$sql2 = mysqli_query($con,"SELECT * FROM users");
$row = mysqli_fetch_array($sql, MYSQLI_ASSOC);
}
else{
  header("location: ../../errorpage/404/index.html");
}
if(isset($_POST['action'])){
  $action = $_POST['action'];
  if(strcmp($action,'del') == 0){
      $point    = stripslashes($_POST['points']);
    $point    = mysqli_real_escape_string($con, $point);
    mysqli_query($con,"DELETE FROM ctfch WHERE challengeid = '$user'");
    mysqli_query($con,"DELETE FROM solve WHERE challengeid = '$user'");
    mysqli_query($con,"UPDATE FROM usrctf WHERE point = point-$point");
    header("location: home.php");
   }
   if(strcmp($action,'veri') == 0){
    if(strcmp($row['verified'],"FALSE")==0){
      mysqli_query($con,"UPDATE ctfch SET verified = 'TRUE'  WHERE challengeid='$user'");
      if ($sql2->num_rows > 0) {
        while($row2 = $sql2->fetch_assoc()) {
            $email = $row2['email'];
        $mail->addBCC("$email");
        $mail->Subject = 'ALERT CTF UPLOADED';
        $mail->Body    = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"><html xmlns="http://www.w3.org/1999/xhtml" xmlns:o="urn:schemas-microsoft-com:office:office" style="font-family:arial, "helvetica neue", helvetica, sans-serif"><head><meta charset="UTF-8"><meta content="width=device-width, initial-scale=1" name="viewport"><meta name="x-apple-disable-message-reformatting"><meta http-equiv="X-UA-Compatible" content="IE=edge"><meta content="telephone=no" name="format-detection"><title>Reply</title><!--[if (mso 16)]><style type="text/css"> a {text-decoration: none;} </style><![endif]--><!--[if gte mso 9]><style>sup { font-size: 100% !important; }</style><![endif]--><!--[if gte mso 9]><xml> <o:OfficeDocumentSettings> <o:AllowPNG></o:AllowPNG> <o:PixelsPerInch>96</o:PixelsPerInch> </o:OfficeDocumentSettings> </xml><![endif]--><style type="text/css">#outlook a { padding:0;}.es-button { mso-style-priority:100!important; text-decoration:none!important;}a[x-apple-data-detectors] { color:inherit!important; text-decoration:none!important; font-size:inherit!important; font-family:inherit!important; font-weight:inherit!important; line-height:inherit!important;}.es-desk-hidden { display:none; float:left; overflow:hidden; width:0; max-height:0; line-height:0; mso-hide:all;}[data-ogsb] .es-button { border-width:0!important; padding:10px 30px 10px 30px!important;}@media only screen and (max-width:600px) {p, ul li, ol li, a { line-height:150%!important } h1, h2, h3, h1 a, h2 a, h3 a { line-height:120% } h1 { font-size:36px!important; text-align:left } h2 { font-size:26px!important; text-align:left } h3 { font-size:20px!important; text-align:left } .es-header-body h1 a, .es-content-body h1 a, .es-footer-body h1 a { font-size:36px!important; text-align:left } .es-header-body h2 a, .es-content-body h2 a, .es-footer-body h2 a { font-size:26px!important; text-align:left } .es-header-body h3 a, .es-content-body h3 a, .es-footer-body h3 a { font-size:20px!important; text-align:left } .es-menu td a { font-size:12px!important } .es-header-body p, .es-header-body ul li, .es-header-body ol li, .es-header-body a { font-size:14px!important } .es-content-body p, .es-content-body ul li, .es-content-body ol li, .es-content-body a { font-size:16px!important } .es-footer-body p, .es-footer-body ul li, .es-footer-body ol li, .es-footer-body a { font-size:14px!important } .es-infoblock p, .es-infoblock ul li, .es-infoblock ol li, .es-infoblock a { font-size:12px!important } *[class="gmail-fix"] { display:none!important } .es-m-txt-c, .es-m-txt-c h1, .es-m-txt-c h2, .es-m-txt-c h3 { text-align:center!important } .es-m-txt-r, .es-m-txt-r h1, .es-m-txt-r h2, .es-m-txt-r h3 { text-align:right!important } .es-m-txt-l, .es-m-txt-l h1, .es-m-txt-l h2, .es-m-txt-l h3 { text-align:left!important } .es-m-txt-r img, .es-m-txt-c img, .es-m-txt-l img { display:inline!important } .es-button-border { display:inline-block!important } a.es-button, button.es-button { font-size:20px!important; display:inline-block!important } .es-adaptive table, .es-left, .es-right { width:100%!important } .es-content table, .es-header table, .es-footer table, .es-content, .es-footer, .es-header { width:100%!important; max-width:600px!important } .es-adapt-td { display:block!important; width:100%!important } .adapt-img { width:100%!important; height:auto!important } .es-m-p0 { padding:0!important } .es-m-p0r { padding-right:0!important } .es-m-p0l { padding-left:0!important } .es-m-p0t { padding-top:0!important } .es-m-p0b { padding-bottom:0!important } .es-m-p20b { padding-bottom:20px!important } .es-mobile-hidden, .es-hidden { display:none!important } tr.es-desk-hidden, td.es-desk-hidden, table.es-desk-hidden { width:auto!important; overflow:visible!important; float:none!important; max-height:inherit!important; line-height:inherit!important } tr.es-desk-hidden { display:table-row!important } table.es-desk-hidden { display:table!important } td.es-desk-menu-hidden { display:table-cell!important } .es-menu td { width:1%!important } table.es-table-not-adapt, .esd-block-html table { width:auto!important } table.es-social { display:inline-block!important } table.es-social td { display:inline-block!important } .es-m-p5 { padding:5px!important } .es-m-p5t { padding-top:5px!important } .es-m-p5b { padding-bottom:5px!important } .es-m-p5r { padding-right:5px!important } .es-m-p5l { padding-left:5px!important } .es-m-p10 { padding:10px!important } .es-m-p10t { padding-top:10px!important } .es-m-p10b { padding-bottom:10px!important } .es-m-p10r { padding-right:10px!important } .es-m-p10l { padding-left:10px!important } .es-m-p15 { padding:15px!important } .es-m-p15t { padding-top:15px!important } .es-m-p15b { padding-bottom:15px!important } .es-m-p15r { padding-right:15px!important } .es-m-p15l { padding-left:15px!important } .es-m-p20 { padding:20px!important } .es-m-p20t { padding-top:20px!important } .es-m-p20r { padding-right:20px!important } .es-m-p20l { padding-left:20px!important } .es-m-p25 { padding:25px!important } .es-m-p25t { padding-top:25px!important } .es-m-p25b { padding-bottom:25px!important } .es-m-p25r { padding-right:25px!important } .es-m-p25l { padding-left:25px!important } .es-m-p30 { padding:30px!important } .es-m-p30t { padding-top:30px!important } .es-m-p30b { padding-bottom:30px!important } .es-m-p30r { padding-right:30px!important } .es-m-p30l { padding-left:30px!important } .es-m-p35 { padding:35px!important } .es-m-p35t { padding-top:35px!important } .es-m-p35b { padding-bottom:35px!important } .es-m-p35r { padding-right:35px!important } .es-m-p35l { padding-left:35px!important } .es-m-p40 { padding:40px!important } .es-m-p40t { padding-top:40px!important } .es-m-p40b { padding-bottom:40px!important } .es-m-p40r { padding-right:40px!important } .es-m-p40l { padding-left:40px!important } .es-desk-hidden { display:table-row!important; width:auto!important; overflow:visible!important; max-height:inherit!important } }</style></head>
<body data-new-gr-c-s-loaded="14.1078.0" style="width:100%;font-family:arial, "helvetica neue", helvetica, sans-serif;-webkit-text-size-adjust:100%;-ms-text-size-adjust:100%;padding:0;Margin:0"><div class="es-wrapper-color" style="background-color:#FAFAFA"><!--[if gte mso 9]><v:background xmlns:v="urn:schemas-microsoft-com:vml" fill="t"> <v:fill type="tile" color="#fafafa"></v:fill> </v:background><![endif]--><table class="es-wrapper" width="100%" cellspacing="0" cellpadding="0" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;padding:0;Margin:0;width:100%;height:100%;background-repeat:repeat;background-position:center top;background-color:#FAFAFA"><tr><td valign="top" style="padding:0;Margin:0"><table cellpadding="0" cellspacing="0" class="es-content" align="center" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;table-layout:fixed !important;width:100%"><tr><td align="center" style="padding:0;Margin:0"><table bgcolor="#ffffff" class="es-content-body" align="center" cellpadding="0" cellspacing="0" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;background-color:#FFFFFF;width:600px"><tr><td align="left" style="Margin:0;padding-bottom:20px;padding-left:20px;padding-right:20px;padding-top:30px"><table cellpadding="0" cellspacing="0" width="100%" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px"><tr><td align="center" valign="top" style="padding:0;Margin:0;width:560px"><table cellpadding="0" cellspacing="0" width="100%" role="presentation" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px"><tr><td align="left" class="es-m-txt-l" style="padding:0;Margin:0;padding-bottom:10px"><h1 style="Margin:0;line-height:46px;mso-line-height-rule:exactly;font-family:arial, "helvetica neue", helvetica, sans-serif;font-size:46px;font-style:normal;font-weight:bold;color:#333333">CTF UPDATE</h1>
</td></tr><tr><td align="left" style="padding:0;Margin:0;padding-top:5px;padding-bottom:5px"><p style="Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:arial, "helvetica neue", helvetica, sans-serif;line-height:21px;Margin-bottom:15px;color:#333333;font-size:14px">Hi, H4CK3RS</p><p style="Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:arial, "helvetica neue", helvetica, sans-serif;line-height:21px;Margin-bottom:15px;color:#333333;font-size:14px">We have uploaded a new challenge kindly solve it before time.</p>
</td></tr><tr><td align="left" style="padding:0;Margin:0;padding-top:5px;padding-bottom:5px"><p style="Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:arial, "helvetica neue", helvetica, sans-serif;line-height:21px;Margin-bottom:15px;color:#333333;font-size:14px">Best regards,<br>Admin CTF team</p></td></tr></table></td></tr></table></td></tr></table></td></tr></table></td></tr></table></div></body></html>';
        }
        $mail->send();        
        header("location: location: ctfdetails.php?user=".$user);
        }
        else{
            $_SESSION['errors'] = array("This userid/email is already being used");
        header("location: Register.php");
        }
      header("location: ctfdetails.php?user=".$user);
      }
    else{
      mysqli_query($con,"UPDATE ctfch SET verified = 'FALSE'  WHERE challengeid='$user'");
      header("location: ctfdetails.php?user=".$user);
   }
}
if(strcmp($action,'edit') == 0){
    $name    = stripslashes($_POST['cname']);
    $name    = mysqli_real_escape_string($con, $name);
    $point    = stripslashes($_POST['points']);
    $point    = mysqli_real_escape_string($con, $point);
    $cby    = stripslashes($_POST['cby']);
    $cby    = mysqli_real_escape_string($con, $cby);
    $type    = stripslashes($_POST['type']);
    $type    = mysqli_real_escape_string($con, $type);
    $level = stripslashes($_POST['level']);
    $level = mysqli_real_escape_string($con, $level);
    $flag = stripslashes($_POST['flag']);
    $flag = mysqli_real_escape_string($con, $flag);
    $desc = stripslashes($_POST['desc']);
    $desc = mysqli_real_escape_string($con, $desc);
    $reso = stripslashes($_POST['reso']);
    $reso = mysqli_real_escape_string($con, $reso);
    mysqli_query($con,"UPDATE ctfch SET ctfname = '$name'  WHERE challengeid='$user'");
    mysqli_query($con,"UPDATE ctfch SET createdby = '$cby'  WHERE challengeid='$user'");
    mysqli_query($con,"UPDATE ctfch SET point = '$point'  WHERE challengeid='$user'");
    mysqli_query($con,"UPDATE ctfch SET level = '$level'  WHERE challengeid='$user'");
    mysqli_query($con,"UPDATE ctfch SET type = '$type'  WHERE challengeid='$user'");
    mysqli_query($con,"UPDATE ctfch SET flag = '$flag'  WHERE challengeid='$user'");
    mysqli_query($con,"UPDATE ctfch SET description = '$desc'  WHERE challengeid='$user'");
    mysqli_query($con,"UPDATE ctfch SET resource = '$reso'  WHERE challengeid='$user'");
    header("location: ctfdetails.php?user=".$user);
}
}

?>
<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Profile Update</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<link rel="stylesheet" href="./style.css">

</head>
<body>
<!-- partial:index.partial.html -->
<div class="app-container">
<div class="app-left">
    <button class="close-menu">
      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/></svg>
    </button>
    <div class="app-logo">
    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-activity"><path d="M4 15s1-1 4-1 5 2 8 2 4-1 4-1V3s-1 1-4 1-5-2-8-2-4 1-4 1z"></path><line x1="4" y1="22" x2="4" y2="15"></line></svg>
        <line x1="18" y1="20" x2="18" y2="10"/>
        <line x1="12" y1="20" x2="12" y2="4"/>
        <line x1="6" y1="20" x2="6" y2="14"/>       </svg>
        <span>ADMIN</span>
    </div>
    <ul class="nav-list">
        <li class="nav-list-item">
        <a class="nav-list-link" href="event.php">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-activity"><path d="M22 19a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h5l2 3h9a2 2 0 0 1 2 2z"></path></svg>
          Events
        </a>
</li>
      <li class="nav-list-item">
        <a class="nav-list-link" href="home.php">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-activity"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
          Users
        </a>
      </li>
      <li class="nav-list-item active">
        <a class="nav-list-link" href="ctf.php">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-activity"><path d="M4 15s1-1 4-1 5 2 8 2 4-1 4-1V3s-1 1-4 1-5-2-8-2-4 1-4 1z"></path><line x1="4" y1="22" x2="4" y2="15"></line></svg>
          Challenges
        </a>
      </li>
      <li class="nav-list-item">
        <a class="nav-list-link" href="team.php">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-activity"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>
          Team
        </a>
      </li>
      <li class="nav-list-item">
        <a class="nav-list-link" href="award.php">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-activity"><circle cx="12" cy="8" r="7"></circle><polyline points="8.21 13.89 7 23 12 20 17 23 15.79 13.88"></polyline></svg>
          award
        </a>
      </li>
      <li class="nav-list-item">
        <a class="nav-list-link" href="contact.php">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-activity"><path d="M9.09 9a3 3 0 0 1 5.83 1c0 2-3 3-3 3"></path><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="17" x2="12" y2="17"></line></svg>
          support
        </a>
      </li>
      <li class="nav-list-item ">
        <a class="nav-list-link" href="activity.php">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-activity"><polyline points="22 12 18 12 15 21 9 3 6 12 2 12"></polyline></svg>
          Activity
        </a>
      </li>
      <li class="nav-list-item">
        <a class="nav-list-link" href="logout.php">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-activity"><path d="M10 22H5a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h5"></path><polyline points="17 16 21 12 17 8"></polyline><line x1="21" y1="12" x2="9" y2="12"></line></svg>
          Logout
        </a>
      </li>
    </ul>
  </div>

  <div class="app-main">
  <div class="main-header-line">
      <h1>CTF update</h1>
      <label class='msg' style="color:#FFFFFF"><?php echo $msg ?></lable>
      </div>
    <div class="chart-container-wrapper small">
        <div class="chart-container">
        <form action="" method="POST">
      <div class="form-row">
        <div class="form-col">
      <label for="" style="color:#FFFFFF">CTF id</label><br>
      <input class="form-control" id="disabledInput" type="text" value="<?php echo $row['challengeid'] ?>" disabled>
      </div>
      <div class="form-col">&nbsp;&nbsp;</div>
      <div class="form-col">
      <label for="" style="color:#FFFFFF">CTF name</label><br>
      <input class="form-control" id="disabledInput" name="cname" type="text" value="<?php echo $row['ctfname'] ?>" >
      </div>
      <div class="form-col">&nbsp;&nbsp;</div>
      <div class="form-col">
      <label for="" style="color:#FFFFFF">CTF Points</label><br>
      <input type="number" class="form-control" name = "points" value="<?php echo $row['point'] ?>" >
      </div>
      </div>
      <div class="form-row"><br></div>
      <div class="form-row">
        <div class="form-col">
      <label for="" style="color:#FFFFFF">Created By</label><br>
      <input class="form-control" id="disabledInput" name="cby" type="text" value="<?php echo $row['createdby'] ?>" >
      </div>
      <div class="form-col">&nbsp;&nbsp;</div>
      <div class="form-col">
      <label for="" style="color:#FFFFFF">No of solve</label><br>
      <input class="form-control" id="disabledInput" type="text" value="<?php echo $row['solve'] ?> " disabled >
      </div>
      <div class="form-col">&nbsp;&nbsp;</div>
      <div class="form-col">
      <label for="" style="color:#FFFFFF">Verified</label><br>
      <input class="form-control" id="disabledInput" type="text" value="<?php echo $row['verified'] ?>" disabled>
      </div>
      </div>
      <div class="form-row"><br></div>
      <div class="form-row">
        <div class="form-col">
      <label for="" style="color:#FFFFFF">Type</label><br>
      <input class="form-control" id="disabledInput" name="type" type="text" value="<?php echo $row['type'] ?>" >
      </div>
      <div class="form-col">&nbsp;&nbsp;</div>
      <div class="form-col">
      <label for="" style="color:#FFFFFF">level</label><br>
      <input class="form-control" id="disabledInput" type="text" name = "level" value="<?php echo $row['level'] ?> " >
      </div>
      <div class="form-col">&nbsp;&nbsp;</div>
      <div class="form-col">
      <label for="" style="color:#FFFFFF">T-Point</label><br>
      <input class="form-control" id="disabledInput" type="text" name = "level" value="<?php echo $row['thrpoint'] ?>" <?php if(strcmp($row['scorning'],"FALSE") ==0){echo "disabled"; } ?>  >
      </div>
      </div>
      <div class="form-row"><br></div>
      <div class="form-row">
      <label for="" style="color:#FFFFFF">Flag</label><br>
      <input type="text" class="form-control" name ="flag" value="<?php echo $row['flag'] ?>" >
      <small id="passwordHelpBlock" class="form-text text-muted">Don't try to change the flag because it might hamper data</small> </div>
      <div class="form-row"><br></div>
      <div class="form-row">
      <label for="" style="color:#FFFFFF">Description</label><br>
      <input type="text" class="form-control" name = "desc" value="<?php echo $row['description'] ?>" >
      <small name="resource" class="form-text text-muted">Don't try to change the descpription because it might hamper data</small></div>
      <div class="form-row"><br></div>
      <div class="form-row">
      <label for="" style="color:#FFFFFF">Resource</label><br>
      <input type="text" class="form-control" name="reso" value="<?php echo $row['resource'] ?>" >
      <small name="resource" class="form-text text-muted">Don't try to change the resource because it might hamper data</small></div>
      <div class="form-row"><br></div>
      <div class="form-row">
      <div class="form-col">
      <div class="form-group">
      <label for="" style="color:#FFFFFF">ACTION AGAINST <?php echo $row['challengeid'] ?></label><br>
      <div class="form-check form-check-inline">
  <input class="form-check-input" type="checkbox" name="action" id="inlineCheckbox1" value="del">
  <label class="form-check-label" for="inlineCheckbox1" style="color:#FFFFFF">Delete</label>
</div>
<div class="form-check form-check-inline">
  <input class="form-check-input" type="checkbox" name="action" id="inlineCheckbox2" value="veri">
  <label class="form-check-label" for="inlineCheckbox2" style="color:#FFFFFF">verified</label>
</div>
<div class="form-check form-check-inline">
  <input class="form-check-input" type="checkbox" name="action" id="inlineCheckbox3" value="edit" >
  <label class="form-check-label" for="inlineCheckbox3" style="color:#FFFFFF">Edit </label>
</div>
  </div>
      </div>
      <div class="form-col">&nbsp;&nbsp;</div>
      <div class="form-col"><br>
      <button type="submit" class="btn btn-primary">SUBMIT</button>
      </div>
      </div>
      </form>
      </div> 
      </div>
      </div>
      
</div>
<!-- partial -->
  <script src='https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.js'>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </script><script  src="./script.js"></script>
  <script>
// When the user clicks on <div>, open the popup
</script>
</body>
</html>
