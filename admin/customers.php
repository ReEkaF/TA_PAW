<?php

$page = 'customers';
$title = 'Customers';

require_once('layouts/header.php');

?>

<!-- your content in here -->
<div class="admin">
  <div class="admin__header">
    <h1 class="admin__title">Customers</h1>
  </div>
  <div class="admin__body">
    <div class="admin__card">
      <table>
        <thead>
          <tr>
            <th>No.</th>
            <th>Name</th>
            <th>Phone</th>
            <th>Email</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>1.</td>
            <td>
              <a href="./customer-single.php">Bunga Mawar</a>
            </td>
            <td>08123456789</td>
            <td>shafy@example.com</td>
          </tr>
          <tr>
            <td>1.</td>
            <td>
              <a href="./customer-single.php">Bunga Mawar</a>
            </td>
            <td>08123456789</td>
            <td>shafy@example.com</td>
          </tr>
          <tr>
            <td>1.</td>
            <td>
              <a href="./customer-single.php">Bunga Mawar</a>
            </td>
            <td>08123456789</td>
            <td>shafy@example.com</td>
          </tr>
          <tr>
            <td>1.</td>
            <td>
              <a href="./customer-single.php">Bunga Mawar</a>
            </td>
            <td>08123456789</td>
            <td>shafy@example.com</td>
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