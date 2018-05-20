<?php
session_start();

require_once 'database.php';

require_once 'fetch_all.php';

if(isset($_POST['username'])){

  $username=$_POST['username'];
  $password=$_POST['password'];

  $userID = checkLoginInformation($db,$username,$password);
  if($userID > 0){
    $_SESSION["loggedIn"] = true;
    $_SESSION["userID"] = $userID;
    $_SESSION["username"] = $username;
    $u1  = $_SESSION["loggedIn"];
    $u2  = $_SESSION["username"];

    header('Location: ../index.php');

  } else {
    echo "Login failed";
    echo '<a href="../index.php">Back to index</a>';

  }

}


?>
