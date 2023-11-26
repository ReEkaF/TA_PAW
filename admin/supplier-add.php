<?php

session_start();

if (!isset($_SESSION['staff_id'])) {
  header("Location: ./login.php");
  exit();
}

require_once('../data/supplier.php');
require_once('../libs/validation.php');

$errors = [];
$old_inputs = [
  'name' => '',
  'phone' => '',
  'address' => '',
];

if (isset($_POST['submit'])) {
  validate_name($errors, $_POST, 'name');
  validate_phone($errors, $_POST, 'phone');
  validate_address($errors, $_POST, 'address');

  if (!$errors) {
    save_supplier($_POST);
    header('Location: ./suppliers.php');
    exit();
  }

  $old_inputs['name'] = $_POST['name'];
  $old_inputs['phone'] = $_POST['phone'];
  $old_inputs['address'] = $_POST['address'];
}

$page = 'suppliers';
$title = 'Tambah Pemasok';
require('layouts/header.php');

?>

<!-- css customs -->
<link rel="stylesheet" href="../assets/css/admin/page-single.css">

<!-- your content in here -->
<div class="admin">
  <div class="admin__header">
    <div class="admin__back">
      <i class="ph-bold ph-arrow-left"></i>
      <a href="./suppliers.php">Kembali</a>
    </div>
    <h1 class="admin__title">Tambah pemasok</h1>
  </div>
  <div class="admin__body">
    <div class="admin__card">
      <form action="./supplier-add.php" method="post" class="page-single">
        <div>
          <label for="name" class="input-label">Nama <span class="text-danger">*</span></label>
          <input type="text" id="name" name="name" class="input" value="<?= $old_inputs['name'] ?>" />
          <?php if (isset($errors['name'])) : ?>
            <div class="input-error">
              <?= $errors['name'] ?>
            </div>
          <?php endif; ?>
        </div>
        <div>
          <label for="phone" class="input-label">Telepon <span class="text-danger">*</span></label>
          <input type="text" id="phone" name="phone" class="input" value="<?= $old_inputs['phone'] ?>" />
          <?php if (isset($errors['phone'])) : ?>
            <div class="input-error">
              <?= $errors['phone'] ?>
            </div>
          <?php endif; ?>
        </div>
        <div>
          <label for="address" class="input-label">Alamat <span class="text-danger">*</span></label>
          <input type="text" id="address" name="address" class="input" value="<?= $old_inputs['address'] ?>" />
          <?php if (isset($errors['address'])) : ?>
            <div class="input-error">
              <?= $errors['address'] ?>
            </div>
          <?php endif; ?>
        </div>
        <div class="page-single__actions">
          <a href="./suppliers.php" class="page-single__button">Batal</a>
          <button type="submit" name="submit" class="page-single__button page-single__button_primary">
            Tambah
          </button>
        </div>
      </form>
    </div>
  </div>
</div>
<!-- end your content in here -->

<?php

require('layouts/footer.php');

?>