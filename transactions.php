<?php

$title = 'Transactions';

require_once('layouts/header.php');

?>

<!-- content -->
<main>
  <div class="container transactions">
    <div class="section-header">
      <h2>Transactions</h2>
    </div>
    <div class="transactions__body">
      <table class="transactions__table">
        <thead>
          <tr>
            <th>No. Transaction</th>
            <th>Date</th>
            <th>Total</th>
            <th>Status</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td><a href="./transaction-single.php">893749</a></td>
            <td>12 Nov 2023</td>
            <td>Rp42.329</td>
            <td><span class="badge badge_success">Paid</span></td>
          </tr>
          <tr>
            <td><a href="./transaction-single.php">893749</a></td>
            <td>12 Nov 2023</td>
            <td>Rp42.329</td>
            <td><span class="badge badge_danger">Unpaid</span></td>
          </tr>
          <tr>
            <td><a href="./transaction-single.php">893749</a></td>
            <td>12 Nov 2023</td>
            <td>Rp42.329</td>
            <td><span class="badge badge_warning">Checking</span></td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</main>
<!-- end content -->

<?php

require_once('layouts/footer.php');

?>