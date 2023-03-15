<?php 
include 'controller.php';
include('../security/mobile.php'); 
header('Refresh: 30; URL=#');
?>
<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>CTF pannel</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
<link rel="stylesheet" href="./style.css">

</head>
<body>
<!-- partial:index.partial.html -->
<div class="app-container">
  <div class="app-main">
    <div class="main-header-line">
      <h1>CTF PANNEL ONLY FOR H4CK3RS</h1>
    </div>
    <div class="chart-row three">
      <div class="chart-container-wrapper">
        <div class="chart-container">
          <div class="chart-info-wrapper">
            <h2>Total User</h2>
            <span><?php echo $user; ?></span>
          </div>
        </div>
      </div>
      <div class="chart-container-wrapper">
        <div class="chart-container">
          <div class="chart-info-wrapper">
            <h2>Total Teams</h2>
            <span><?php echo $team; ?></span>
          </div>
        </div>
      </div>
      <div class="chart-container-wrapper">
        <div class="chart-container">
          <div class="chart-info-wrapper">
            <h2>Total Challenge</h2>
            <span><?php echo $challenge; ?></span>
          </div>
        </div>
      </div>
    </div>
    <div class="chart-row two">
      <div class="chart-container-wrapper big">
        <div class="chart-container">
          <div class="chart-container-header">
            <h2>Challenge Solving Status</h2>
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
            <h2>TOP 5 TEAMs </h2>
          </div>
          <?php
            if ($sql2->num_rows > 0) {
            while($row2 = $sql2->fetch_assoc()) {
       ?>       
          <div class="progress-bar-info">
            <span class="progress-color applications"></span>
            <span class="progress-type"><?php echo $row2['tname']; ?></span>
            <span class="progress-amount"><?php echo $row2['tpoints']; ?></span>
          </div>
          <?php
           }
          }else{
            ?>
            <div class="progress-bar-info">
            <span class="progress-color applications"></span>
            <span class="progress-type">No Team</span>
            <span class="progress-amount">0 Points</span>
          </div>
          <?php }?>
          </div>
        <div class="chart-container applicants">
          <div class="chart-container-header">
            <h2>Activity</h2>
          </div>
          <?php
          if ($sql3->num_rows > 0) {
            while($row3 = $sql3->fetch_assoc()) {
          ?>  
          <div class="applicant-line">
            <img src="<?php echo $row3['link']; ?>" alt="profile">
            <div class="applicant-info">
              <span><?php echo $row3['achivement']; ?></span>
              <p><?php echo $row3['achivementdesc']; ?></p>
            </div>
          </div>
          <?php
           }}
           ?>
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
			borderWidth: 2,
			borderColor: '#ffff',
			data: [<?php echo (mysqli_num_rows($sql4)) ?>, <?php echo (mysqli_num_rows($sql5)); ?>, <?php echo(mysqli_num_rows($sql6)); ?>, <?php echo (mysqli_num_rows($sql7)); ?>, <?php echo (mysqli_num_rows($sql8)); ?>, <?php echo (mysqli_num_rows($sql9)); ?>,  <?php echo (mysqli_num_rows($sql10)); ?>]
    },
      {
			label: 'Not Solve',
			pointBackgroundColor: '#ff0000',
			borderWidth: 2,
			borderColor: '#ff0000',
			data: [<?php echo ((mysqli_num_rows($sql11) * mysqli_num_rows($sql34))-mysqli_num_rows($sql4)); ?>, <?php echo ((mysqli_num_rows($sql12) * mysqli_num_rows($sql34))-mysqli_num_rows($sql5)); ?>, <?php echo((mysqli_num_rows($sql13) * mysqli_num_rows($sql34))- mysqli_num_rows($sql6)); ?>, <?php echo ((mysqli_num_rows($sql14) * mysqli_num_rows($sql34))-mysqli_num_rows($sql7)); ?>, <?php echo ((mysqli_num_rows($sql15) * mysqli_num_rows($sql34))-mysqli_num_rows($sql8)); ?>, <?php echo ((mysqli_num_rows($sql16) * mysqli_num_rows($sql34))-mysqli_num_rows($sql9)); ?>,  <?php echo ((mysqli_num_rows($sql17) * mysqli_num_rows($sql34))-mysqli_num_rows($sql10)); ?>]
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
