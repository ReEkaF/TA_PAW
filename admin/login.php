<?php

session_start();

if (isset($_SESSION['staff_id'])) {
  header("Location: ./index.php");
  exit();
}

require_once('../data/staff.php');
require_once('../libs/validation.php');

$login_error = null;
$errors = [];
$old_inputs = [
  'email' => '',
];

if (isset($_POST['submit'])) {
  validate_email($errors, $_POST, 'email');
  validate_password($errors, $_POST, 'password');

  if (!$errors) {
    $staff = find_staff_with_role($_POST['email']);

    if ($staff) {
      if (password_verify($_POST['password'], $staff['staff_password'])) {
        $_SESSION['role_name'] = $staff['role_name'];
        $_SESSION['staff_id'] = $staff['staff_id'];
        $_SESSION['staff_name'] = $staff['staff_name'];
        $_SESSION['staff_photo'] = $staff['staff_photo'];
        header("Location: ./index.php");
        exit();
      }
    }

    $login_error = 'Email atau password salah!';
  }

  $old_inputs['email'] = htmlspecialchars($_POST['email']);
}

$title = 'Login Staff';
require('layouts/header-two.php');

?>

<!-- css customs -->
<link rel="stylesheet" href="../assets/css/register.css">

<!-- content -->
<main>
  <!-- register -->
  <div class="register container">
    <form action="./login.php" method="post" class="register__form">
      <h1>Login Staff</h1>
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
        <?php endif ?>
      </div>
      <div>
        <label for="password" class="input-label">Password <span class="text-danger">*</span></label>
        <input type="password" name="password" id="password" class="input" />
        <div class="input-help">Harus berisi 8-16 karakter dengan minimal 1 huruf besar, 1 huruf kecil, 1 karakter spesial, dan tidak boleh mengandung spasi.</div>
        <?php if (isset($errors['password'])) : ?>
          <div class="input-error"><?= $errors['password'] ?></div>
        <?php endif ?>
      </div>
      <button type="submit" name="submit" class="register__button">Masuk</button>
      <p>Belum punya akun? <a href="./register.php">Daftar</a></p>
      <p>
        <a href="../login.php">Login Customer</a>
      </p>
    </form>
  </div>
  <!-- end register -->
</main>
<!-- end content -->

<?php

require('layouts/footer-two.php');

?>