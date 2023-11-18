<?php

$title = 'Register';

require_once('layouts/header.php');

?>

<!-- content -->
<main class="register container">
  <form action="./logi.php" method="get" class="register__form">
    <h1>Register</h1>
    <div>
      <label for="name" class="input-label">Name</label>
      <input type="text" name="name" id="name" class="input" />
      <div class="input-error">Invalid name.</div>
    </div>
    <div>
      <label for="email" class="input-label">Email</label>
      <input type="text" name="email" id="email" class="input" />
      <div class="input-error">Invalid email.</div>
    </div>
    <div>
      <label for="phone" class="input-label">Phone</label>
      <input type="text" name="phone" id="phone" class="input" />
      <div class="input-error">Invalid phone.</div>
    </div>
    <div>
      <label for="photo" class="input-label">Photo</label>
      <input type="file" name="photo" id="photo" class="input" />
      <div class="input-error">Invalid photo.</div>
    </div>
    <div>
      <label for="password" class="input-label">Password</label>
      <input type="password" name="password" id="password" class="input" />
      <div class="input-help">Minimal 8 karakter.</div>
      <div class="input-error">Invalid password.</div>
    </div>
    <div>
      <label for="password_confirm" class="input-label">Password Confirm</label>
      <input type="password" name="password_confirm" id="password_confirm" class="input" />
      <div class="input-help">Minimal 8 karakter.</div>
      <div class="input-error">Invalid password.</div>
    </div>
    <button type="submit" class="register__button">Register</button>
    <p>
      Sudah punya akun? <a href="./login.php">Login</a>
    </p>
    <p>
      <a href="./admin/login.php">Login Staff</a>
    </p>
  </form>
</main>
<!-- end content -->

<?php

require_once('layouts/footer.php');

?>