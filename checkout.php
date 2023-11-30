<?php

session_start();

if (!isset($_SESSION['customer_id'])) {
  header("Location: ./login.php");
  exit();
}

require_once('data/cart-item.php');
require_once('data/payment_method.php');
require_once('data/order.php');

$errors = [];
$cart_items = get_cart_items_with_plant_with_category($_SESSION['customer_id']);
$payment_methods = get_payment_methods();

if (empty($cart_items)) {
  header("Location: ./cart.php");
  exit();
}

if (isset($_POST['submit'])) {
  if (isset($_POST['payment_method_id'])) {
    save_order($_SESSION['customer_id'], $_POST['payment_method_id']);
    header("Location: ./transactions.php");
    exit();
  }

  $errors['payment_method_id'] = 'Pilih salah satu metode pembayaran.';
}

$title = 'Checkout';
require('layouts/header.php');

?>

<!-- css customs -->
<link rel="stylesheet" href="./assets/css/checkout.css">

<!-- content -->
<main>
  <!-- checkout -->
  <div class="checkout">
    <div class="checkout__header">
      <h1>Checkout</h1>
      <p>
        Selesaikan pesanan Anda dengan mudah dan aman di halaman ini.
      </p>
    </div>
    <div class="checkout__body">
      <div class="checkout__list">
        <?php $total = 0; ?>
        <?php foreach ($cart_items as $cart_item) : ?>
          <?php
          $subtotal =  $cart_item['plant_price'] * $cart_item['cart_item_qty'];
          $total += $subtotal;
          ?>
          <!-- checkuot item -->
          <div class="checkout__item">
            <div class="checkout__item-left">
              <img src="./assets/img/plants/<?= $cart_item['plant_photo'] ?>" alt="<?= $cart_item['plant_name'] ?>" />
              <div class="checkout__item-left-text">
                <h2><?= $cart_item['plant_name'] ?></h2>
                <p><?= $cart_item['category_name'] ?></p>
                <form action="./update-cart-item.php" method="post" class="checkout__actions">
                  <input type="hidden" name="plant_id" value="<?= $cart_item['plant_id'] ?>">
                  <button type="submit" name="reduce" class="checkout__action-button">
                    <i class="ph ph-minus"></i>
                  </button>
                  <span class="checkout__action-text"><?= $cart_item['cart_item_qty'] ?></span>
                  <button type="submit" name="add" class="checkout__action-button">
                    <i class="ph ph-plus"></i>
                  </button>
                  <span>x Rp<?= number_format($cart_item['plant_price']) ?></span>
                </form>
              </div>
            </div>
            <form action="./delete-cart-item.php" method="post" class="checkout__item-right">
              <input type="hidden" name="plant_id" value="<?= $cart_item['plant_id'] ?>">
              <button type="submit" name="submit">
                <i class="ph ph-x"></i>
              </button>
              <p>Rp<?= number_format($subtotal) ?></p>
            </form>
          </div>
          <!-- end checkuot item -->
          <hr />
        <?php endforeach; ?>
        <!-- checkuot item -->
        <div class="checkout__item">
          <div class="checkout__item-left">
            <h2>Total</h2>
          </div>
          <div class="checkout__item-right" data-total>
            <p>Rp<?= number_format($total) ?></p>
          </div>
        </div>
        <!-- end checkuot item -->
      </div>
      <!-- payment methods -->
      <form action="./checkout.php" method="post" class="checkout__method">
        <div class="checkout__method-group">
          <h2 class="checkout__method-title">Metode Pembayaran <span class="text-danger">*</span></h2>
          <div class="checkout__method-list">
            <?php foreach ($payment_methods as $payment_method) : ?>
              <label>
                <input type="radio" name="payment_method_id" value="<?= $payment_method['payment_method_id'] ?>" />
                <span></span>
                <i class="ph-fill ph-check-circle"></i>
                <img src="./assets/img/banks/<?= $payment_method['payment_method_logo'] ?>" alt="<?= $payment_method['payment_method_bank'] ?>" />
              </label>
            <?php endforeach; ?>
          </div>
        </div>
        <?php if (isset($errors['payment_method_id'])) : ?>
          <div class="input-error"><?= $errors['payment_method_id'] ?></div>
        <?php endif; ?>
        <button type="submit" name="submit" class="checkout__button">Pesan</button>
      </form>
      <!-- end payment methods -->
    </div>
  </div>
  <!-- end checkout -->
</main>
<!-- end content -->

<?php

require('layouts/footer.php');

?>