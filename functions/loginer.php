<?php
  $username = $_POST['username'];
  $password = $_POST['password'];

  session_start();

  if (isset($_SESSION['username'])) {
    exit("already set");
  }

  if ($username && $password) {
    include_once 'fetch-json.php';
    //fetch the details from the database
    $db = new Worker('../db/users.json');
    $db->_decode();
    $users = $db->json_array;
    $user = array();

    for ($i=0; $i < count($users); $i++) {
      if ($username == $users[$i]['username']) {
        if ($password === $users[$i]['password']) {
          $_SESSION['username'] = $username;
          exit('set');
        } else {
          exit('Incorrect Password');
        }
      }
    }
    exit('Username not found');
  } else {
    exit("Please fill all fields!");
  }
 ?>
