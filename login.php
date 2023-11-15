<?php
    $title = 'Login';
    $page = 'login';
?>

<?php require_once("layouts/header.php"); ?>

<fieldset>
    <legend>Login dengan akun anda</legend>
    <form action="logi.php" method="GET">
        <div class="field">
            <div class="inlab">
                <label for="email"> Email :</label>
                <input type="text" name="email" id="email">
            </div>
            <span>*err msg</span>
            <div class="inlab">
                <label for="password"> Password :</label>
                <input type="password" name="password" id="password">
            </div>
            <span>*err msg</span>
        </div>
        <div class="toregis">
            <a href="regis-master.php">Belum punya akun?</a>
        </div>
        <div class="fieldsub">
            <input type="submit" value="LOGIN">
        </div>
    </form>
</fieldset>
    
<?php require_once("layouts/footer.php"); ?>