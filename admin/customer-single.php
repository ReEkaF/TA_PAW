<?php

session_start();

if (!isset($_SESSION['staff_id'])) {
  header("Location: ./login.php");
  exit();
}

if (!isset($_GET['customer_email'])) {
  header("Location: ./customers.php");
  exit();
}

require_once('../data/customer.php');

$customer = find_customer($_GET['customer_email']);

if (!$customer) {
  header("Location: ./customers.php");
  exit();
}

$page = 'customers';
$title = 'Detail Pelanggan';
require('layouts/header.php');

?>

<!-- css customs -->
<link rel="stylesheet" href="../assets/css/admin/page-single.css">

<!-- your content in here -->
<div class="admin">
  <div class="admin__header">
    <div class="admin__back">
      <i class="ph-bold ph-arrow-left"></i>
      <a href="./customers.php">Kembali</a>
    </div>
    <h1 class="admin__title">Detail pelanggan</h1>
  </div>
  <div class="admin__body">
    <div class="admin__card">
      <div class="page-single">
        <img src="<?= $customer['customer_photo'] == null ? '../assets/img/default-profile.jpg' : '../assets/img/profiles/' . $customer['customer_photo'] ?>" alt="<?= $customer['customer_name'] ?>" class="page-single__img" />
        <div>
          <label for="name" class="input-label">Nama</label>
          <input type="text" id="name" class="input" value="<?= $customer['customer_name'] ?>" readonly />
        </div>
        <div>
          <label for="phone" class="input-label">Telepon</label>
          <input type="text" id="phone" class="input" value="<?= $customer['customer_phone'] ?>" readonly />
        </div>
        <div>
          <label for="email" class="input-label">Email</label>
          <input type="text" id="email" class="input" value="<?= $customer['customer_email'] ?>" readonly />
        </div>
      </div>
    </div>
  </div>
</div>
<!-- end your content in here -->

<?php

require('layouts/footer.php');

?>