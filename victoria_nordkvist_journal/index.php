<?php  require_once 'partials/head.php';
session_start();
if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > 900)) {
  session_unset();
  session_destroy();
}
$_SESSION['LAST_ACTIVITY'] = time();


session_start();
if (!isset($_SESSION["loggedIn"])):?>

<section class="content">
  <div class="form">
    <form action="partials/login.php" method="POST">
      <h1>Login</h1>
      <input type="text"
      placeholder="Username"
      name="username"
      class="user">
      <input type="password"
      placeholder="Password"
      name="password"
      class="pass">
      <button class="login">Login</button>
      <a class="button" href="partials/registerUser.php">Sign up</a>
    </form>
  </div>
</section>


<?php endif; ?>

<?php

if (isset($_SESSION["loggedIn"])):


  header('Location: partials/logged_in.php');
  ?>

<?php endif; ?>



<?php require 'partials/footer.php'; ?>
