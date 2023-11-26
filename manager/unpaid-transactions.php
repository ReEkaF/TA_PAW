<?php

$page = 'unpaid-transactions';
$title = 'Unpaid Transactions';

require_once('layouts/header.php');

?>

<!-- your content in here -->
<div class="admin">
  <div class="admin__header">
    <h1 class="admin__title">Unpaid transactions</h1>
  </div>
  <div class="admin__body">
    <form action="./unpaid-transactions.php" method="get" class="admin__filters">
      <input type="date" class="input" name="datestart"/>
      <span>to</span>
      <input type="date" class="input" name="dateend"/>
      <button class="admin__button">Filter</button>
    </form>
    <div class="admin__card">
      <h2 class="admin__card-title">Graph</h2>
      <hr />
      <canvas id="graph" class="graph"></canvas>
    </div>
    <div class="admin__card">
<table>
    <?php 
    $connect=mysqli_connect('localhost','root','','store');
        
    if (isset($_GET['datestart']) && isset($_GET['dateend'])) {
      $datestart = $_GET['datestart'];
      $dateend = $_GET['dateend'];
    } else {
      $datestart = '200-01-01';
      $dateend = '5000-01-01';
    }

    $tanggalpenjualan = mysqli_query($connect, "SELECT order_date FROM orders WHERE order_status = 'Pending' AND order_date BETWEEN '$datestart' AND '$dateend' GROUP BY order_date");
    $penjualan = mysqli_query($connect, "SELECT SUM(order_total_price) AS sold FROM orders WHERE order_status = 'Pending' AND order_date BETWEEN '$datestart' AND '$dateend' GROUP BY order_date");

    $paymentmethod = mysqli_query($connect, "SELECT payment_method_bank FROM payment_methods paymet, orders ord WHERE paymet.payment_method_id = ord.payment_method_id AND order_status = 'pending' AND order_date BETWEEN '$datestart' AND '$dateend' ORDER BY order_date");
    $orderdate = mysqli_query($connect, "SELECT order_date FROM orders WHERE order_status = 'pending' AND order_date BETWEEN '$datestart' AND '$dateend' ORDER BY order_date");
    $plantquantity = mysqli_query($connect, "SELECT order_detail_qty AS quantity FROM order_details ordet, orders ord WHERE ordet.order_id = ord.order_id AND ord.order_status = 'paid' ORDER BY ord.order_date");
    $orderprice = mysqli_query($connect, "SELECT order_total_price FROM orders WHERE order_status = 'pending' AND order_date BETWEEN '$datestart' AND '$dateend' ORDER BY order_date");
    $linkid = mysqli_query($connect, "SELECT order_id FROM orders WHERE order_status = 'pending' AND order_date BETWEEN '2000-01-01' AND '5000-12-12' ORDER BY order_date");

    $plantquantitytotal = mysqli_query($connect, "SELECT SUM(ordet.order_detail_qty) AS quantity FROM order_details ordet, orders ord WHERE ordet.order_id = ord.order_id AND ord.order_status = 'pending' AND order_date BETWEEN '$datestart' AND '$dateend'");
    $orderpricetotal = mysqli_query($connect, "SELECT SUM(order_total_price) AS prices FROM orders WHERE order_status = 'pending' AND order_date BETWEEN '$datestart' AND '$dateend'");

    $paymentmethodarray = array();
    while ($row = mysqli_fetch_array($paymentmethod)) {
        array_push($paymentmethodarray, $row['payment_method_bank']);
    }
    $orderdatearray = array();
    while ($row = mysqli_fetch_array($orderdate)) {
        array_push($orderdatearray, $row['order_date']);
    }
    $plantquantityarray = array();
    while ($row = mysqli_fetch_array($plantquantity)) {
        array_push($plantquantityarray, $row['quantity']);
    }
    $orderpricearray = array();
    while ($row = mysqli_fetch_array($orderprice)) {
        array_push($orderpricearray, $row['order_total_price']);
    }
    $linkidarray = array();
    while ($row = mysqli_fetch_array($linkid)) {
        array_push($linkidarray, $row['order_id']);
    }


    $len = count($orderdatearray);
    $drop = $len+1;

    for ($rait = 0; $rait <= $drop; $rait++) 
    {
        for ($don = 0; $don <= 5; $don++) {
            if ($rait == 0) {
              if ($don == 0) {
                  echo "<thead><tr><th>No.</th>";  
                } else if ($don == 1) {
                  echo '<th>Payment Methods</th>';
                } else if ($don == 2) {
                  echo '<th>Date</th>';
                } else if ($don == 3) {
                  echo '<th>Total Items</th>';
                } else if ($don == 4) {
                  echo '<th>Total Price</th>';
                } else {
                  echo '<th> </th></tr></thead>';
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
                  if ($orderpricetotal){
                    $row = mysqli_fetch_assoc($orderpricetotal);
                    $prices = $row['prices'];
                    echo "<td>$prices</td>";
                  } else {
                    echo 0;
                  }
                } else if ($don == 6) {
                  echo '<td> </td></tr></tfoot>';
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
                echo '<td>'.$paymentmethodarray[$rait-1].'</td>';
              } else if ($don == 2 && $rait != 0 && $rait != $drop) {
                echo '<td>'.$orderdatearray[$rait-1].'</td>';
              } else if ($don == 3 && $rait != 0 && $rait != $drop) {
                echo '<td>'.$plantquantityarray[$rait-1].'</td>';
              } else if ($don == 5) {
                if ($rait == $len) {
                  echo '<td><a href="./unpaid-transaction-single.php?transid='.$linkidarray[$rait-1].'">More Info</a></td></tbody>';
                } else {
                  echo '<td><a href="./unpaid-transaction-single.php?transid='.$linkidarray[$rait-1].'">More Info</a></td>';
                }
              } else {
                if ($rait != $drop) {
                  echo '<td>'.$orderpricearray[$rait - 1].'</td>';
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

<!-- js libs -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<!-- custom js -->
<script>
  const ctx = document.getElementById('graph');

  new Chart(ctx, {
    type: 'bar',
    data: {
      labels: [
        <?php while ($row = mysqli_fetch_array($tanggalpenjualan)){echo '"'.$row['order_date'].'",';} ?>
      ], // Nama data yang dihitung
      datasets: [{
        label: '# of Transactions',
        data: [
          <?php while($row = mysqli_fetch_array($penjualan)){echo '"'.$row['sold'].'",';} ?>
        ],  // Banyak data
        borderWidth: 1
      }]
    },
    options: {
      scales: {
        y: {
          beginAtZero: true
        }
      }
    }
  });
</script>


<?php

require_once('layouts/footer.php');

?>