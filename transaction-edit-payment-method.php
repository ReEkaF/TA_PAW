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
require_once('data/payment_method.php');

$errors = [];
$order = find_order($_SESSION['customer_id'], $_GET['order_id']);
$payment_methods = get_payment_methods();

if (!$order) {
  header("Location: ./transactions.php");
  exit();
}

if ($order['order_status'] == 'paid') {
  header("Location: ./transaction-single.php?order_id=" . $_GET['order_id']);
  exit();
}

if (isset($_POST['submit'])) {
  if (isset($_POST['payment_method_id'])) {
    update_order($_SESSION['customer_id'], $_GET['order_id'], $_POST['payment_method_id']);
    header("Location: ./transaction-single.php?order_id=" . $_GET['order_id']);
    exit();
  }

  $errors['payment_method_id'] = 'Pilih satu metode pembayaran.';
}

$title = 'Ubah Metode Pembayaran Transaksi';
require('layouts/header.php');

?>

<!-- css customs -->
<link rel="stylesheet" href="./assets/css/transaction-edit-payment-method.css">

<!-- content -->
<main>
  <!-- transaction edit payment method -->
  <div class="transaction-edit-method">
    <div class="transaction-edit-method__header">
      <p>
        <i class="ph-bold ph-arrow-left"></i>
        <a href="./transaction-single.php?order_id=<?= $_GET['order_id'] ?>">Kembali</a>
      </p>
      <h1>Ubah Metode Pembayaran #FF<?= $order['order_id'] ?></h1>
    </div>
    <form action="./transaction-edit-payment-method.php?order_id=<?= $_GET['order_id'] ?>" method="post" class="transaction-edit-method__body">
      <div class="transaction-edit-method__method">
        <div class="transaction-edit-method__method-group">
          <h2 class="transaction-edit-method__method-title">
            Metode Pembayaran <span class="text-danger">*</span>
          </h2>
          <div class="transaction-edit-method__method-list">
            <?php foreach ($payment_methods as $payment_method) : ?>
              <label class="<?= $payment_method['payment_method_id'] == $order['payment_method_id'] ? 'active' : '' ?>">
                <input type="radio" name="payment_method_id" value="<?= $payment_method['payment_method_id'] ?>" <?= $payment_method['payment_method_id'] == $order['payment_method_id'] ? 'checked' : '' ?> />
                <i class="ph-fill ph-check-circle"></i>
                <img src="./assets/img/banks/<?= $payment_method['payment_method_logo'] ?>" alt="<?= $payment_method['payment_method_bank'] ?>" />
              </label>
            <?php endforeach; ?>
          </div>
          <?php if (isset($errors['payment_method_id'])) : ?>
            <div class="input-error"><?= $errors['payment_method_id'] ?></div>
          <?php endif; ?>
        </div>
      </div>
      <button type="submit" name="submit" class="transaction-edit-method__button">
        Simpan
      </button>
    </form>
  </div>
  <!-- end transaction edit payment method -->
</main>
<!-- end content -->

<!-- js customs -->
<script src="./assets/js/transaction-edit-payment-method.js"></script>

<?php

require('layouts/footer.php');

?>