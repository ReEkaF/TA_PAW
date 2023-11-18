<?php

$title = 'Transaction Edit Payment Method';

require_once('layouts/header.php');

?>

<!-- content -->
<main class="transaction-edit-method">
  <div class="transaction-edit-method__header">
    <p>
      <i class="ph-bold ph-arrow-left"></i>
      <a href="./transaction-single.php">Kembali</a>
    </p>
    <h1>Edit Payment Method #23423</h1>
  </div>
  <form action="./transaction-single.php" method="post" class="transaction-edit-method__body">
    <div class="transaction-edit-method__method">
      <div class="transaction-edit-method__method-group">
        <h2 class="transaction-edit-method__method-title">
          Transfer Virtual Account
        </h2>
        <div class="transaction-edit-method__method-list">
          <label class="active">
            <input type="radio" name="payment-method" checked />
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
        <div class="input-error">Pilih salah satu.</div>
      </div>
    </div>
    <button type="submit" class="transaction-edit-method__button">
      Confirm
    </button>
  </form>
</main>
<!-- end content -->

<!-- js customs -->
<script src="./assets/js/transaction-edit-payment-method.js"></script>

<?php

require_once('layouts/footer.php');

?>