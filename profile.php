<link rel="stylesheet" href="./assets/css/profile.css">
<?php

session_start();

require_once('data/customer.php');

$customer = find_customer_with_id($_SESSION['customer_id']);

$title = 'Profil';
require('layouts/header.php');

if (!isset($_SESSION['customer_id'])) {
  header("Location: ./login.php");
  exit();
}
?>

<!-- css customs -->


<!-- content -->
<main>
  <!-- profile -->
  <div class="profile container">
    <div class="profile__header">
      <h1>Profil Saya</h1>
    </div>
    <div class="profile__body">
      <div class="profile__left">

        <img src="<?= $customer['customer_photo'] == null ? './assets/img/default-profile.jpg' : './assets/img/profiles/' . $customer['customer_photo'] ?>" alt="<?= $customer['customer_name'] ?>" />

      </div>

      <!-- <form action="./profile.php" method="post" class="profile__right"> -->
        <div class="profile__form">
          <div>
            <a class="input-label">Nama</a>
            <a class="input" ><?= $customer['customer_name'] ?></a>

           
            <!-- <div class="input-error">Invalid name.</div> -->
          </div>
          <div>
            <a class="input-label">Email</a>
            <a class="input"><?= $customer['customer_email'] ?></a>

            <!-- <div class="input-error">Invalid email.</div> -->
          </div>
          <div>

            <a class="input-label">Telepon</a>
            <a class="input" ><?= $customer['customer_phone'] ?></a>

            <!-- <div class="input-error">Invalid phone.</div> -->
          </div>

          <form method="POST" action="editprofile.php">
            <div>
            <input type="submit" name="ubahprofil" value="UBAH DATA" class="profile__button">
            </div>
          </form>
          <!-- <div>

            <label for="photo" class="input-label">Foto</label>
            <input type="file" id="photo" class="input" />
            
            <div class="input-error">Invalid photo.</div>
          </div> -->
          <!-- <div>
            <button type="submit" class="profile__button">Simpan</button>
          </div> -->
        </div>
      <!-- </form> -->
    </div>
  </div>
  <!-- end profile -->
</main>
<!-- end content -->

<?php

require('layouts/footer.php');

?>
