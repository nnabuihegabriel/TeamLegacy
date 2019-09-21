<?php
  session_start();
  session_destroy();
  header('Location: ../login.php?m=Sucessfully Logged out!');
 ?>
