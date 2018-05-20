<?php
session_start();
require_once 'database.php';


$statement = $db->prepare(
  "UPDATE entries SET title=:title, content=:content where entryID=:entryID"
);
$statement->execute([
  ":title" => $_POST["title"],
  ":content" => $_POST["content"],
  ":entryID" => $_POST["entryID"]
]);

header('Location: ../index.php');
?>
