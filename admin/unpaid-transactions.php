<?php

$page = 'unpaid-transactions';
$title = 'Unpaid Transactions';

require_once('layouts/header.php');

?>

<!-- your content in here -->
<div class="admin">
  <div class="admin__header">
    <h1 class="admin__title">Unpaid transactions</h1>
  </div>
  <div class="admin__body">
    <form action="./paid-transactions.php" method="get" class="admin__filters">
      <input type="date" class="input" />
      <span>to</span>
      <input type="date" class="input" />
      <button class="admin__button">Filter</button>
    </form>
    <div class="admin__card">
      <h2 class="admin__card-title">Graph</h2>
      <hr />
      <canvas id="graph" class="graph"></canvas>
    </div>
    <div class="admin__card">
      <table>
        <thead>
          <tr>
            <th>No. Transaction</th>
            <th>Payment Method</th>
            <th>Date</th>
            <th>Total Plant</th>
            <th>Total Price</th>
            <th></th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>
              <a href="./unpaid-transaction-single.php">2312</a>
            </td>
            <td>Bank BCA</td>
            <td>Rp23,000</td>
            <td>29</td>
            <td>Category 1</td>
            <td>
              <a href="./unpaid-transaction-single.php" class="button">Mark as Paid</a>
            </td>
          </tr>
          <tr>
            <td>
              <a href="./unpaid-transaction-single.php">2312</a>
            </td>
            <td>Bank BCA</td>
            <td>Rp23,000</td>
            <td>29</td>
            <td>Category 1</td>
            <td>
              <a href="./unpaid-transaction-single.php" class="button">Mark as Paid</a>
            </td>
          </tr>
          <tr>
            <td>
              <a href="./unpaid-transaction-single.php">2312</a>
            </td>
            <td>Bank BCA</td>
            <td>Rp23,000</td>
            <td>29</td>
            <td>Category 1</td>
            <td>
              <a href="./unpaid-transaction-single.php" class="button">Mark as Paid</a>
            </td>
          </tr>
          <tr>
            <td>
              <a href="./unpaid-transaction-single.php">2312</a>
            </td>
            <td>Bank BCA</td>
            <td>Rp23,000</td>
            <td>29</td>
            <td>Category 1</td>
            <td>
              <a href="./unpaid-transaction-single.php" class="button">Mark as Paid</a>
            </td>
          </tr>
        </tbody>
        <tfoot>
          <tr>
            <td colspan="3">Total</td>
            <td>23</td>
            <td>34</td>
            <td></td>
          </tr>
        </tfoot>
      </table>
    </div>
  </div>
</div>
<!-- end your content in here -->

<!-- js libs -->
<script src="../vendor/Chart.js-4.4.0/chart.umd.js"></script>

<!-- custom js -->
<script src="../assets/js/admin/graph.js"></script>

<?php

require_once('layouts/footer.php');

?>