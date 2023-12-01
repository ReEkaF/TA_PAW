<?php
  session_start();
  if (!isset($_SESSION['customer_id'])){
    header("Location: login.php");
  }

  require(__DIR__."/config/database.php");
  require(__DIR__."/libs/validation.php");
  require_once('data/customer.php');

  $customer = find_customer_with_id($_SESSION['customer_id']);
  $errors=[];  
  


  if (isset($_POST['ubah'])){
      validate_email_customer($errors,$_POST,'email');
      validate_phone($errors,$_POST,'telephone') ;
      validate_name($errors,$_POST,'nama');
      if (!$errors){
        try{
          $db = new PDO('mysql:host=localhost;dbname=' . DB_NAME, DB_USERNAME, DB_PASSWORD, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
          $ubahdata = $db->prepare("UPDATE customers set customer_name = :custname, customer_phone = :custphone, customer_email = :custemail where customer_id = :custid ");
          $ubahdata->bindValue(":custname",$_POST['nama']);
          $ubahdata->bindValue(":custphone",$_POST['telephone']);
          $ubahdata->bindValue(":custemail",$_POST['email']);
          $ubahdata->bindValue(":custid",$_SESSION['customer_id']);    
          $ubahdata->execute();

          header("Location: profile.php");
        }
        catch(PDOException $error){
          throw new Exception($error->getMessage());
        }
      }
    

  }


  require('layouts/header.php');
?>
<link rel="stylesheet" href="./assets/css/profile.css">
<main>
  <!-- profile -->
  <div class="profile container">
    <!-- <div class="profile__header">
      <h1>Profil Saya</h1>
    </div> -->
    <div class="profile__body">
      <form action='editprofile.php' method='POST' class="profile__right">

        <div class="profile__form">
          <div>
            <!-- <a class="input-label">Nama</a>
            <a class="input" ><?= $customer['customer_name'] ?></a> -->

            <label class="input-label" for='nama'>Nama</label>
            <input type='text' name='nama' id='nama' class="input" value="<?php if(isset($_POST['nama'])) echo $_POST['nama']; else echo $customer['customer_name'];?>">
            <div class="input-error"><?php if (isset($errors['nama'])) echo $errors['nama']?></div>
           
            <!-- <div class="input-error">Invalid name.</div> -->
          </div>
          <div>
            <label class="input-label" for='email'>Email</label>
            <input type='text' name='email' id='email' class="input" value="<?php if(isset($_POST['email'])) echo $_POST['email']; else echo $customer['customer_email']; ?>">
            <div class="input-error"><?php if (isset($errors['email'])) echo $errors['email']?></div>

            <!-- <a class="input-label">Email</a>
            <a class="input"><?= $customer['customer_email'] ?></a> -->

            <!-- <div class="input-error">Invalid email.</div> -->
          </div>
          <div>
            <label class="input-label" for='telephone'>Telephone</label>
            <input type='text' name='telephone' id='telephone' class="input" value="<?php if(isset($_POST['telephone'])) echo $_POST['telephone']; else echo $customer['customer_phone'];?>">
            <div class="input-error"><?php if (isset($errors['telephone'])) echo $errors['telephone']?></div>

            <!-- <a class="input-label">Telepon</a>
            <a class="input" ><?= $customer['customer_phone'] ?></a> -->

            <!-- <div class="input-error">Invalid phone.</div> -->
          </div>

          
          <div>
          <input type="submit" name="ubah" value="UBAH" class="profile__button">
          </div>

          <!-- <div>

            <label for="photo" class="input-label">Foto</label>
            <input type="file" id="photo" class="input" />
            
            <div class="input-error">Invalid photo.</div>
          </div> -->
          <!-- <div>
            <button type="submit" class="profile__button">Simpan</button>
          </div> -->
        </div>
      </form>
    </div>
  </div>
  <!-- end profile -->
</main>
<!-- end content -->

<?php

require('layouts/footer.php');

?>

