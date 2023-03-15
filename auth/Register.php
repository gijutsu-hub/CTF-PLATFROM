<?php
include('../security/mobile.php'); 
?>
<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Auth Page</title>
  <link rel="stylesheet" href="./style.css">
  <script src="https://www.google.com/recaptcha/api.js" async defer>
    </script>

</head>  
<body>
<!-- partial:index.partial.html -->
<section class="wrapper">
  <div class="content">
    <header>
      <h1>Register Now</h1>
    </header>
    <section>
      <div class="social-login">
        <button onclick="location.href='login.php'" ><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-activity"><path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="8.5" cy="7" r="4"></circle><line x1="20" y1="8" x2="20" y2="14"></line><line x1="23" y1="11" x2="17" y2="11"></line></svg><span>Login</span></button>
        <button onclick="location.href='userid.php'"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-activity"><path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="8.5" cy="7" r="4"></circle><polyline points="17 11 19 13 23 9"></polyline></svg><span>Get Userid</span></button>
      </div>
      <form action="close.php" method="post" class="login-form">
        <div class="input-group">
          <label for="username">Username</label>
          <input type="text" placeholder="Username" name="username" required>
        </div>
        <div class="input-group">
          <label for="username">Email</label>
          <input type="email" placeholder="doe@emaple.com" name="email" required>
        </div>
        <div class="input-group">
          <label for="password">Password</label>
          <input type="password" placeholder="Password" name="password" required>
        </div>
        <div class="input-group">
        <div class="g-recaptcha"  data-sitekey="6Lc23xcdAAAAAL1YQxDM01iUS29udCAG89Fnlb7B">
            </div>
        </div>
        <div>
        <div class="input-group">
        <label for="t&c">By clicking the register button I am accepting the <a href="#">Terms & Conditions</a></label>
        </div>
        <div class="input-group" ><button>Register</button></div>
      </form>
    </section>
    <footer>
    <div class="input-group">
    <?php session_start(); ?>
    <?php if (isset($_SESSION['errors'])): ?>
    <?php foreach($_SESSION['errors'] as $error): ?>
      <label class='error'><?php echo $error ?></lable>
    <?php endforeach; ?>
    <?php endif; ?>
    </div>
    </footer>
  </div>
</section>
<!-- partial -->
 
</body>
</html>
