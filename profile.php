<?php

session_start();

if (!isset($_SESSION['customer_id'])) {
  header("Location: ./login.php");
  exit();
}

require_once('data/customer.php');

$customer = find_customer_with_id($_SESSION['customer_id']);

$title = 'Profil Saya';
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
      <form action="./editprofile.php" method="get" class="profile__right">
        <div class="profile__form">
          <div>
            <label for="name" class="input-label">Nama</label>
            <input type="text" id="name" class="input" value="<?= $customer['customer_name'] ?>" readonly disabled />
          </div>
          <div>
            <label for="email" class="input-label">Email</label>
            <input type="text" id="email" class="input" value="<?= $customer['customer_email'] ?>" readonly disabled />
          </div>
          <div>
            <label for="phone" class="input-label">Telepon</label>
            <input type="text" id="phone" class="input" value="<?= $customer['customer_phone'] ?>" readonly disabled />
          </div>
          <div>
            <button type="submit" class="profile__button">Ubah Data</button>
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