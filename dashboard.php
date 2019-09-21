<?php
  include_once 'includes/login_checker.php';
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
    <header>
      <span class="logo">HNG Dashboard</span>
      <span class="user-details">
        <i class="fa fa-user"></i> <?php echo $_SESSION['username']; ?>
        <a href="functions/logouter.php"><i class="fa fa-power"></i>Logout</a>
      </span>
    </header>
    <div class="settings">
      <p><?php echo $_GET['m']; ?></p>
      <h2>User details</h2>
      <p>username: <?php echo $_SESSION['username']; ?></p>
    </div>

  </body>
</html>
