<?php

$page = 'paid-transactions';
$title = 'Paid Transaction Single';

require_once('layouts/header.php');

?>

<!-- your content in here -->
<div class="admin">
  <div class="admin__header">
    <div class="admin__back">
      <i class="ph-bold ph-arrow-left"></i>
      <a href="./paid-transactions.php">Kembali</a>
    </div>
    <h1 class="admin__title">Paid transaction single</h1>
  </div>
  <div class="admin__body">
    <div class="admin__card">
      <p>Tanggal transaksi: 17 Nov 2023</p>
      <p>Metode pembayaran: Bank BCA</p>
    </div>
    <div class="admin__card">
      <table>
        <thead>
          <tr>
            <th>No.</th>
            <th>Plant</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Subtotal</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>1.</td>
            <td>Bunga Mawar</td>
            <td>Rp23,000</td>
            <td>29</td>
            <td>Category 1</td>
          </tr>
          <tr>
            <td>1.</td>
            <td>Bunga Mawar</td>
            <td>Rp23,000</td>
            <td>29</td>
            <td>Category 1</td>
          </tr>
          <tr>
            <td>1.</td>
            <td>Bunga Mawar</td>
            <td>Rp23,000</td>
            <td>29</td>
            <td>Category 1</td>
          </tr>
          <tr>
            <td>1.</td>
            <td>Bunga Mawar</td>
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
          </tr>
        </tfoot>
      </table>
    </div>
  </div>
</div>
<!-- end your content in here -->

<?php

require_once('layouts/footer.php');

?>