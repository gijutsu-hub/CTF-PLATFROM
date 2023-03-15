<?php
include('session.php');
include('../conn.php');
$sql1 = mysqli_query($con,"SELECT * FROM evedetails");
$row1 = mysqli_fetch_array($sql1, MYSQLI_ASSOC);

?>
<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title><?php echo $row1['ctfname']; ?> CTF</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
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
        <span><?php echo $row1['ctfname']; ?></span>
    </div>
    <ul class="nav-list">
      <li class="nav-list-item ">
        <a class="nav-list-link" href="dashboard.php">
          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-columns"><path d="M12 3h7a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2h-7m0-18H5a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h7m0-18v18"/></svg>
          Dashboard
        </a>
      </li>
      <li class="nav-list-item">
        <a class="nav-list-link" href="teams.php">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-activity"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>
          Teams
        </a>
      </li>
       <li class="nav-list-item">
        <a class="nav-list-link" href="leader.php">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-activity"><rect x="18" y="3" width="4" height="18"></rect><rect x="10" y="8" width="4" height="13"></rect><rect x="2" y="13" width="4" height="8"></rect></svg>
          Leaderboard
        </a>
      </li>
      <li class="nav-list-item">
        <a class="nav-list-link" href="ctf.php">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-activity"><path d="M4 15s1-1 4-1 5 2 8 2 4-1 4-1V3s-1 1-4 1-5-2-8-2-4 1-4 1z"></path><line x1="4" y1="22" x2="4" y2="15"></line></svg>
          CTF
        </a>
      </li>
      <li class="nav-list-item">
        <a class="nav-list-link" href="../profile/index.php?uuid=<?php echo base64_encode($username); ?>">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-activity"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
          Profile Card
        </a>
      </li>
      <li class="nav-list-item">
        <a class="nav-list-link" href="award.php">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-activity"><circle cx="12" cy="8" r="7"></circle><polyline points="8.21 13.89 7 23 12 20 17 23 15.79 13.88"></polyline></svg>
          award
        </a>
      </li>
      <li class="nav-list-item">
        <a class="nav-list-link" href="connect.php">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-activity"><path d="M9.09 9a3 3 0 0 1 5.83 1c0 2-3 3-3 3"></path><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="17" x2="12" y2="17"></line></svg>
          support
        </a>
      </li>
      <?php 
      if (strcmp($row3['Admin'],"verified") == 0 ) {
        $_SESSION['UPLOAD'] = $username;
      ?>
      <li class="nav-list-item">
        <a class="nav-list-link" href="upload.php">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-activity"><path d="M3 17v3a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-3"></path><polyline points="16 6 12 2 8 6"></polyline><line x1="12" y1="2" x2="12" y2="16"></line></svg>
          Upload CTF
        </a>
      </li>
      <?php }?> 
      <li class="nav-list-item active">
          <a class="nav-list-link" href="Rule.php">
              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-activity"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-bookmark"><path d="M19 21l-7-5-7 5V5a2 2 0 0 1 2-2h10a2 2 0 0 1 2 2z"></path></svg></svg>
                Rules
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
 <div class="chart-container-wrapper small">
        <div class="chart-container">
        <ul style="color:white" >
        <li><h1>Damncon CTF RULES</h1></li>
            <li>FLAGS are dynamic</li>
             <li>For winning prize each team should at least 3 members else reward will be transferred to next team!</li>
             <li>This CTF is hosted by DSPH. The timing for the event is 23rd DEC 12:00 PM IST - 24th DEC 12:00 PM IST. </li>
             <li><br></li>
             <li>The rules listed on this page may change as more issues are raised by the participants. Also, the organizers keep the right to change them at any time. Keep in mind that it is not possible/feasible to list all the rules and the exceptions to rules that apply to the CTF competition. When in doubt, use common sense or ask</li>
             <li><br></li>
             <li>No attacks against the infrastructure. We run a responsible disclosure program to protect our infrastructure,so you may report any found vulnerability. Any attack against our infrastructure will grant your team a permanent ban. When in doubt, ask us.</li>
             <li><br></li>
             <li>Bruteforcing the login portal is strictly prohibited.</li>
             <li><br></li>
             <li>No (D)DoS. Denial of service against our infrastructure, other teams or any other party is also strictly prohibited.</li>
             <li><br></li>
             <li>The only permitted attack targets are the vulnerable machines! Players are not allowed to attack competition infrastructure or any other portion of a team's network.</li>
             <li><br></li>
             <li>Sharing flags, exploits, or hints to other players is severely prohibited and will grant you exclusion from the competition. </li>
             <li><br></li>
             <li style="color:red">All participants are responsible for the security of their hardware and software. We are not responsible for any potential damage to your devices.</li>
             <li><br></li>
             <li style="color:red">We have auto banning bots if you submit flag continously or any miscellaneous activity your account will be banned by the bot.</li>
             <li><br></li>
             <li style="color:red">The Flag submission portal will be open after solveing the inital part of ctf that is decided by the ctf maker</li>
         </ul>

</div>
</div>
<!-- partial -->
  <script src='https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.js'></script><script  src="./script.js"></script>
  <script>
// When the user clicks on <div>, open the popup
</script>
</body>
</html>