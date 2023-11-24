<?php
    session_start();
    if (isset($_SESSION['custid'])){
        $db = new PDO('mysql:host=localhost;dbname=store','root','');
        $custid = $_SESSION['custid'];
        
        $cartid = $db->prepare("SELECT cart_id from carts where customer_id = '{$custid}'");
        $cartid->execute();
        $cartid = $cartid->fetchAll(PDO::FETCH_ASSOC);
        $cartid = $cartid[0]['cart_id'];

        $db = new PDO('mysql:host=localhost;dbname=store','root','');
        var_dump($_POST['jumlah']);
        if (isset($_POST['tambahi'])) {
            echo "masuk tambah";
            $tambahqty = $db->prepare("UPDATE cart_details SET cart_detail_qty = cart_detail_qty + 1 WHERE plant_id = {$_POST['idprdct']} AND cart_id = {$cartid}");
            $tambahqty->execute();
        } elseif (isset($_POST['hapus'])) {
            echo "masuk hapus";
            $hapusqty = $db->prepare("DELETE FROM cart_details WHERE plant_id = {$_POST['idprdct']} AND cart_id = {$cartid}");
            $hapusqty->execute();
        } elseif (isset($_POST['kurangi'])) {
            echo "masuk kurangi";
            $kurangiqty = $db->prepare("UPDATE cart_details SET cart_detail_qty = cart_detail_qty - 1 WHERE plant_id = {$_POST['idprdct']} AND cart_id = {$cartid}");
            $kurangiqty->execute();
        } 
        // elseif (isset($_POST['jumlah'])) {
        //     echo "masuk jumlah";
        //     $tambahqty = $db->prepare("UPDATE cart_details SET cart_detail_qty = '{$_POST['jumlah']}' WHERE plant_id = {$_POST['idprdct']} AND cart_id = {$cartid}");
        //     $tambahqty->execute();
        // 
        // }


        
        header("Location: keranjang.php");
    }
    else{
        header("Location: ../login.php");
    }
?>