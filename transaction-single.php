<?php

session_start();

if (!isset($_SESSION['customer_id'])) {
  header("Location: ./login.php");
  exit();
}

if (!isset($_GET['order_id'])) {
  header("Location: ./transactions.php");
  exit();
}

require_once('data/order.php');
require_once('data/order-detail.php');

$order = find_order_with_payment_method($_SESSION['customer_id'], $_GET['order_id']);

if (!$order) {
  header("Location: ./transactions.php");
  exit();
}

$order_details = get_order_details_with_plant_with_category($order['order_id']);

$title = 'Detail Transaksi';
require('layouts/header.php');

?>

<!-- css customs -->
<link rel="stylesheet" href="./assets/css/transaction-single.css">

<!-- content -->
<main>
  <!-- transaction single -->
  <div class="transaction-single">
    <div class="transaction-single__header">
      <h1>
        Transaksi #FF<?= $order['order_id'] ?> <span class="badge <?= $order['order_status'] == 'paid' ? 'badge_success' : 'badge_danger' ?>"><?= ucwords($order['order_status']) ?></span>
      </h1>
      <p><?= date('d F Y', strtotime($order['order_date'])) ?></p>
    </div>
    <div class="transaction-single__body">
      <div class="transaction-single__list">
        <?php $total = 0; ?>
        <?php foreach ($order_details as $order_detail) : ?>
          <?php
          $subtotal =  $order_detail['plant_price'] * $order_detail['order_detail_qty'];
          $total += $subtotal;
          ?>
          <!-- transactioin single item -->
          <div class="transaction-single__item">
            <div class="transaction-single__item-left">
              <img src="./assets/img/plants/<?= $order_detail['plant_photo'] ?>" alt="<?= $order_detail['plant_name'] ?>" />
              <div class="transaction-single__item-left-text">
                <h2><?= $order_detail['plant_name'] ?></h2>
                <p><?= $order_detail['category_name'] ?></p>
                <span>Rp<?= number_format($order_detail['order_detail_unit_price']) ?> x <?= $order_detail['order_detail_qty'] ?></span>
              </div>
            </div>
            <div class="transaction-single__item-right">
              <p>Rp<?= number_format($subtotal) ?></p>
            </div>
          </div>
          <hr />
          <!-- end transactioin single item -->
        <?php endforeach; ?>
        <!-- transactioin single item -->
        <div class="transaction-single__item">
          <div class="transaction-single__item-left">
            <h2>Total</h2>
          </div>
          <div class="transaction-single__item-right">
            <p>Rp<?= number_format($total) ?></p>
          </div>
        </div>
        <!-- end transactioin single item -->
      </div>
      <!-- payment method -->
      <div class="transaction-single__method">
        <div class="transaction-single__method-group">
          <h2 class="transaction-single__method-title">Metode Pembayaran</h2>
          <div class="transaction-single__method-list">
            <div class="transaction-single__method-item">
              <img src="./assets/img/banks/<?= $order['payment_method_logo'] ?>" alt="<?= $order['payment_method_bank'] ?>" />
            </div>
          </div>
          <p>
            <?= $order['payment_method_bank'] ?> <?= $order['payment_method_number'] ?> <br />
            a/n <?= $order['payment_method_name'] ?>
          </p>
          <?php if ($order['order_status'] == 'unpaid') : ?>
            <div>
              <a href="./transaction-edit-payment-method.php?order_id=<?= $order['order_id'] ?>">Ubah metode pembayaran</a>
            </div>
          <?php endif; ?>
        </div>
        <div class="transaction-single__method-group">
          <h2 class="transaction-single__method-title">
            Langkah-Langkah Pembayaran Melalui ATM
          </h2>
          <ol>
            <li>Masukkan kartu ATM <?= $order['payment_method_bank'] ?> & PIN.</li>
            <li>Pilih menu Transaksi Lainnya > Transfer > ke Rekening <?= $order['payment_method_bank'] ?>.</li>
            <li>Masukkan nominal uang.</li>
            <li>Masukkan No. Rekening diatas sebagai tujuan transfer.</li>
            <li>Di halaman konfirmasi, pastikan detail pembayaran sudah sesuai seperti No. Rekening, Nama, dan Nominal uang.</li>
            <li>Ikuti instruksi untuk menyelesaikan transaksi.</li>
          </ol>
        </div>
      </div>
      <!-- end payment method -->
    </div>
  </div>
  <!-- end transaction single -->
</main>
<!-- end content -->

<?php

require('layouts/footer.php');

?>