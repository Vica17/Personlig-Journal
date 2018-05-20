<?php require_once 'head.php'; ?>
<section class="content">
  <div class="form">
    <form action="register.php" method="POST" name="postForm">
      <h1>Register User</h1>
      <input type="text"
      placeholder="Username"
      name="username"
      class="user"/>
      <input type="text"
      placeholder="Password"
      name="password"
      class="pass"/>
      <input type="submit"
      class="signup"
      value="Register user"/>
    </form>
  </div>
</section>
<?php require 'footer.php'; ?>
