<?php
    $db = new PDO("mysql:host=localhost;dbname=store",'root','');
    $state1 = $db->prepare("SELECT customer_email,customer_password from customers");
    $state1->execute();
    $email = $state1->fetchAll(PDO::FETCH_ASSOC);
    if (isset($_GET["submit"]) ){
        $emailinput = $_GET['email'];
        $passwordinput = $_GET['password'];
        $login = false;
        foreach ($email as $i){
            if ($i['customer_email'] == $emailinput && $passwordinput==$i['customer_password']) {
                $login = true;
                break;
            }
        }
        if ($login){
            echo "login BERHASIL arahkan ke homepage";
            header("location:admin-regis.php");
        }
        else{
            if ($i['customer_email'] != $emailinput){
                echo 'email salah';
            }
            if (!($passwordinput== $i['customer_password'])){
                echo 'password salah';
                echo $i['customer_password'];
            }
            require "login.php";
            echo"LOGIN FAILED";
        }
        }
    



?>