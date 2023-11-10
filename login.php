<?php
    $title = 'Login';
    $page = 'login';
?>

<?php require_once("layouts/header.php"); ?>
<?php require_once("libs/validate-login.php")?>
<fieldset>
<legend>LOGIN</legend>

<form action="login.php" method="GET">
    <label for="email"> email :</label>
    <input type="text" name="email" id="email"><br>
    <label for="password"> Password :</label>
    <input type="password" name="password" id="password"><br>
    <input type="submit" value="LOGIN" name="submit">
</form>
</fieldset>
    
<?php require_once("layouts/footer.php"); ?>