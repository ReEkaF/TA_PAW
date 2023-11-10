<?php 
define("FOLDER_PATH","http://localhost/TA_PAW");
define("DATABASE_PATH",$_SERVER["DOCUMENT_ROOT"]."/TA_PAW");
define("DB",new PDO('mysql:host=localhost;dbname=store','root','',[PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]))

?>