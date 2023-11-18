<?php

$page = 'categories';
$title = 'Category Single';

require_once('layouts/header.php');

?>

<!-- your content in here -->
<div class="admin">
  <div class="admin__header">
    <div class="admin__back">
      <i class="ph-bold ph-arrow-left"></i>
      <a href="./categories.php">Kembali</a>
    </div>
    <h1 class="admin__title">Category single</h1>
  </div>
  <div class="admin__body">
    <div class="admin__card">
      <form action="./category-single.php" method="post" class="page-single">
        <div>
          <label for="email" class="input-label">Name</label>
          <input type="text" id="email" class="input" />
          <div class="input-help">
            Password harus berupa angka, alfabet, dan 1 karakter
            khusus.
          </div>
          <div class="input-error">
            Harus terdapat 1 karakter khusus.
          </div>
        </div>
        <div class="page-single__actions-container">
          <a href="./categories.php" class="page-single__button" onclick="return confirm('Are you sure want to delete?')">Delete</a>
          <div class="page-single__actions">
            <a href="./categories.php" class="page-single__button">Cancel</a>
            <button type="submit" class="page-single__button page-single__button_primary">
              Simpan
            </button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
<!-- end your content in here -->

<?php

require_once('layouts/footer.php');

?>