<?php
    $title = 'Regis';
    $page = 'regis';
?>

<?php require_once("layouts/header.php"); ?>

    <section>
        <div>
            <fieldset>
                <legend>Buat akun anda</legend>
                <form action="logi.php" method="GET">
                    <div class="field">
                        <div class="inlab">
                            <label for="nama-customer"> Nama :</label>
                            <input type="text" name="nama-customer" id="nama-customer">
                        </div>
                        <span>*err msg</span>
                        <div class="inlab">
                            <label for="noHP-customer"> No. HP :</label>
                            <input type="text" name="noHP-customer" id="noHP-customer">
                        </div>
                        <span>*err msg</span>
                        <div class="inlab">
                            <label for="email-customer"> Email :</label>
                            <input type="text" name="email-customer" id="email-customer">
                        </div>
                        <span>*err msg</span>
                        <div class="inlab">
                            <label for="pass-customer"> Password :</label>
                            <input type="password" name="pass-customer" id="pass-customer">
                        </div>
                        <span>*err msg</span>
                        <div class="inlab">
                            <label for="conpass-customer"> Konfirmasi Password :</label>
                            <input type="password" name="conpass-customer" id="conpass-customer">
                        </div>
                        <span>*err msg</span>
                    </div>
                    <div class="fieldsub">
                        <input type="submit" value="Daftar">
                    </div>
                </form>
            </fieldset>
        </div>
    </section>
    
<?php require_once("layouts/footer.php"); ?>