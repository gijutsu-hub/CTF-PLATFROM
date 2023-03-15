<?php
include ('controllerdash.php');
?>
<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title><?php echo $row['ctfname']; ?> Dashboard</title>
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
      <span><?php echo $row['ctfname']; ?></span>
    </div>
    <ul class="nav-list">
      <li class="nav-list-item active">
        <a class="nav-list-link" href="#">
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
      if (strcmp($row1['Admin'],"verified") == 0 ) {
        $_SESSION['UPLOAD'] = $username;
      ?>
      <li class="nav-list-item">
        <a class="nav-list-link" href="upload.php">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-activity"><path d="M3 17v3a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-3"></path><polyline points="16 6 12 2 8 6"></polyline><line x1="12" y1="2" x2="12" y2="16"></line></svg>
          Upload CTF
        </a>
      </li>
      <?php }?> 
       <li class="nav-list-item">
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
    <div class="chart-row three">
      <div class="chart-container-wrapper">
        <div class="chart-container">
          <div class="chart-info-wrapper">
            <h2>Total Solved</h2>
            <span><?php echo $row4["solved"];?></span>
          </div>
          <div class="chart-svg">
            <svg viewBox="0 0 36 36" class="circular-chart pink">
      <path class="circle-bg" d="M18 2.0845
          a 15.9155 15.9155 0 0 1 0 31.831
          a 15.9155 15.9155 0 0 1 0 -31.831"></path>
      <path class="circle" stroke-dasharray="<?php echo((sprintf('%.2f', $row4["solved"]/$sql3->num_rows))*100) ?>, 100" d="M18 2.0845
          a 15.9155 15.9155 0 0 1 0 31.831
          a 15.9155 15.9155 0 0 1 0 -31.831"></path>
      <text x="18" y="20.35" class="percentage"><?php echo((sprintf('%.2f', $row4["solved"]/$sql3->num_rows))*100) ?>%</text>
    </svg>
          </div>
        </div>
      </div>
      <div class="chart-container-wrapper">
        <div class="chart-container">
          <div class="chart-info-wrapper">
            <h2>Total Awards</h2>
            <span><?php echo $row4["awards"];?></span>
          </div>
          <div class="chart-svg">
            <svg viewBox="0 0 36 36" class="circular-chart blue">
      <path class="circle-bg" d="M18 2.0845
          a 15.9155 15.9155 0 0 1 0 31.831
          a 15.9155 15.9155 0 0 1 0 -31.831"></path>
      <path class="circle" stroke-dasharray="<?php echo((sprintf('%.2f',$row4["awards"]/$sql5->num_rows))*100) ?>, 100" d="M18 2.0845
          a 15.9155 15.9155 0 0 1 0 31.831
          a 15.9155 15.9155 0 0 1 0 -31.831"></path>
      <text x="18" y="20.35" class="percentage"><?php echo((sprintf('%.2f',$row4["awards"]/$sql5->num_rows))*100) ?>%</text>
    </svg>
          </div>
        </div>
      </div>
      <div class="chart-container-wrapper">
        <div class="chart-container">
          <div class="chart-info-wrapper">
            <h2>Total Points</h2>
            <span><?php echo($row4["point"]) ?></span>
          </div>
           <div class="chart-svg">
            <svg viewBox="0 0 36 36" class="circular-chart orange">
      <path class="circle-bg" d="M18 2.0845
          a 15.9155 15.9155 0 0 1 0 31.831
          a 15.9155 15.9155 0 0 1 0 -31.831"></path>
      <path class="circle" stroke-dasharray="<?php echo(((sprintf('%.2f',$row4["point"])/$qty))*100) ?>, 100" d="M18 2.0845
          a 15.9155 15.9155 0 0 1 0 31.831
          a 15.9155 15.9155 0 0 1 0 -31.831"></path>
      <text x="18" y="20.35" class="percentage"><?php echo((sprintf('%.2f',($row4["point"])/$qty))*100) ?>%</text>
    </svg>
          </div>
        </div>
      </div>
    </div>
    <div class="chart-row two">
      <div class="chart-container-wrapper big">
        <div class="chart-container">
          <div class="chart-container-header">
            <h2>Performances</h2>
          </div>
          <div class="line-chart">
            <canvas id="chart"></canvas>
          </div>
          <div class="chart-data-details">
            <div class="chart-details-header"></div>
          </div>
        </div>
      </div>
      <div class="chart-container-wrapper small">
        <div class="chart-container">
          <div class="chart-container-header">
            <h2>Current Position</h2>
          </div>
          <div class="profile-box">
          <div class="badge-photo-wrapper">
          <img src="<?php echo $row9['badgelink']; ?>" alt="badge">
          </div>
          <p class="profile-text"><?php echo $row4['position']; ?></p>
          </div>
        </div>
        <div class="chart-container applicants">
          <div class="chart-container-header">
            <h2>Notifications</h2>
          </div>
          <?php
          if ($sql24->num_rows > 0) {
            while($row24 = $sql24->fetch_assoc()) {
          ?>  
          <div class="applicant-line">
            <img src="<?php echo $row24['link']; ?>" alt="profile">
            <div class="applicant-info">
              <span><a href="../profile/index.php?uuid=<?php echo base64_encode($row24['userid']); ?>"><?php echo $row24['userid']; ?></a></span>
              <p><?php echo $row24['achivement']; ?></p>
            </div>
          </div>
          <?php
           }}
           ?>
        </diV>
      </div>
    </div>
  </div>
  <div class="app-right">
    <button class="close-right">
      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/></svg>
    </button>
    <div class="profile-box">
      <div class="profile-photo-wrapper">
        <img src="<?php echo $row1['proflink']; ?>" alt="profile">
      </div>
      <p class="profile-text"><?php echo $row1['name']; ?></p>
    </div>
    <div class="app-right-section">
      <div class="app-right-section-header">
        <h2>Additional information</h2>
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-activity"><line x1="12" y1="5" x2="12" y2="19"></line><line x1="5" y1="12" x2="19" y2="12"></line></svg>
        </span>
      </div>
      <div class="activity-line">
        <span class="activity-icon warning">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-activity"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
        </span>
        <div class="activity-text-wrapper">
          <p class="activity-text">Username:<br><strong><?php echo $row1['userid']; ?></strong></p>
        </div>
      </div>
      <div class="activity-line">
        <span class="activity-icon warning">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-activity"><rect x="18" y="3" width="4" height="18"></rect><rect x="10" y="8" width="4" height="13"></rect><rect x="2" y="13" width="4" height="8"></rect></svg>
        </span>
        <div class="activity-text-wrapper">
          <p class="activity-text">Level:<br><strong><?php echo($row4["position"]); ?></strong></p>
        </div>
      </div>
      <div class="activity-line">
        <span class="activity-icon warning">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-activity"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>
        </span>
        <div class="activity-text-wrapper">
          <p class="activity-text">Team Name:<br><strong><?php echo $row2['tname']; ?></strong></p>
        </div>
      </div>
      <div class="activity-line">
        <span class="activity-icon applicant">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-activity"><path d="M21.21 15.89A10 10 0 1 1 8 2.83"></path><path d="M22 12A10 10 0 0 0 12 2v10z"></path></svg>
        </span>
        <div class="activity-text-wrapper">
          <p class="activity-text">Total Points:<br><strong><?php echo($row4["point"]) ?></strong></p>
        </div>
      </div>
      <div class="activity-line">
        <span class="activity-icon close">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-activity"><circle cx="12" cy="8" r="7"></circle><polyline points="8.21 13.89 7 23 12 20 17 23 15.79 13.88"></polyline></svg>
        </span>
        <div class="activity-text-wrapper">
          <p class="activity-text">Total awards:<br><strong><?php echo($row4["awards"]); ?></strong></p>
        </div>
      </div>
      <div class="activity-line">
        <span class="activity-icon applicant">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-activity"><circle cx="12" cy="12" r="10"></circle><polyline points="12 6 12 12 15 15"></polyline></svg>
        </span>
        <div class="activity-text-wrapper">
          <p class="activity-text">Clock: <br><strong><?php echo date("m-d h:i a"); ?></strong></p>
        </div>
      </div>
      
    </div>
    </div>
  </div>
</div>
<!-- partial -->
  <script src='https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.js'></script>
  <script>
    var chart    = document.getElementById('chart').getContext('2d'),
    gradient = chart.createLinearGradient(0, 0, 0, 450);

gradient.addColorStop(0, 'rgba(0, 199, 214, 0.32)');
gradient.addColorStop(0.3, 'rgba(0, 199, 214, 0.1)');
gradient.addColorStop(1, 'rgba(0, 199, 214, 0)');


var data  = {
    labels: [ 'web','crypto','reverse','binary','forensic','general','pwn' ],
    datasets: [{
			label: 'Solved',
			pointBackgroundColor: '#ffff',
			borderWidth: 1,
			borderColor: '#ffff',
			data: [ <?php echo mysqli_num_rows($sql10); ?>, <?php echo mysqli_num_rows($sql11); ?>, <?php echo mysqli_num_rows($sql12); ?>, <?php echo mysqli_num_rows($sql13); ?>, <?php echo mysqli_num_rows($sql14); ?>, <?php echo mysqli_num_rows($sql15); ?>,  <?php echo mysqli_num_rows($sql16); ?>]
    },
    {
			label: 'Not Solved',
			pointBackgroundColor: '#ff0000',
			borderWidth: 1,
			borderColor: '#ff0000',
			data: [ <?php echo (mysqli_num_rows($sql17)-mysqli_num_rows($sql10)); ?>, <?php echo (mysqli_num_rows($sql18)-mysqli_num_rows($sql11)); ?>, <?php echo(mysqli_num_rows($sql19)- mysqli_num_rows($sql12)); ?>, <?php echo (mysqli_num_rows($sql20)-mysqli_num_rows($sql13)); ?>, <?php echo (mysqli_num_rows($sql21)-mysqli_num_rows($sql14)); ?>, <?php echo (mysqli_num_rows($sql22)-mysqli_num_rows($sql15)); ?>,  <?php echo (mysqli_num_rows($sql23)-mysqli_num_rows($sql16)); ?>]
    }
  ]
};

var options = {
	responsive: true,
	maintainAspectRatio: true,
	animation: {
		easing: 'easeInOutQuad',
		duration: 520
	},
	scales: {
		yAxes: [{
      ticks: {
        fontColor: '#5e6a81'
      },
			gridLines: {
				color: 'rgba(200, 200, 200, 0.08)',
				lineWidth: 1
			}
		}],
    xAxes:[{
      ticks: {
        fontColor: '#5e6a81'
      }
    }]
	},
	elements: {
		line: {
			tension: 0.4
		}
	},
	legend: {
		display: false
	},
	point: {
		backgroundColor: '#00c7d6'
	},
	tooltips: {
		titleFontFamily: 'Poppins',
		backgroundColor: 'rgba(0,0,0,0.4)',
		titleFontColor: 'white',
		caretSize: 5,
		cornerRadius: 2,
		xPadding: 10,
		yPadding: 10
	}
};

var chartInstance = new Chart(chart, {
    type: 'line',
    data: data,
		options: options
});

document.querySelector('.open-right-area').addEventListener('click', function () {
    document.querySelector('.app-right').classList.add('show');
});

document.querySelector('.close-right').addEventListener('click', function () {
    document.querySelector('.app-right').classList.remove('show');
});

document.querySelector('.menu-button').addEventListener('click', function () {
    document.querySelector('.app-left').classList.add('show');
});

document.querySelector('.close-menu').addEventListener('click', function () {
    document.querySelector('.app-left').classList.remove('show');
});


  </script>

</body>
</html>
