<?php

$title = 'Login';

require_once('layouts/header.php');

?>

<!-- content -->
<main class="login container">
  <form action="./logi.php" method="get" class="login__left">
    <h1>Login</h1>
    <div>
      <label for="email" class="input-label">Email</label>
      <input type="text" name="email" id="email" class="input" />
      <div class="input-error">Email tidak valid.</div>
    </div>
    <div>
      <label for="password" class="input-label">Password</label>
      <input type="password" name="password" id="password" class="input" />
      <div class="input-error">Password tidak valid.</div>
    </div>
    <button type="submit" name='submit' class="login__button" value="LOGIN">Login</button>
    <p>Belum punya akun? <a href="./regis-master.php">Register</a></p>
    <p>
      <a href="./admin/login.php">Login Staff</a>
    </p>
  </form>
  <div class="login__right">
    <img src="./assets/img/plant-illustration.jpeg" alt="" />
  </div>
</main>
<!-- end content -->

<?php

require_once('layouts/footer.php');

?>
