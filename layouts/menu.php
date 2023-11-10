<div>
    <div class="menu">
        <div>
            <img src="asset/pict/misminit.jpg" >
        </div>
        
        <div class="headermenu">
            <nav class="<?php if($page == "login") echo 'active';?> ">
                <a href="<?= FOLDER_PATH ?>/app/lognreg/login.php">Login</a>
            </nav>
            <nav class="<?php if($page == "regis") echo 'active';?> ">
                <a href="<?= FOLDER_PATH ?>/app/lognreg/regis-master.php">Registrasi</a>
            </nav>
        </div>
    </div>
</div>