<?php
    session_start();
    if (is_numeric($_POST['jumlah'])){
    $db = new PDO('mysql:host=localhost;dbname=store','root','');
    $custid = $_SESSION['custid'];
    
    $cartid = $db->prepare("SELECT cart_id from carts where customer_id = '{$custid}'");
    $cartid->execute();
    $cartid = $cartid->fetchAll(PDO::FETCH_ASSOC);
    $cartid = $cartid[0]['cart_id'];

    $db = new PDO('mysql:host=localhost;dbname=store','root','');
    var_dump($_POST['jumlah']);
    if (isset($_POST['jumlah'])) {
        echo "masuk jumlah";
        $tambahqty = $db->prepare("UPDATE cart_details SET cart_detail_qty = '{$_POST['jumlah']}' WHERE plant_id = {$_POST['idprdct']} AND cart_id = {$cartid}");
        $tambahqty->execute();
    
    }

    }
    
    header("Location: keranjang.php");
?>