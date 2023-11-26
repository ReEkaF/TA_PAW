<?php

session_start();

if (!isset($_SESSION['staff_id'])) {
  header("Location: ./login.php");
  exit();
}

$page = "home";
require('layouts/header.php');

?>

<!-- your content in here -->
<div class="admin">
  <div class="admin__header">
    <h1 class="admin__title">Selamat datang, <?= $_SESSION['staff_name'] ?>!</h1>
    <p class="admin__subtitle"><?= date('M d, Y') ?></p>
  </div>
</div>
<!-- end your content in here -->

<?php

require('layouts/footer.php');

?>