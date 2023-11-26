<?php

$page = 'unpaid-transactions';
$title = 'Unpaid Transaction Single';

require_once('layouts/header.php');

$connect=mysqli_connect('localhost','root','','store');

$transid = isset($_GET['transid']) ? $_GET['transid'] : null;

$dateorder = mysqli_query($connect, "SELECT order_date FROM order_details ordet, orders ord WHERE ord.order_id = $transid");

$plantname = mysqli_query($connect, "SELECT plant_name FROM order_details ordet, plants pl WHERE ordet.plant_id = pl.plant_id AND order_id = $transid ORDER BY order_detail_unit_price");
$plantprice = mysqli_query($connect, "SELECT plant_price FROM order_details ordet, plants pl WHERE ordet.plant_id = pl.plant_id AND order_id = $transid ORDER BY order_detail_unit_price");
$plantquantity = mysqli_query($connect, "SELECT order_detail_qty FROM order_details WHERE order_id = $transid ORDER BY order_detail_unit_price");
$planttotal = mysqli_query($connect, "SELECT order_detail_unit_price FROM order_details WHERE order_id = $transid ORDER BY order_detail_unit_price");

$plantquantitytotal = mysqli_query($connect, "SELECT SUM(order_detail_qty) AS quantity FROM order_details WHERE order_id = $transid ORDER BY order_detail_unit_price");
$planttotalall = mysqli_query($connect, "SELECT SUM(order_detail_unit_price) AS prices FROM order_details WHERE order_id = $transid ORDER BY order_detail_unit_price");

$plantquantityarray = array();
while ($row = mysqli_fetch_array($plantquantity)) {
    array_push($plantquantityarray, $row['order_detail_qty']);
}
$planttotalarray = array();
while ($row = mysqli_fetch_array($planttotal)) {
    array_push($planttotalarray, $row['order_detail_unit_price']);
}
$plantpricearray = array();
while ($row = mysqli_fetch_array($plantprice)) {
    array_push($plantpricearray, $row['plant_price']);
}
$plantnamearray = array();
while ($row = mysqli_fetch_array($plantname)) {
    array_push($plantnamearray, $row['plant_name']);
}
$dateorderarray = array();
while ($row = mysqli_fetch_array($dateorder)) {
    array_push($dateorderarray, $row['order_date']);
}


$len = count($planttotalarray);
$drop = $len+1;


?>

<!-- your content in here -->
<div class="admin">
  <div class="admin__header">
    <div class="admin__back">
      <i class="ph-bold ph-arrow-left"></i>
      <a href="./unpaid-transactions.php">Kembali</a>
    </div>
    <h1 class="admin__title">Unpaid transaction single</h1>
  </div>
  <div class="admin__body">
    <div class="admin__card">
      <?php
      echo "<p>Tanggal transaksi: ".$dateorderarray[0]."</p>";
      ?>
    </div>
    <div class="admin__card">
<table>
    <?php 
    for ($rait = 0; $rait <= $drop; $rait++) 
    {
        for ($don = 0; $don <= 4; $don++) {
            if ($rait == 0) {
              if ($don == 0) {
                  echo "<thead><tr><th>No.</th>";  
                } else if ($don == 1) {
                  echo '<th>Plants</th>';
                } else if ($don == 2) {
                  echo '<th>Price</th>';
                } else if ($don == 3) {
                  echo '<th>Quantity</th>';
                } else {
                  echo '<th>Sub-Total</th>';
                }
              } else if ($rait == $drop) {
                if ($don == 0) {
                  echo '<tfoot><tr><td>total</td>';
                } else if ($don == 3){
                  if ($plantquantitytotal){
                    $row = mysqli_fetch_assoc($plantquantitytotal);
                    $quantity = $row['quantity'];
                    echo "<td>$quantity</td>";
                  } else {
                    echo 0;
                  }
                } else if($don == 4){
                  if ($planttotalall){
                    $row = mysqli_fetch_assoc($planttotalall);
                    $prices = $row['prices'];
                    echo "<td>$prices</td></tfoot>";
                  } else {
                    echo 0;
                  }
                } else {
                  echo '<td> </td>';
                }
              } else if ($don == 0 && $rait != 0) {
                if ($rait != $drop){
                  if ($rait == 1) {
                    echo '<tbody><tr><td>'.$rait.'</td>';
                  } else {
                    echo '<tr><td>'.$rait.'</td>';
                  }
                }
              } else if ($don == 1 && $rait != 0 && $rait != $drop) {
                echo '<td>'.$plantnamearray[$rait-1].'</td>';
              } else if ($don == 2 && $rait != 0 && $rait != $drop) {
                echo '<td>'.$plantpricearray[$rait-1].'</td>';
              } else if ($don == 3 && $rait != 0 && $rait != $drop) {
                echo '<td>'.$plantquantityarray[$rait-1].'</td>';
              } else {
                if ($rait != $len) {
                  echo '<td>'.$planttotalarray[$rait - 1].'</td>';
                } else if ($rait == $len) {
                  echo '<td>'.$planttotalarray[$rait - 1].'</td><tbody>';
                } else {
                  echo '<td> </td>';
                }
            }
        }
    }
    ?>
</table>
    </div>
  </div>
</div>
<!-- end your content in here -->

<?php

require_once('layouts/footer.php');

?>