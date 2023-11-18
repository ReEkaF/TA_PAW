<?php

$page = 'customers';
$title = 'Customer Single';

require_once('layouts/header.php');

?>

<!-- your content in here -->
<div class="admin">
  <div class="admin__header">
    <div class="admin__back">
      <i class="ph-bold ph-arrow-left"></i>
      <a href="./customers.php">Kembali</a>
    </div>
    <h1 class="admin__title">Customer single</h1>
  </div>
  <div class="admin__body">
    <div class="admin__card">
      <div class="page-single">
        <img src="../assets/img/profiles/profile-1.png" alt="" class="page-single__img" />
        <div>
          <label for="email" class="input-label">Name</label>
          <input type="text" id="email" class="input" readonly />
        </div>
        <div>
          <label for="email" class="input-label">Phone</label>
          <input type="text" id="email" class="input" readonly />
        </div>
        <div>
          <label for="email" class="input-label">Email</label>
          <input type="text" id="email" class="input" readonly />
        </div>
      </div>
    </div>
  </div>
</div>
<!-- end your content in here -->

<?php

require_once('layouts/footer.php');

?>