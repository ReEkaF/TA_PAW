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
                            <label for="nama-manager"> Nama :</label>
                            <input type="text" name="nama-manager" id="nama-manager">
                        </div>
                        <span>*err msg</span>
                        <div class="inlab">
                            <label for="noHP-manager"> No. HP :</label>
                            <input type="text" name="noHP-manager" id="noHP-manager">
                        </div>
                        <span>*err msg</span>
                        <div class="inlab">
                            <label for="email-manager"> Email :</label>
                            <input type="text" name="email-manager" id="email-manager">
                        </div>
                        <span>*err msg</span>
                        <div class="inlab">
                            <label for="pass-manager"> Password :</label>
                            <input type="password" name="pass-manager" id="pass-manager">
                        </div>
                        <span>*err msg</span>
                        <div class="inlab">
                            <label for="conpass-manager"> Konfirmasi Password :</label>
                            <input type="password" name="conpass-manager" id="conpass-manager">
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