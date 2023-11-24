<?php
    session_start();
    if (isset($_SESSION['custid'])){
        $custid = $_SESSION['custid'];
        $db = new PDO('mysql:host=localhost;dbname=store','root','');
        $profilcust = $db->prepare("SELECT * from customers where customer_id = :custid");
        $profilcust->bindValue(":custid",$custid);
        $profilcust->execute();
        $profilcust = $profilcust->fetchAll(PDO::FETCH_ASSOC);
        foreach ($profilcust[0] as $data){
            echo $data."<br>";
        }
    }
    else{
        header("Location: ../login.php");
    }


?>