<?php require_once 'head.php'; ?>
<?php
require_once 'database.php';
$entryID = $_GET["entryID"];
$statement=$db->prepare(
  "SELECT * FROM `entries` WHERE entryID=$entryID"
);
$statement->execute();
$result = $statement->fetchAll();

$row = $result[0];
$title = $row["title"];
$content = $row["content"];
?>
<section class="content">
  <div class="form">
    <form action="update_post.php" method="POST" name="postForm">
      <h1>Edit a post</h1>
      <input type="text" name="title" class="title" value="<?php echo $title; ?>">
      <textarea rows="4" cols="50"  name="content" class="description">
        <?php echo $content; ?></textarea>
        <input type="hidden" name="entryID" value="<?php echo $entryID; ?>">
        <input type="submit" value="Update Post" class="confirm">
      </form>
    </div>
  </section>
  <?php require 'footer.php'; ?>
