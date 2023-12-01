<?php

error_reporting(E_ALL);
session_start();

if (!isset($_SESSION['customer_id'])) {
  header("Location: ./login.php");
  exit();
}

require_once("config/database.php");
require_once("libs/validation.php");

$db = new PDO('mysql:host=localhost;dbname=' . DB_NAME, DB_USERNAME, DB_PASSWORD, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
$errors = [];

$success = [];
if (isset($_POST['ubahpass'])) {
  validate_password($errors, $_POST, 'password');
  if (!$errors) {
    if ($_POST['password'] == $_POST['confirm_password']) {
      $ubahpass = $db->prepare("UPDATE customers SET customer_password = :pwd WHERE customer_id = :custid ");
      $ubahpass->bindValue(":pwd", password_hash(trim($_POST['password']), PASSWORD_DEFAULT));
      $ubahpass->bindValue(":custid", $_SESSION['customer_id']);
      $ubahpass->execute();
      $success['berhasil'] = "PASSWORD BERHASIL DIUBAH";
      $_POST['password'] = '';
    } else {
      $errors['confirm_password'] = 'PASSWORD BERBEDA';
    }
  }
}

$title = 'Ubah Password';
require('layouts/header.php');

?>

<!-- css customs -->
<link rel="stylesheet" href="./assets/css/profile.css">

<!-- content -->
<main>
  <!-- profile -->
  <div class="profile container">
    <div class="profile__header">
      <h1>Ubah Password</h1>
    </div>
    <div class="profile__body">

      <form action="./change-password.php" method="post" class="profile__right">
        <?php if (isset($success['berhasil'])) {
          echo "<div class='alert alert_success'> {$success['berhasil']} </div>";
        } ?>
        <div class="profile__form">
          <div>

            <label for="password" class="input-label">Password Baru <span class="text-danger">*</span></label>
            <input type="password" id="password" name="password" class="input" value="<?= isset($_POST['password']) ? $_POST['password'] : ''  ?>" />
            <div class="input-help">Harus berisi 8-16 karakter dengan minimal 1 huruf besar, 1 huruf kecil, 1 karakter spesial, dan tidak boleh mengandung spasi.</div>
            <div class="input-error"><?= isset($errors['password']) ? $errors['password'] : '' ?></div>
          </div>
          <div>
            <label for="confirm_password" class="input-label">Ketik Ulang Password <span class="text-danger">*</span></label>
            <input type="password" id="confirm_password" name="confirm_password" class="input" />
            <div class="input-error"><?= isset($errors['confirm_password']) ? $errors['confirm_password'] : '' ?></div>
          </div>
          <div>
            <button type="submit" name="ubahpass" class="profile__button">Simpan</button>
          </div>
        </div>
      </form>
    </div>
  </div>
  <!-- end profile -->
</main>
<!-- end content -->

<?php

require('layouts/footer.php');

?>