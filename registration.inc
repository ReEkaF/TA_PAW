<fieldset>
<legend>REGISTER</legend>
<form action="register.php" method="POST">
    <label for="email"> Email :</label>
    <input type="text" name="email" id="email" value="<?php if(isset($_POST['submit'])){echo $_POST['email'];}?>">
    <span><?php if(isset($_POST['submit'])){echo $erroremail;} ?></span>
    <br>
    <label for="password"> Password :</label>
    <input type="password" name="password" id="password" value="<?php if(isset($_POST['submit'])){echo $_POST['password'];}?>">
    <span><?php if(isset($_POST['submit'])){echo $errorpassword;} ?></span>
    <br>
    <label for="nama"> Nama Lengkap :</label>
    <input type="text" name="nama" id="nama" value="<?php if(isset($_POST['submit'])){echo $_POST['nama'];}?>">
    <span><?php if(isset($_POST['submit'])){echo $errornama;} ?></span>
    <br>
    <label for="telp"> No Hp :</label>
    <input type="text" name="telp" id="telp" value="<?php if(isset($_POST['submit'])){echo $_POST['telp'];}?>">
    <span><?php if(isset($_POST['submit'])){echo $errortelp;} ?></span>
    <br>

    <input type="submit" name='submit' value="DAFTAR">

</form>

</fieldset>