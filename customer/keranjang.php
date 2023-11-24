<?php
    session_start();
    if (isset($_SESSION['custid'])){
?>
    <a href="homepage.php"><button>HOME</button></a>
    <html>
        <form method="POST" action="processingcheckout.php">
            <input type="submit" name="checkout" id="checkout" value="CHECKOUT">
        </form>

    </html>

    <?php
        
        $db = new PDO('mysql:host=localhost;dbname=store','root','');

        $custid = $_SESSION['custid'];
        

        $dispkeranjanguser = $db->prepare("SELECT plant_name,cart_detail_qty,plant_price,customer_id,crd.plant_id,cr.cart_id from carts cr,cart_details crd,plants p
                                            where cr.cart_id = crd.cart_id and crd.plant_id = p.plant_id and customer_id = {$custid}
                                            ");
        $dispkeranjanguser->execute();
        if($dispkeranjanguser->rowCount()>0){
            $dispkeranjanguser = $dispkeranjanguser->fetchAll(PDO::FETCH_ASSOC);

            $cartid = $dispkeranjanguser[0]['cart_id'];
            var_dump($dispkeranjanguser);
            foreach($dispkeranjanguser as $prdct){
                
                echo "<span>{$prdct['plant_name']}</span><br>";
                echo "<span>{$prdct['plant_price']}</span><br>";

                echo "<form action='editjum2.php' method='POST'>";
                echo "<input type='hidden' name='idprdct' id='idprdct' value='{$prdct['plant_id']}'>";
                echo "<input type='text' name='jumlah' id='jumlah' value='{$prdct['cart_detail_qty']}'>";
                echo "</form>";

                echo "<form action='editjum.php' method='POST'>";
                
                echo "<input type='hidden' name='idprdct' id='idprdct' value='{$prdct['plant_id']}'>";
                // echo "<input type='text' name='jumlah' id='jumlah' value='{$prdct['cart_detail_qty']}'>";
                echo "<input type='submit' name='hapus' id='hapus' value='HAPUS'>";
                echo "<input type='submit' name='kurangi' id='kurangi' value='-'>";
                echo "<input type='submit' name='tambahi' id='tambahi' value='+'>";
                
                echo "</form>";
                // echo "{$produk['plant_photo']}";
            }
        }
        else{
            echo "KERANJANG MASIH KOSONG";
        }
    }
    else{
        header("Location: ../login.php");
    }
?>