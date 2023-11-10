<?php
    $db = new PDO("mysql:host=localhost;dbname=store",'root','');
    $errors = array();
    $erroremail = '';
    $errorpassword = '';
    $errornama = '';
    $errortelp = '';
    require_once 'validate.php';

    if (isset($_POST['submit'])){
        // validasiusername($errors,$errorusername,$_POST,'username');
        validateemail($errors,$erroremail,$_POST,'email');
        validatepassword($errors,$errorpassword,$_POST,'password');
        validatename($errors,$errornama,$_POST,'nama');
        validatenum($errors,$errortelp,$_POST,'telp');
        if ($errors){
            // var_dump($errors);
            echo "<h1> Invalid, correct the following errors</h1>";
        }
        else{
            $statedaftar = $db->prepare("INSERT into customers (customer_name,customer_phone,customer_email,customer_password,customer_photo) values(:cust_name,:cust_phone,:cust_email,:cust_password,:photo)");
            $statedaftar->bindValue(":cust_name",$_POST['nama']);
            $statedaftar->bindValue(":cust_phone",$_POST['telp']);
            $statedaftar->bindValue(":cust_email",$_POST['email']);
            // $statedaftar->bindValue(":cust_password",password_hash($_POST['password'],PASSWORD_DEFAULT) );
            $statedaftar->bindValue(":cust_password",$_POST['password']);
            $statedaftar->bindValue(":photo","xxx.jpeg");
            $statedaftar->execute();
            echo "Registrasi Berhasil";
            echo $_POST['password'];
            header("Location:../transaction.php");
        }
    }
    else{
        require_once 'register.php'; // README Harus dilihat / disesuaikan
    }
?>

    


?>