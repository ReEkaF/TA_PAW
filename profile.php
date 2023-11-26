<?php

session_start();

if (!isset($_SESSION['customer_id'])) {
  header("Location: ./login.php");
  exit();
}

require_once('data/customer.php');

$customer = find_customer($_SESSION['customer_email']);

$title = 'Profil';
require('layouts/header.php');

?>

<!-- css customs -->
<link rel="stylesheet" href="./assets/css/profile.css">

<!-- content -->
<main>
  <!-- profile -->
  <div class="profile container">
    <div class="profile__header">
      <h1>Profil Saya</h1>
    </div>
    <div class="profile__body">
      <div class="profile__left">
        <img src="<?= $customer['customer_photo'] == null ? './assets/img/default-profile.jpg' : './assets/img/profiles/' . $customer['customer_photo'] ?>" alt="<?= $customer['customer_name'] ?>" />
      </div>
      <form action="./profile.php" method="post" class="profile__right">
        <div class="profile__form">
          <div>
            <label for="name" class="input-label">Nama <span class="text-danger">*</span></label>
            <input type="text" id="name" class="input" value="<?= $customer['customer_name'] ?>" />
            <div class="input-error">Invalid name.</div>
          </div>
          <div>
            <label for="email" class="input-label">Email <span class="text-danger">*</span></label>
            <input type="text" id="email" class="input" value="<?= $customer['customer_email'] ?>" />
            <div class="input-error">Invalid email.</div>
          </div>
          <div>
            <label for="phone" class="input-label">Telepon <span class="text-danger">*</span></label>
            <input type="text" id="phone" class="input" value="<?= $customer['customer_phone'] ?>" />
            <div class="input-error">Invalid phone.</div>
          </div>
          <div>
            <label for="photo" class="input-label">Foto</label>
            <input type="file" id="photo" class="input" />
            <div class="input-error">Invalid photo.</div>
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