<?php

session_start();

if (!isset($_SESSION['customer_id'])) {
  header("Location: ./login.php");
  exit();
}

require_once('data/cart-item.php');

$cart_items = get_cart_items_with_plant_with_category($_SESSION['customer_id']);

$title = 'Keranjang';
require('layouts/header.php');

?>

<!-- css customs -->
<link rel="stylesheet" href="./assets/css/cart.css">

<!-- content -->
<main>
  <!-- cart -->
  <div class="cart container">
    <div class="section-header">
      <h2>Keranjang</h2>
    </div>
    <div class="cart__body">
      <div class="cart__list">
        <?php $total = 0; ?>
        <?php foreach ($cart_items as $cart_item) : ?>
          <?php
          $subtotal =  $cart_item['plant_price'] * $cart_item['cart_item_qty'];
          $total += $subtotal;
          ?>
          <!-- cart item -->
          <div class="cart__item">
            <div class="cart__item-left">
              <img src="./assets/img/plants/<?= $cart_item['plant_photo'] ?>" alt="<?= $cart_item['plant_name'] ?>" />
              <div class="cart__item-left-text">
                <h2><?= $cart_item['plant_name'] ?></h2>
                <p><?= $cart_item['category_name'] ?></p>
                <form action="./update-cart-item.php" method="post" class="cart__actions">
                  <input type="hidden" name="plant_id" value="<?= $cart_item['plant_id'] ?>">
                  <button type="submit" name="reduce" class="cart__action-button">
                    <i class="ph ph-minus"></i>
                  </button>
                  <span class="cart__action-text"><?= $cart_item['cart_item_qty'] ?></span>
                  <button type="submit" name="add" class="cart__action-button">
                    <i class="ph ph-plus"></i>
                  </button>
                  <span>x Rp<?= number_format($cart_item['plant_price']) ?></span>
                </form>
              </div>
            </div>
            <form action="./delete-cart-item.php" method="post" class="cart__item-right">
              <input type="hidden" name="plant_id" value="<?= $cart_item['plant_id'] ?>">
              <button type="submit" name="submit">
                <i class="ph ph-x"></i>
              </button>
              <p>Rp<?= number_format($subtotal) ?></p>
            </form>
          </div>
          <!-- end cart item -->
          <hr />
        <?php endforeach; ?>
        <?php if (!empty($cart_items)) : ?>
          <!-- cart item -->
          <div class="cart__item">
            <div class="cart__item-left">
              <h2>Total</h2>
            </div>
            <div class="cart__item-right">
              <p>Rp<?= number_format($total) ?></p>
            </div>
          </div>
          <!-- end cart item -->
        <?php else : ?>
          <!-- cart item -->
          <div class="cart__item">
            <div class="cart__item-left">
              <h2>Keranjang Anda kosong!</h2>
            </div>
          </div>
          <!-- end cart item -->
        <?php endif; ?>
      </div>
      <?php if (!empty($cart_items)) : ?>
        <a href="./checkout.php" class="cart__button">Checkout</a>
      <?php endif; ?>
    </div>
  </div>
  <!-- end cart -->
</main>
<!-- end content -->

<?php

require('layouts/footer.php');

?>