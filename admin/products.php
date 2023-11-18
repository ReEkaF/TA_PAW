<?php

$page = 'products';
$title = 'Products';

require_once('layouts/header.php');

?>

<!-- your content in here -->
<div class="admin">
  <div class="admin__header">
    <h1 class="admin__title">Products</h1>
    <div class="admin__actions">
      <a href="./product-add.php" class="admin__button">Add Product</a>
    </div>
  </div>
  <div class="admin__body">
    <div class="admin__card">
      <table>
        <thead>
          <tr>
            <th>No.</th>
            <th>Name</th>
            <th>Price</th>
            <th>Stock</th>
            <th>Category</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>1.</td>
            <td><a href="./product-single.php">Bunga Mawar</a></td>
            <td>Rp23,000</td>
            <td>29</td>
            <td>Category 1</td>
          </tr>
          <tr>
            <td>1.</td>
            <td><a href="./product-single.php">Bunga Mawar</a></td>
            <td>Rp23,000</td>
            <td>29</td>
            <td>Category 1</td>
          </tr>
          <tr>
            <td>1.</td>
            <td><a href="./product-single.php">Bunga Mawar</a></td>
            <td>Rp23,000</td>
            <td>29</td>
            <td>Category 1</td>
          </tr>
          <tr>
            <td>1.</td>
            <td><a href="./product-single.php">Bunga Mawar</a></td>
            <td>Rp23,000</td>
            <td>29</td>
            <td>Category 1</td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</div>
<!-- end your content in here -->

<?php

require_once('layouts/footer.php');

?>