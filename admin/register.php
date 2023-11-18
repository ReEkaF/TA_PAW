<?php

require_once('layouts/header-two.php');

?>

<!-- content -->
<main class="register container">
  <form action="./login.php" method="post" class="register__form">
    <h1>Register Staff</h1>
    <div>
      <label for="name" class="input-label">Name</label>
      <input type="text" id="name" class="input" />
      <div class="input-error">Invalid name.</div>
    </div>
    <div>
      <label for="email" class="input-label">Email</label>
      <input type="text" id="email" class="input" />
      <div class="input-error">Invalid email.</div>
    </div>
    <div>
      <label for="password" class="input-label">Password</label>
      <input type="password" id="password" class="input" />
      <div class="input-help">Minimal 8 karakter.</div>
      <div class="input-error">Invalid password.</div>
    </div>
    <div>
      <label for="phone" class="input-label">Phone</label>
      <input type="text" id="phone" class="input" />
      <div class="input-error">Invalid phone.</div>
    </div>
    <div>
      <label for="photo" class="input-label">Photo</label>
      <input type="file" id="photo" class="input" />
      <div class="input-error">Invalid photo.</div>
    </div>
    <div>
      <label for="referral_code" class="input-label">Referral Code</label>
      <input type="text" id="referral_code" class="input" />
      <div class="input-error">Invalid referral code.</div>
    </div>
    <button type="submit" class="register__button">Register</button>
    <p>
      Sudah punya akun? <a href="./login.php">Login</a>
      <br />
    </p>
    <p>
      <a href="../login.php">Login Customer</a>
    </p>
  </form>
</main>
<!-- end content -->

<?php

require_once('layouts/footer-two.php');

?>