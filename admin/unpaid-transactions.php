<?php

session_start();

if (!isset($_SESSION['staff_id'])) {
  header("Location: ./login.php");
  exit();
}

require_once('../data/transaction.php');

$order_info = get_data_order();

$page = 'unpaid-transactions';
$title = 'Transaksi Belum Lunas';
require('layouts/header.php');

?>

<?php if ($_SESSION['role_name'] == 'manager') : ?>
  <!-- css customs -->
  <link rel="stylesheet" href="../assets/css/admin/graph.css">
<?php endif; ?>

<!-- your content in here -->
<div class="admin">
  <div class="admin__header">
    <h1 class="admin__title">Transaksi belum lunas</h1>
  </div>
  <div class="admin__body">
    <?php if ($_SESSION['role_name'] == 'manager') : ?>
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
    <?php endif; ?>
    <div class="admin__card">
      <table>
        <thead>
          <tr>
            <th>No. Transaksi</th>
            <th>Metode Pembayaran</th>
            <th>Tanggal</th>
            <th>Total Tanaman</th>
            <th>Total Harga</th>
            <th></th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($order_info as $order) : ?>
            <tr>
              <td>
                <a href="./unpaid-transaction-single.php?order_id=<?= $order["order_id"] ?>">#FF<?= $order["order_id"] ?></a>
              </td>
              <td>Bank <?= $order["payment_method_bank"] ?></td>
              <td><?= date('d M Y', strtotime($order["order_date"])) ?></td>
              <td><?= get_order_sum($order["order_id"]) ?></td>
              <td>Rp<?= number_format($order["order_total_price"]) ?></td>
              <td>
                <a href="./unpaid-transaction-approved.php?order_id=<?= $order["order_id"] ?>" class="button">Tandai sebagai terbayar</a>
              </td>
            </tr>
          <?php endforeach; ?>
        </tbody>
        <?php if ($_SESSION['role_name'] == 'manager') : ?>
          <tfoot>
            <tr>
              <td colspan="3">Total</td>
              <td>23</td>
              <td>34</td>
              <td></td>
            </tr>
          </tfoot>
        <?php endif; ?>
      </table>
    </div>
  </div>
</div>
<!-- end your content in here -->

<?php if ($_SESSION['role_name'] == 'manager') : ?>
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
<?php endif; ?>

<?php

require('layouts/footer.php');

?>