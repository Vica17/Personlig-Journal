<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="/victoria_nordkvist_journal/css/journal.css">
  <title>My Journal</title>
</head>
<body>
  <?php
  session_start();
  if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > 900)) {
    // last request was more than 15 minutes ago
    session_unset();
    session_destroy();
    header('Location: ../index.php');
  }
  $_SESSION['LAST_ACTIVITY'] = time();
  if (isset($_SESSION["loggedIn"])):?>
  <div class="header">
    <div class="logo">
      <img class="logo" src="../images/logo.png" alt="logo" />
    </div>
    <nav class="navbar">
      <a href='logout.php'>Logout</a>
    </nav>
  </div>
  <section class="container">
    <form action="store_post_in_database.php" method="POST" name="postForm">
      <h3>Make a post</h3>

      <label for="title">Title</label>
      <input type="text"
             placeholder="Title"
             name="title"
             id="title"
             class="row">

      <label for="subject">Subject</label>
      <textarea name="content"
                placeholder="Write something"
                id="subject"
                class="row"></textarea>

      <input type="submit"
             value="Submit"
             class="btn">
    </form>
  </section>
  <section class="blogpost">
    <?php
    require_once 'database.php';
    require_once '../classes/Entry.php';
    $userID = $_SESSION["userID"];

    $statement=$db->prepare(

      "SELECT * FROM entries WHERE userID=$userID ORDER BY createdAt DESC"
    );
    $statement->execute();
    $results = $statement->fetchAll();
    foreach($results as $result){
      $entryID = $result['entryID'];
      $title = $result['title'];
      $content = $result['content'];
      $createdAt = $result['createdAt'];
      $userID = $result['userID'];
      $entry = new Entry($entryID,$title,$content,$createdAt,$userID);
      echo "<b>$entry->title</b><br><br>$entry->content<br><br>$entry->createdAt<br><br>"
      . "<a href=deletePost.php?entryID=$entry->entryID class='link-btn'>Delete</a><a href=edit_entry.php?entryID=$entry->entryID class='link-btn'>Edit</a><br><br><br>";
    }
    ?>
  </section>
<?php endif;
?>
<?php require 'footer.php'; ?>
