<?php
session_start();
require_once 'database.php';

$entryID=$_GET['entryID'];

$statement=$db->prepare(
  "DELETE FROM `entries` WHERE entryID='$entryID'"
);
$statement->execute();

header('Location: ../index.php');

?>
