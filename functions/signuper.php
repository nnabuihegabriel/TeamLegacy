<?php
  $mail = $_POST['mail'];
  $username = $_POST['username'];
  $password = $_POST['password'];
  $id = $_POST['id'];

  session_start();

  if (isset($_SESSION['username'])) {
    exit("already set");
  }

  if ($username && $password && $mail) {
    include_once 'fetch-json.php';
    //fetch the details from the database
    $db = new Worker('../db/users.json');
    $db->_decode();
    $users = $db->json_array;

    for ($i=0; $i < count($users); $i++) {
      if ($username == $users[$i]['username']) {
        exit('Username already exists');
      }
    }

    $user = array(
      "id"=> $id,
      "username"=> $username,
      "mail"=> $mail,
      "password"=> $password
    );
    if ($db->_insert($user)) {
        exit('set');
    } else {
      exit("please try again");
    }
  } else {
    exit("Please fill all fields!");
  }
 ?>
