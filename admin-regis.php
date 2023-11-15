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
                            <label for="nama-admin"> Nama :</label>
                            <input type="text" name="nama-admin" id="nama-admin">
                        </div>
                        <span>*err msg</span>
                        <div class="inlab">
                            <label for="noHP-admin"> No. HP :</label>
                            <input type="text" name="noHP-admin" id="noHP-admin">
                        </div>
                        <span>*err msg</span>
                        <div class="inlab">
                            <label for="email-admin"> Email :</label>
                            <input type="text" name="email-admin" id="email-admin">
                        </div>
                        <span>*err msg</span>
                        <div class="inlab">
                            <label for="pass-admin"> Password :</label>
                            <input type="password" name="pass-admin" id="pass-admin">
                        </div>
                        <span>*err msg</span>
                        <div class="inlab">
                            <label for="conpass-admin"> Konfirmasi Password :</label>
                            <input type="password" name="conpass-admin" id="conpass-admin">
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