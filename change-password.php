<?php

session_start();
require(__DIR__."/config/database.php");
require(__DIR__."/libs/validation.php");

if (!isset($_SESSION['customer_id'])) {
  header("Location: ./login.php");
  exit();
}
// KONEKSI DB
$db = new PDO('mysql:host=localhost;dbname=' . DB_NAME, DB_USERNAME, DB_PASSWORD, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
// LIST TAMPUNG ARRAY ERROR
$errors=[];
// LIST TAMPUNG ARRAY JIKA BERHASIL UBAH PASSWORD
$success = [];
// JIKA USER MENGKLIK SIMPAN (UBAHPASS)
if (isset($_POST['ubahpass'])){
  // DIVALIDASI DAHULU APAKAH SESUAI FORMAT
  validate_password($errors,$_POST,'password');
  // JIKA SESUAI FORMAT MASUK IF DIBAWAH INI
  if (!$errors){
    // CEK APAKAH 2 INPUTAN PASSWORD BARU PENULISANNYA SAMA,YA-> UBAH PASSWORD
    if ($_POST['password'] == $_POST['confirm_password']){
      // UPDATE PASSWORD + HASHING
      $ubahpass = $db->prepare("UPDATE customers set customer_password = :pwd where customer_id = :custid ");
      $ubahpass->bindValue(":pwd",password_hash(trim($_POST['password']), PASSWORD_DEFAULT));
      $ubahpass->bindValue(":custid",$_SESSION['customer_id']);
      $ubahpass->execute();
      $success['berhasil'] = "PASSWORD BERHASIL DIUBAH";
      $_POST['password'] = '';
    }
    // JIKA TIDAK SAMA
    else{
      $errors['confirm_password'] = 'PASSWORD BERBEDA';
    }
  }
}


// HEADER
$title = 'Ubah Password';
require('layouts/header.php');

?>

<!-- css customs -->
<link rel="stylesheet" href="./assets/css/profile.css">

<!-- content -->
<main>
  <!-- profile -->
  <!-- TULISAN UBAH PASSWORD -->
  <div class="profile container">
    <div class="profile__header">
      <h1>Ubah Password</h1>
    </div>
    <div class="profile__body">
      <!-- FORM (PASSWORD BARU, CONFIRM PASSWORD) -->
      <form action="./change-password.php" method="post" class="profile__right">
        <!-- JIKA SUDAH BERHASIL MENGUBAH PASSWORD -->
        <?php if(isset($success['berhasil'])){
          echo "<div class='alert alert_success'> {$success['berhasil']} </div>";
        }?>
        <div class="profile__form">
          <div>
            <!-- INPUT PASSWORD -->
            <label for="password" class="input-label">Password Baru <span class="text-danger">*</span></label>
            <input type="text" id="password" name="password" class="input" value="<?php if (isset($_POST['password'])){echo $_POST['password'];}  ?>"/>
            <!-- FORMAT -->
            <div class="input-help">Harus berisi 8-16 karakter dengan minimal 1 huruf besar, 1 huruf kecil, 1 karakter spesial, dan tidak boleh mengandung spasi.</div>
            <!-- ERR MESSAGE -->
            <div class="input-error"><?php if(isset($errors['password'])){ echo $errors['password']; } ?></div>
          </div>
          <div>
            <!-- INPUT CONFIRM PASSWORD -->
            <label for="confirm_password" class="input-label">Ketik Ulang Password <span class="text-danger">*</span></label>
            <input type="text" id="confirm_password" name="confirm_password" class="input" />
            <!-- ERR MESSAGE -->
            <div class="input-error"><?php if(isset($errors['confirm_password'])){ echo $errors['confirm_password']; } ?></div>
            <!-- <div class="input-error">Invalid confirm password.</div> -->
          </div>
          <div>
            <!-- TOMBOL SIMPAN (UBAHPASS) -->
            <button type="submit" name="ubahpass" class="profile__button">Simpan</button>
          </div>
        </div>
      </form>
    </div>
  </div>
  <!-- end profile -->
</main>
<!-- end content -->

<?php
// FOOTER
require('layouts/footer.php');

?>
