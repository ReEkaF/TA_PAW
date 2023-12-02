<?php

session_start();

if (!isset($_SESSION['staff_id'])) {
  header("Location: ./login.php");
  exit();
}

if ($_SESSION['role_name'] != 'administrator') {
  header("Location: ./index.php");
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
        <img src="../assets/img/default-profile.jpg" alt="<?= $customer['customer_name'] ?>" class="page-single__img" />
        <div>
          <label for="name" class="input-label">Nama</label>
          <input type="text" id="name" class="input" value="<?= $customer['customer_name'] ?>" readonly disabled />
        </div>
        <div>
          <label for="phone" class="input-label">Telepon</label>
          <input type="text" id="phone" class="input" value="<?= $customer['customer_phone'] ?>" readonly disabled />
        </div>
        <div>
          <label for="email" class="input-label">Email</label>
          <input type="text" id="email" class="input" value="<?= $customer['customer_email'] ?>" readonly disabled />
        </div>
      </div>
    </div>
  </div>
</div>
<!-- end your content in here -->

<?php

require('layouts/footer.php');

?>