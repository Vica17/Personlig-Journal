<?php
session_start();
require_once 'database.php';

$statement = $db->prepare(
  "INSERT INTO entries(entryID, title, content, createdAt, userID)
  VALUES (:entryID, :title, :content, :createdAt, :userID)"
);
$date = date('Y-m-d H:i:s');
$statement->execute([
  ":entryID" => rand(),
  ":title" => $_POST["title"],
  ":content" => $_POST["content"],
  ":createdAt" => $date,
  ":userID" => $_SESSION["userID"]
]);

header('Location: ../index.php');

?>
