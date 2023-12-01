<link rel="stylesheet" href="./assets/css/profile.css">
<?php

  session_start();

  // cek apakah cust sudah login
  if (!isset($_SESSION['customer_id'])) {
    header("Location: ./login.php");
    exit();
  }
  require_once('data/customer.php');
  // AMBIL DATA CUST
  $customer = find_customer_with_id($_SESSION['customer_id']);

  $title = 'Profil';
  require('layouts/header.php');


?>

<!-- css customs -->


<!-- content -->
<main>
  <!-- profile -->
  <div class="profile container">
    <div class="profile__header">
      <h1>Profil Saya</h1>
    </div>
    <div class="profile__body">
      <div class="profile__left">
        <!-- FOTO CUST -->
        <img src="<?= $customer['customer_photo'] == null ? './assets/img/default-profile.jpg' : './assets/img/profiles/' . $customer['customer_photo'] ?>" alt="<?= $customer['customer_name'] ?>" />

      </div>
        <div class="profile__form">
          <div>
            <!-- NAMA  -->
            <a class="input-label">Nama</a>
            <a class="input" ><?= $customer['customer_name'] ?></a>
          </div>
          <div>
            <!-- EMAIL -->
            <a class="input-label">Email</a>
            <a class="input"><?= $customer['customer_email'] ?></a>
          </div>
          <div>
            <!-- NO TELEPHONE -->
            <a class="input-label">Telepon</a>
            <a class="input" ><?= $customer['customer_phone'] ?></a>
          </div>
          <!-- TOMBOL UBAH DATA (ubahprofil) -->
          <form method="POST" action="editprofile.php">
            <div>
            <input type="submit" name="ubahprofil" value="UBAH DATA" class="profile__button">
            </div>
          </form>
        </div>
    </div>
  </div>
  <!-- end profile -->
</main>
<!-- end content -->

<?php
// FOOTER
require('layouts/footer.php');

?>
