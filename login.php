<?php

session_start();

if (isset($_SESSION['customer_id'])) {
  header("Location: ./products.php");
  exit();
}

require_once('data/customer.php');
require_once('libs/validation.php');

$login_error = null;
$errors = [];
$old_inputs = [
  'email' => '',
];

if (isset($_POST['submit'])) {
  validate_email($errors, $_POST, 'email');
  validate_password($errors, $_POST, 'password');

  if (!$errors) {
    $customer = find_customer($_POST['email']);

    if ($customer) {
      if (password_verify($_POST['password'], $customer['customer_password'])) {
        $_SESSION['customer_id'] = $customer['customer_id'];
        $_SESSION['customer_email'] = $customer['customer_email'];
        $_SESSION['customer_photo'] = $customer['customer_photo'];
        header("Location: ./products.php");
        exit();
      }
    }

    $login_error = 'Email atau password salah!';
  }

  $old_inputs['email'] = $_POST['email'];
}

$title = 'Login';
require('layouts/header.php');

?>

<!-- css customs -->
<link rel="stylesheet" href="./assets/css/login.css">

<!-- content -->
<main>
  <!-- login -->
  <div class="login container">
    <form action="./login.php" method="post" class="login__left">
      <h1>Login</h1>
      <?php if ($login_error != null) : ?>
        <div class="alert alert_danger">
          <?= $login_error; ?>
        </div>
      <?php endif; ?>
      <?php if (isset($_GET['success_message'])) : ?>
        <div class="alert alert_success">
          <?= $_GET['success_message']; ?>
        </div>
      <?php endif; ?>
      <div>
        <label for="email" class="input-label">Email <span class="text-danger">*</span></label>
        <input type="text" name="email" id="email" class="input" value="<?= $old_inputs['email'] ?>" />
        <?php if (isset($errors['email'])) : ?>
          <div class="input-error"><?= $errors['email'] ?></div>
        <?php endif; ?>
      </div>
      <div>
        <label for="password" class="input-label">Password <span class="text-danger">*</span></label>
        <input type="password" name="password" id="password" class="input" />
        <div class="input-help">Harus berisi 8-16 karakter dengan minimal 1 huruf besar, 1 huruf kecil, 1 karakter spesial, dan tidak boleh mengandung spasi.</div>
        <?php if (isset($errors['password'])) : ?>
          <div class="input-error"><?= $errors['password'] ?></div>
        <?php endif; ?>
      </div>
      <button type="submit" name="submit" class="login__button">Masuk</button>
      <p>Belum punya akun? <a href="./register.php">Daftar</a></p>
      <p>
        <a href="./admin/login.php">Login Staff</a>
      </p>
    </form>
    <div class="login__right">
      <img src="./assets/img/plant-illustration.jpeg" alt="" />
    </div>
  </div>
  <!-- end login -->
</main>
<!-- end content -->

<?php

require('layouts/footer.php');

?>