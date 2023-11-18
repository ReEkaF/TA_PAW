<?php

$title = 'Checkout';

require_once('layouts/header.php');

?>

<!-- content -->
<main class="checkout">
  <div class="checkout__header">
    <h1>Checkout</h1>
    <p>
      Lorem ipsum dolor sit amet consectetur adipiscing elit Iaculis id quis
      odio vulputate augue congue dictumst sapien nam congue platea nunc.
    </p>
  </div>
  <form action="./transaction-single.php" method="post" class="checkout__body">
    <div class="checkout__list">
      <div class="checkout__item">
        <div class="checkout__item-left">
          <img src="./assets/img/plants/plant-1.png" alt="" />
          <div class="checkout__item-left-text">
            <h2>Lapangan Futsal Ceria</h2>
            <p>Category 1</p>
            <div class="checkout__actions">
              <a href="#" class="checkout__action-button">
                <i class="ph ph-minus"></i>
              </a>
              <span class="checkout__action-text">23</span>
              <a href="#" class="checkout__action-button">
                <i class="ph ph-plus"></i>
              </a>
              <span>x Rp50.000</span>
            </div>
          </div>
        </div>
        <div class="checkout__item-right">
          <a href="#">
            <i class="ph ph-x"></i>
          </a>
          <p>Rp74,000</p>
        </div>
      </div>
      <hr />
      <div class="checkout__item">
        <div class="checkout__item-left">
          <img src="./assets/img/plants/plant-1.png" alt="" />
          <div class="checkout__item-left-text">
            <h2>Lapangan Futsal Ceria</h2>
            <p>Category 1</p>
            <div class="checkout__actions">
              <a href="#" class="checkout__action-button">
                <i class="ph ph-minus"></i>
              </a>
              <span class="checkout__action-text">23</span>
              <a href="#" class="checkout__action-button">
                <i class="ph ph-plus"></i>
              </a>
              <span>x Rp50.000</span>
            </div>
          </div>
        </div>
        <div class="checkout__item-right">
          <a href="#">
            <i class="ph ph-x"></i>
          </a>
          <p>Rp74,000</p>
        </div>
      </div>
      <hr />
      <div class="checkout__item">
        <div class="checkout__item-left">
          <h2>Total</h2>
        </div>
        <div class="checkout__item-right" data-total>
          <p>Rp148,000</p>
        </div>
      </div>
    </div>
    <div class="checkout__method">
      <div class="checkout__method-group">
        <h2 class="checkout__method-title">Transfer Virtual Account</h2>
        <div class="checkout__method-list">
          <label>
            <input type="radio" name="payment-method" />
            <i class="ph-fill ph-check-circle"></i>
            <img src="./assets/img/banks/briva.svg" alt="Briva" />
          </label>
          <label>
            <input type="radio" name="payment-method" />
            <i class="ph-fill ph-check-circle"></i>
            <img src="./assets/img/banks/HpaymentsBNIVA.svg" alt="Briva" />
          </label>
          <label>
            <input type="radio" name="payment-method" />
            <i class="ph-fill ph-check-circle"></i>
            <img src="./assets/img/banks/HpaymentsMandiri.svg" alt="Mandiri" />
          </label>
          <label>
            <input type="radio" name="payment-method" />
            <i class="ph-fill ph-check-circle"></i>
            <img src="./assets/img/banks/bca.svg" alt="BCA" />
          </label>
          <label>
            <input type="radio" name="payment-method" />
            <i class="ph-fill ph-check-circle"></i>
            <img src="./assets/img/banks/permata.svg" alt="Permata Bank" />
          </label>
        </div>
      </div>
      <div class="checkout__method-group">
        <h2 class="checkout__method-title">Credit Card</h2>
        <div class="checkout__method-list">
          <label>
            <input type="radio" name="payment-method" />
            <i class="ph-fill ph-check-circle"></i>
            <img src="./assets/img/banks/Visa.svg" alt="VISA" />
          </label>
          <label>
            <input type="radio" name="payment-method" />
            <i class="ph-fill ph-check-circle"></i>
            <img src="./assets/img/banks/MasterCard.svg" alt="MasterCard" />
          </label>
          <label>
            <input type="radio" name="payment-method" />
            <i class="ph-fill ph-check-circle"></i>
            <img src="./assets/img/banks/JCB.svg" alt="JCB" />
          </label>
        </div>
      </div>
      <div class="input-error">Pilih salah satu metode pembayaran.</div>
    </div>
    <button type="submit" class="checkout__button">Pesan</button>
  </form>
</main>
<!-- end content -->

<!-- js customs -->
<script src="./assets/js/checkout.js"></script>

<?php

require_once('layouts/footer.php');

?>