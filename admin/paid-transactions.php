<?php

session_start();

if (!isset($_SESSION['staff_id'])) {
  header("Location: ./login.php");
  exit();
}

if ($_SESSION['role_name'] != 'manager') {
  header("Location: ./index.php");
  exit();
}

$page = 'paid-transactions';
$title = 'Transaksi Lunas';
require('layouts/header.php');

?>

<!-- css customs -->
<link rel="stylesheet" href="../assets/css/admin/graph.css">

<!-- your content in here -->
<div class="admin">
  <div class="admin__header">
    <h1 class="admin__title">Transaksi lunas</h1>
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
              <a href="./paid-transaction-single.php">2312</a>
            </td>
            <td>Bank BCA</td>
            <td>Rp23,000</td>
            <td>29</td>
            <td>Category 1</td>
          </tr>
          <tr>
            <td>
              <a href="./paid-transaction-single.php">2312</a>
            </td>
            <td>Bank BCA</td>
            <td>Rp23,000</td>
            <td>29</td>
            <td>Category 1</td>
          </tr>
          <tr>
            <td>
              <a href="./paid-transaction-single.php">2312</a>
            </td>
            <td>Bank BCA</td>
            <td>Rp23,000</td>
            <td>29</td>
            <td>Category 1</td>
          </tr>
          <tr>
            <td>
              <a href="./paid-transaction-single.php">2312</a>
            </td>
            <td>Bank BCA</td>
            <td>Rp23,000</td>
            <td>29</td>
            <td>Category 1</td>
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
<script>
  const ctx = document.getElementById("graph");

  const labels = [
    "JAN",
    "FEB",
    "MAR",
    "APR",
    "MAY",
    "JUN",
    "JUL",
    "AUG",
    "SEP",
    "OCT",
    "NOV",
    "DEC",
  ];

  const data = {
    labels: labels,
    datasets: [{
      label: "Users",
      data: [
        2000, 2500, 1500, 1800, 2200, 2600, 2400, 2800, 3200, 3800, 4100, 4600,
      ],
      borderColor: "#204e51",
      borderWidth: 6,
      tension: 0.4,
      pointStyle: false,
    }, ],
  };

  new Chart(ctx, {
    type: "line",
    data: data,
    options: {
      responsive: true,
      plugins: {
        legend: {
          display: false,
        },
        tooltip: {
          usePointStyle: true,
        },
      },
      scales: {
        x: {
          ticks: {
            padding: 16,
            color: "#8d8d91",
            font: {
              family: '"Nunito", sans-serif',
              size: 12,
            },
          },
          grid: {
            color: "#e9e9e9",
          },
        },
        y: {
          beginAtZero: true,
          ticks: {
            padding: 16,
            color: "#8d8d91",
            font: {
              family: '"Nunito", sans-serif',
              size: 12,
            },
            callback: function(value, index, values) {
              return Number((value / 1000).toString()) + "K";
            },
          },
          border: {
            display: false,
          },
          grid: {
            display: false,
          },
        },
      },
    },
  });
</script>

<?php

require('layouts/footer.php');

?>