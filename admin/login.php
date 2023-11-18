<?php

require_once('layouts/header-two.php');

?>

<!-- content -->
<main class="register container">
  <form action="./login.php" method="post" class="register__form">
    <h1>Login Staff</h1>
    <div>
      <label for="email" class="input-label">Email</label>
      <input type="text" id="email" class="input" />
      <div class="input-error">Invalid email.</div>
    </div>
    <div>
      <label for="password" class="input-label">Password</label>
      <input type="password" id="password" class="input" />
      <div class="input-error">Invalid password.</div>
    </div>
    <button type="submit" class="register__button">Login</button>
    <p>Belum punya akun? <a href="./register.php">Register</a></p>
    <p>
      <a href="../login.php">Login Customer</a>
    </p>
  </form>
</main>
<!-- end content -->

<?php

require_once('layouts/footer-two.php');

?>