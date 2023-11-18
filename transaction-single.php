<?php

$title = 'Transaction Single';

require_once('layouts/header.php');

?>

<!-- content -->
<main class="transaction-single">
  <div class="transaction-single__header">
    <h1>
      Transaction Single <span class="badge badge_success">Paid</span>
    </h1>
    <p>12 November 2023</p>
  </div>
  <div class="transaction-single__body">
    <div class="transaction-single__list">
      <div class="transaction-single__item">
        <div class="transaction-single__item-left">
          <img src="./assets/img/plants/plant-1.png" alt="" />
          <div class="transaction-single__item-left-text">
            <h2>Lapangan Futsal Ceria</h2>
            <p>Category 1</p>
            <span>Rp50.000 x 23</span>
          </div>
        </div>
        <div class="transaction-single__item-right">
          <p data-price>Rp<span>74,000</span></p>
        </div>
      </div>
      <hr />
      <div class="transaction-single__item">
        <div class="transaction-single__item-left">
          <img src="./assets/img/plants/plant-1.png" alt="" />
          <div class="transaction-single__item-left-text">
            <h2>Lapangan Futsal Ceria</h2>
            <p>Category 1</p>
            <span>Rp50.000 x 23</span>
          </div>
        </div>
        <div class="transaction-single__item-right">
          <p data-price>Rp<span>74,000</span></p>
        </div>
      </div>
      <hr />
      <div class="transaction-single__item">
        <div class="transaction-single__item-left">
          <h2>Total</h2>
        </div>
        <div class="transaction-single__item-right" data-total>
          <p>Rp<span>148,000</span></p>
        </div>
      </div>
    </div>
    <div class="transaction-single__method">
      <div class="transaction-single__method-group">
        <h2 class="transaction-single__method-title">Payment Method</h2>
        <div class="transaction-single__method-list">
          <div class="transaction-single__method-item">
            <img src="./assets/img/banks/briva.svg" alt="Briva" />
          </div>
        </div>
        <p>
          BCA 293840938409938 <br />
          a/n Muhammad Shafy Gunawan
        </p>
        <div>
          <a href="./transaction-edit-payment-method.php">Edit Payment Method</a>
        </div>
      </div>
      <div class="transaction-single__method-group">
        <h2 class="transaction-single__method-title">
          Langkah-Langkah Pembayaran Melalui ATM
        </h2>
        <ol>
          <li>Masukkan kartu ATM BCA & PIN.</li>
          <li>
            Lorem ipsum dolor, sit amet consectetur adipisicing elit.
            Molestias, odit?.
          </li>
          <li>Lorem ipsum dolor sit amet consectetur adipisicing.</li>
          <li>
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Est!.
          </li>
          <li>
            Lorem ipsum dolor sit amet consectetur, adipisicing elit.
            Suscipit, accusantium.
          </li>
          <li>
            Lorem ipsum dolor, sit amet consectetur adipisicing elit.
            Beatae?
          </li>
        </ol>
      </div>
    </div>
  </div>
</main>
<!-- end content -->

<?php

require_once('layouts/footer.php');

?>