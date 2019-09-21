<?php
  session_start();
  if (isset($_SESSION['username'])) {
    header('Location: dashboard.php?m=You are already logged in!');
  }
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!--icon-->
    <link rel="icon" href="favicon.ico">
    <!-- Font Awesome icons -->
    <link rel="stylesheet" href="./css/all.css">
    <!--css file-->
    <link rel="stylesheet" href="./css/main.css">
  </head>
  <body>
    <div class="container">
      <i class="fa fa-lock"></i>
      <h2 class="title">Sign Up</h2>
      <form class="" action="index.html" method="post">
        <span class="error"><?php if (isset($_GET['m'])){echo $_GET['m'];} ?></span>
        <p>
          <input type="mail" name="mail" value="" class="mail" placeholder="Email">
        </p>
        <p>
          <input type="text" name="" value="" class="username" placeholder="Username">
        </p>
        <p>
          <input type="password" name="" value="" class="password" placeholder="Password">
          <i class="fa fa-eye-slash toggle-pass"></i>
        </p>
        <button type="button" name="button" class="submit">Submit <i class="fa fa-arrow-right"></i></button>
      </form>
      <p class="other">Already have an account? <a href="login.php">Log in</a></p>
    </div>

    <script src="./js/join.js" charset="utf-8"></script>
  </body>
</html>
