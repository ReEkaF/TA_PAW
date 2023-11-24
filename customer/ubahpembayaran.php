<?php
    session_start();
    $db = new PDO('mysql:host=localhost;dbname=store','root','');
    if (isset($_SESSION['custid'])){
        if(isset($_POST['ubahpay'])){
            $_SESSION['orderid'] = $_POST['orderid'];
        }
        echo $_SESSION['orderid'];
        if (isset($_POST['ubah'])){
                $orderid = $_SESSION['orderid'];
                
                
                $paynew = $db->prepare("SELECT payment_method_id from payment_methods where payment_method_bank= '{$_POST['pembayaran']}'");
                $paynew->execute();
                $paynew = $paynew->fetchAll(PDO::FETCH_ASSOC);
                var_dump($paynew);
                $ubahpembayaran = $db->prepare("UPDATE orders set payment_method_id = {$paynew[0]['payment_method_id']} where order_id = $orderid");
                $ubahpembayaran->execute();
                header("Location: allorder.php");
        }
    
    
?>
<form action="ubahpembayaran.php" method="POST">
    <label for="pembayaran">UBAH PEMBAYARAN KE :</label>
    <input list="listbayar" name="pembayaran" id="pembayaran" value="BCA">
    <datalist id='listbayar'>";
            <?php
            
            $paymentmethod = $db->prepare("SELECT * from payment_methods");
            $paymentmethod->execute();
            $paymentmethod = $paymentmethod->fetchAll(PDO::FETCH_ASSOC);
            foreach($paymentmethod as $bank){
                    echo"<option value='{$bank['payment_method_bank']}'>";
                }
            ?>
    </datalist>
    <input type="submit" name="ubah" id="ubah" value="OK">


</form>
<?php
    }
    else{
        header("Location: ../login.php");
    }
?>
