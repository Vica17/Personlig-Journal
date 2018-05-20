<?php

function checkLoginInformation($db,$username,$password) {

  echo "password" . $password . " username " . $username;
  $statement=$db->prepare(
    "SELECT `userID`, `username`, `password` FROM `users` WHERE username='$username'"
  );

  $statement->execute();
  $result = $statement->fetchAll();


  if(sizeOf($result) == 1){
    $row = $result[0];
    if(password_verify($password,$row["password"]))
    return $row["userID"];


  } else {
    return -1;
  }
}
