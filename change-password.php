<?php

session_start();

if (!isset($_SESSION['customer_id'])) {
  header("Location: ./login.php");
  exit();
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
        <div class="profile__form">
          <div>
            <label for="password" class="input-label">Password Baru <span class="text-danger">*</span></label>
            <input type="text" id="password" class="input" />
            <div class="input-help">Harus berisi 8-16 karakter dengan minimal 1 huruf besar, 1 huruf kecil, 1 karakter spesial, dan tidak boleh mengandung spasi.</div>
            <div class="input-error">Invalid password.</div>
          </div>
          <div>
            <label for="confirm_password" class="input-label">Ketik Ulang Password <span class="text-danger">*</span></label>
            <input type="text" id="confirm_password" class="input" />
            <div class="input-error">Invalid confirm password.</div>
          </div>
          <div>
            <button type="submit" class="profile__button">Simpan</button>
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