<?php

$title = 'Cart';

require_once('layouts/header.php');

?>

<!-- content -->
<main class="cart container">
  <div class="section-header">
    <h2>Cart</h2>
  </div>
  <form action="checkout.php" method="get" class="cart__body">
    <div class="cart__list">
      <div class="cart__item">
        <div class="cart__item-left">
          <img src="./assets/img/plants/plant-1.png" alt="" />
          <div class="cart__item-left-text">
            <h2>Lapangan Futsal Ceria</h2>
            <p>Category 1</p>
            <div class="cart__actions">
              <a href="#" class="cart__action-button">
                <i class="ph ph-minus"></i>
              </a>
              <span class="cart__action-text">23</span>
              <a href="#" class="cart__action-button">
                <i class="ph ph-plus"></i>
              </a>
              <span>x Rp50.000</span>
            </div>
          </div>
        </div>
        <div class="cart__item-right">
          <a href="#">
            <i class="ph ph-x"></i>
          </a>
          <p>Rp74,000</p>
        </div>
      </div>
      <hr />
      <div class="cart__item">
        <div class="cart__item-left">
          <img src="./assets/img/plants/plant-1.png" alt="" />
          <div class="cart__item-left-text">
            <h2>Lapangan Futsal Ceria</h2>
            <p>Category 1</p>
            <div class="cart__actions">
              <a href="#" class="cart__action-button">
                <i class="ph ph-minus"></i>
              </a>
              <span class="cart__action-text">23</span>
              <a href="#" class="cart__action-button">
                <i class="ph ph-plus"></i>
              </a>
              <span>x Rp50.000</span>
            </div>
          </div>
        </div>
        <div class="cart__item-right">
          <a href="#">
            <i class="ph ph-x"></i>
          </a>
          <p>Rp74,000</p>
        </div>
      </div>
      <hr />
      <div class="cart__item">
        <div class="cart__item-left">
          <h2>Total</h2>
        </div>
        <div class="cart__item-right" data-total>
          <p>Rp148,000</p>
        </div>
      </div>
    </div>
    <button type="submit" class="cart__button">Checkout</button>
  </form>
</main>
<!-- end content -->

<?php

require_once('layouts/footer.php');

?>