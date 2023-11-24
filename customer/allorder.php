<?php
    session_start();
    if (isset($_SESSION['custid'])){
        $db = new PDO('mysql:host=localhost;dbname=store','root','');
        $custid = $_SESSION['custid'];
        $allorderpending = $db->prepare("SELECT * from orders,payment_methods where customer_id = {$custid} and  order_status = 'pending' and payment_methods.payment_method_id = orders.payment_method_id ");
        $allorderpending->execute();
        $allorderpending = $allorderpending->fetchAll(PDO::FETCH_ASSOC);

        $allorderdetail  = $db->prepare("SELECT order_detail_id,order_details.order_id,order_details.plant_id,order_detail_qty,order_detail_unit_price,plant_name from order_details,orders,plants where orders.customer_id = {$custid}  and orders.order_id = order_details.order_id and order_details.plant_id = plants.plant_id;");
        $allorderdetail->execute();
        $allorderdetail = $allorderdetail->fetchAll(PDO::FETCH_ASSOC);
        var_dump($allorderdetail);

        foreach ($allorderpending as $orderid){
            echo "<h1>Nomor Pesanan : {$orderid['order_id']}</h1>";
            foreach ($allorderdetail as $ord){
                if ($ord['order_id'] == $orderid['order_id']){
                    echo "{$ord['plant_name']}<br>";
                    echo "{$ord['order_detail_qty']}<br>";
                    echo $ord['order_detail_qty'] * $ord['order_detail_unit_price']."<br>";
                    
                }
            }
            echo "{$orderid['payment_method_bank']}<br>";
            echo "<form action='ubahpembayaran.php' method='POST'>  
                    <input type='hidden' name='orderid' id='orderid' value='{$orderid['order_id']}'>
                    <input type='submit' name='ubahpay' id='ubahpay' value='UBAH'>
                    </form>";
        }

        $allordersukses = $db->prepare("SELECT * from orders,payment_methods where customer_id = {$custid} and  order_status = 'sukses' and payment_methods.payment_method_id = orders.payment_method_id ");
        $allordersukses->execute();
        $allordersukses = $allordersukses->fetchAll(PDO::FETCH_ASSOC);
        foreach ($allordersukses as $orderidsukses){
            echo "<h1>Nomor Pesanan : {$orderidsukses['order_id']}</h1>";
            foreach ($allorderdetail as $ord){
                if ($ord['order_id'] == $orderidsukses['order_id']){
                    echo "{$ord['plant_name']}<br>";
                    echo "{$ord['order_detail_qty']}<br>";
                    echo $ord['order_detail_qty'] * $ord['order_detail_unit_price']."<br>";
                    
                }
            }
            echo "{$orderidsukses['payment_method_bank']}<br>";
        }
    }
    else{
        header("Location: ../login.php");
    }
?>