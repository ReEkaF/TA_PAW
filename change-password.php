<?php

$title = 'Change Password';

require_once('layouts/header.php');

?>

<!-- content -->
<main class="profile container">
  <div class="profile__header">
    <h1>Change Password</h1>
  </div>
  <div class="profile__body">
    <form action="./change-password.php" method="post" class="profile__right">
      <div class="profile__form">
        <div>
          <label for="password" class="input-label">New Password</label>
          <input type="text" id="password" class="input" />
          <div class="input-help">
            Password terdiri dari 8 karakter (huruf dan angka)
          </div>
          <div class="input-error">Invalid password.</div>
        </div>
        <div>
          <label for="confirm_password" class="input-label">Retype New Password</label>
          <input type="text" id="confirm_password" class="input" />
          <div class="input-error">Invalid confirm password.</div>
        </div>
        <div>
          <button type="submit" class="profile__button">Simpan</button>
        </div>
      </div>
    </form>
  </div>
</main>
<!-- end content -->

<?php

require_once('layouts/footer.php');

?>