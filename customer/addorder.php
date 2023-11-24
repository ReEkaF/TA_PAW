<?php
    session_start();
    if (isset($_SESSION['custid'])){


    echo "<a href='homepage.php'>HOMEPAGE</a>";
    if (isset($_POST['pesan'])){
        $tgl = date('Y-m-d');
        $db = new PDO('mysql:host=localhost;dbname=store','root','');

        $customerid = $_SESSION['custid'];

        $paymentoption = $db->prepare("SELECT * from payment_methods where payment_method_bank = '{$_POST['bayar']}' ");
        $paymentoption->execute();
        $paymentoption = $paymentoption->fetchAll(PDO::FETCH_ASSOC);
        // var_dump($paymentoption);
        $paymentmetodid = $paymentoption[0]["payment_method_id"];
        $norekpayment = $paymentoption[0]["payment_method_number"];
        $namepayment = $paymentoption[0]["payment_method_name"];
        $paymentmetod = $paymentoption[0]["payment_method_bank"];


        $orderdate = $tgl;
        $buktibayar = "x.jpg";
        $orderstatus = "pending";
        $tot = 0;
        $order_id = $db->prepare("SELECT MAX(order_id) from orders ");
        $order_id->execute();
        $order_id = $order_id->fetchAll(PDO::FETCH_ASSOC);
        $order_id = $order_id[0]['MAX(order_id)']+1;
        $ordermasuk = $db->prepare("INSERT into orders (order_id,customer_id,payment_method_id,order_date,order_proof_of_payment,order_status) values (:orderid,:custid,:payment,:orderdate,:accpay,:orderstatus)
                                    ");
        $ordermasuk->bindValue(":orderid",$order_id);
        $ordermasuk->bindValue(":custid",$customerid);
        $ordermasuk->bindValue(":payment",$paymentmetodid);
        $ordermasuk->bindValue(":orderdate",$tgl);
        $ordermasuk->bindValue(":accpay",$buktibayar);
        $ordermasuk->bindValue(":orderstatus",$orderstatus);
        $ordermasuk->execute();


        $dispkeranjanguser = $db->prepare("SELECT crd.plant_id,SUM(cart_detail_qty) Jumlah,plant_price from carts cr,cart_details crd,plants p
                                        where cr.cart_id = crd.cart_id and crd.plant_id = p.plant_id and customer_id = '$customerid'
                                        group by crd.plant_id,plant_price");
        $dispkeranjanguser->execute();
        $dispkeranjanguser = $dispkeranjanguser->fetchAll(PDO::FETCH_ASSOC);
        // var_dump($dispkeranjanguser);
        foreach ($dispkeranjanguser as $produk){
            $orderdetailmasuk = $db->prepare("INSERT into order_details (order_id,plant_id,order_detail_qty,order_detail_unit_price) values (:orderid,:plantid,:qty,:plantprc) ");
            $orderdetailmasuk->bindValue("orderid",$order_id);
            $orderdetailmasuk->bindValue("plantid",$produk['plant_id']);
            $orderdetailmasuk->bindValue("qty",$produk['Jumlah']);
            $orderdetailmasuk->bindValue("plantprc",$produk['plant_price']);
            $orderdetailmasuk->execute();
            $subtot = $produk['Jumlah'] * $produk['plant_price'];
            $tot += $subtot;
        }
        echo "<br>NOMOR ORDER : ".$order_id;
        echo "<br>TOTAL BELANJA = ".$tot;
        echo "<br>METHODE PEMBAYARAN : ".$paymentmetod."\t    \t";
        echo "<form action='ubahpembayaran.php' method='POST'>  
                <input type='hidden' name='orderid' id='orderid' value='{$order_id}'>
                <input type='submit' name='ubahpay' id='ubahpay' value='UBAH'>
                </form>";
        echo "<br>SILAHKAN TRANSFER KE REKENING ".$paymentmetod." : ".$norekpayment." a.n ".$namepayment;
        }
    }
    else{
        header("Location: ../login.php");
    }
?>