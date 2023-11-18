<?php

$page = 'products';
$title = 'Product Single';

require_once('layouts/header.php');

?>

<!-- your content in here -->
<div class="admin">
  <div class="admin__header">
    <div class="admin__back">
      <i class="ph-bold ph-arrow-left"></i>
      <a href="./products.php">Kembali</a>
    </div>
    <h1 class="admin__title">Product single</h1>
  </div>
  <div class="admin__body">
    <div class="admin__card">
      <form action="./product-single.php" method="post" class="page-single">
        <img src="../assets/img/plants/plant-1.png" alt="" class="page-single__img" />
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
        <div>
          <label for="email" class="input-label">Price</label>
          <input type="text" id="email" class="input" />
        </div>
        <div>
          <label for="email" class="input-label">Category</label>
          <select name="category" id="category" class="input-select">
            <option value="" selected disabled>
              Select category
            </option>
            <option value="category-1">Category 1</option>
            <option value="category-2">Category 2</option>
            <option value="category-3">Category 3</option>
          </select>
        </div>
        <div>
          <label for="email" class="input-label">Supplier</label>
          <select name="category" id="category" class="input-select">
            <option value="" selected disabled>
              Select supplier
            </option>
            <option value="supplier-1">Supplier 1</option>
            <option value="supplier-2">Supplier 2</option>
            <option value="supplier-3">Supplier 3</option>
          </select>
        </div>
        <div>
          <label for="email" class="input-label">Stock</label>
          <input type="text" id="email" class="input" />
        </div>
        <div>
          <label for="email" class="input-label">Photo</label>
          <input type="file" id="email" class="input" />
        </div>
        <div class="page-single__actions-container">
          <a href="./products.php" class="page-single__button" onclick="return confirm('Are you sure want to delete?')">Delete</a>
          <div class="page-single__actions">
            <a href="./products.php" class="page-single__button">Cancel</a>
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