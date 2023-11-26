<?php

session_start();

if (!isset($_SESSION['staff_id'])) {
  header("Location: ./login.php");
  exit();
}

require_once('../data/customer.php');

$customers = get_customers();

$page = 'customers';
$title = 'Pelanggan';
require('layouts/header.php');

?>

<!-- your content in here -->
<div class="admin">
  <div class="admin__header">
    <h1 class="admin__title">Pelanggan</h1>
  </div>
  <div class="admin__body">
    <div class="admin__card">
      <table>
        <thead>
          <tr>
            <th>No.</th>
            <th>Nama</th>
            <th>Telepon</th>
            <th>Email</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($customers as $i => $customer) : ?>
            <tr>
              <td><?= $i + 1 ?>.</td>
              <td>
                <a href="./customer-single.php?customer_email=<?= $customer['customer_email'] ?>"><?= $customer['customer_name'] ?></a>
              </td>
              <td><?= $customer['customer_phone'] ?></td>
              <td><?= $customer['customer_email'] ?></td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  </div>
</div>
<!-- end your content in here -->

<?php

require('layouts/footer.php');

?>