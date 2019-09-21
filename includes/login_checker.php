<?php
  session_start();
  if (!isset($_SESSION['username'])) {
    header('Location: ../login.php?m=You must login first!');
  }
 ?>
