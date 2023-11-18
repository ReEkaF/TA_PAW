<?php

$page = 'suppliers';
$title = 'Suppliers';

require_once('layouts/header.php');

?>

<!-- your content in here -->
<div class="admin">
  <div class="admin__header">
    <h1 class="admin__title">Suppliers</h1>
    <div class="admin__actions">
      <a href="./supplier-add.php" class="admin__button">Add Supplier</a>
    </div>
  </div>
  <div class="admin__body">
    <div class="admin__card">
      <table>
        <thead>
          <tr>
            <th>No.</th>
            <th>Name</th>
            <th>Phone</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>1.</td>
            <td>
              <a href="./supplier-single.php">Bunga Mawar</a>
            </td>
            <td>Rp23,000</td>
          </tr>
          <tr>
            <td>1.</td>
            <td>
              <a href="./supplier-single.php">Bunga Mawar</a>
            </td>
            <td>Rp23,000</td>
          </tr>
          <tr>
            <td>1.</td>
            <td>
              <a href="./supplier-single.php">Bunga Mawar</a>
            </td>
            <td>Rp23,000</td>
          </tr>
          <tr>
            <td>1.</td>
            <td>
              <a href="./supplier-single.php">Bunga Mawar</a>
            </td>
            <td>Rp23,000</td>
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