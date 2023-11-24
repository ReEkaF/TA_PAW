<?php
    session_start();
    if (isset($_SESSION['custid'])){
        // tampilkan produk,tampilkan harga barang * jumlah, tampilkan total jumlah 
        $tgl = date('Y-m-d');
        $db = new PDO('mysql:host=localhost;dbname=store','root','');
        $customerid = $_SESSION['custid'];
        // $paymentoption = 1;
        $orderdate = $tgl;
        $buktibayar = "x.jpg";
        $orderstatus = "pending";
        $dispkeranjanguser = $db->prepare("SELECT plant_name,plant_id,Jumlah,plant_price,customer_id,SUM(Jumlah * plant_price) Subtotal from
                                            (SELECT plant_name,SUM(cart_detail_qty) Jumlah,plant_price,customer_id,p.plant_id from carts cr,cart_details crd,plants p
                                            where cr.cart_id = crd.cart_id and crd.plant_id = p.plant_id and customer_id = {$customerid}
                                            group by plant_name,plant_price,customer_id) kr 
                                            group by plant_name");
        $dispkeranjanguser->execute();
        $dispkeranjanguser= $dispkeranjanguser->fetchAll(PDO::FETCH_ASSOC);

        $paymentmethod = $db->prepare("SELECT * from payment_methods");
        $paymentmethod->execute();
        $paymentmethod = $paymentmethod->fetchAll(PDO::FETCH_ASSOC);
        // var_dump($dispkeranjanguser);
        $total = 0;
        foreach ($dispkeranjanguser as $prdct){
            echo "<br><span>{$prdct['plant_id']}</span><br>";
            echo "<span>{$prdct['plant_name']}</span><br>";
            echo "<span>{$prdct['plant_price']}</span><br>";
            echo "<span>{$prdct['Jumlah']}</span><br>";
            echo "<span>{$prdct['Subtotal']}</span><br>";
            $total += $prdct['Subtotal'];
            echo "<br>";
        }
        echo"
        <html>
            <form method='POST' action='addorder.php'>

                <label for='bayar'>METHODE PEMBAYARAN :</label>
                <input list='listbayar' name='bayar' id='bayar'>
                <datalist id='listbayar'>";
                    foreach($paymentmethod as $bank){
                        echo"<option value='{$bank['payment_method_bank']}'>";
                    }
                echo "
                </datalist>


                <br>
                <input type='submit' name='pesan' id='pesan' value='PESAN SEKARANG'>
                
            </form>
        </html>";

        echo "<br> TOTAL = ".$total;
        echo "";
    }
    else{
        header("Location: ../login.php");
    }
?>


