<?php

$page = 'paid-transactions';
$title = 'Paid Transactions';

require_once('layouts/header.php');

// Database configuration
$dbHost = 'localhost';
$dbName = 'store';
$dbUser = 'root';
$dbPass = '';

try {
    $pdo = new PDO("mysql:host={$dbHost};dbname={$dbName}", $dbUser, $dbPass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}

?>

<!-- your content in here -->
<div class="admin">
    <div class="admin__header">
        <h1 class="admin__title">Paid transactions</h1>
    </div>
    <div class="admin__body">
        <!-- filter tanggal -->
        <form action="./paid-transactions.php" method="get" class="admin__filters"> 
            <input type="date" class="input" name="datestart" />
            <span>to</span>
            <input type="date" class="input" name="dateend" />
            <button class="admin__button">Filter</button>
        </form>
        <div class="admin__card">
            <h2 class="admin__card-title">Graph</h2>
            <hr />
            <!-- grafik chart -->
            <canvas id="graph" class="graph"></canvas>
        </div>
        <div class="admin__card">
          <!-- tabel laporan -->
            <table>
                <?php
                // Prepare statements untuk
                $tanggalpenjualan = $pdo->prepare("SELECT order_date FROM orders WHERE order_status = 'paid' AND order_date BETWEEN :datestart AND :dateend GROUP BY order_date");
                $penjualan = $pdo->prepare("SELECT SUM(order_total_price) AS sold FROM orders WHERE order_status = 'paid' AND order_date BETWEEN :datestart AND :dateend GROUP BY order_date");
                $paymentmethod = $pdo->prepare("SELECT payment_method_bank FROM payment_methods paymet, orders ord WHERE paymet.payment_method_id = ord.payment_method_id AND order_status = 'paid' AND order_date BETWEEN :datestart AND :dateend ORDER BY order_date");
                $orderdate = $pdo->prepare("SELECT order_date FROM orders WHERE order_status = 'paid'AND order_date BETWEEN :datestart AND :dateend ORDER BY order_date");
                $plantquantity = $pdo->prepare("SELECT order_detail_qty AS quantity FROM order_details ordet, orders ord WHERE ordet.order_id = ord.order_id AND ord.order_status = 'paid' AND order_date BETWEEN :datestart AND :dateend ORDER BY ord.order_date");
                $orderprice = $pdo->prepare("SELECT order_total_price FROM orders WHERE order_status = 'paid' AND order_date BETWEEN :datestart AND :dateend ORDER BY order_date");
                $linkid = $pdo->prepare("SELECT order_id FROM orders WHERE order_status = 'paid' AND order_date BETWEEN '1023-01-01' AND '5023-12-12' ORDER BY order_date");

                $plantquantitytotal = $pdo->prepare("SELECT SUM(ordet.order_detail_qty) AS quantity FROM order_details ordet, orders ord WHERE ordet.order_id = ord.order_id AND ord.order_status = 'paid' AND order_date BETWEEN :datestart AND :dateend");
                $orderpricetotal = $pdo->prepare("SELECT SUM(order_total_price) AS prices FROM orders WHERE order_status = 'paid' AND order_date BETWEEN :datestart AND :dateend");

                // Bind parameter
                $datestart = isset($_GET['datestart']) ? $_GET['datestart'] : '200-01-01';
                $dateend = isset($_GET['dateend']) ? $_GET['dateend'] : '5000-01-01';

                $tanggalpenjualan->bindParam(':datestart', $datestart);
                $tanggalpenjualan->bindParam(':dateend', $dateend);
                $penjualan->bindParam(':datestart', $datestart);
                $penjualan->bindParam(':dateend', $dateend);
                $paymentmethod->bindParam(':datestart', $datestart);
                $paymentmethod->bindParam(':dateend', $dateend);
                $orderdate->bindParam(':datestart', $datestart);
                $orderdate->bindParam(':dateend', $dateend);
                $plantquantity->bindParam(':datestart', $datestart);
                $plantquantity->bindParam(':dateend', $dateend);
                $orderprice->bindParam(':datestart', $datestart);
                $orderprice->bindParam(':dateend', $dateend);
                //$linkid->bindParam(':datestart', $datestart);
                //$linkid->bindParam(':dateend', $dateend);
                $plantquantitytotal->bindParam(':datestart', $datestart);
                $plantquantitytotal->bindParam(':dateend', $dateend);
                $orderpricetotal->bindParam(':datestart', $datestart);
                $orderpricetotal->bindParam(':dateend', $dateend);

                // Execute query
                $tanggalpenjualan->execute();
                $penjualan->execute();
                $paymentmethod->execute();
                $orderdate->execute();
                $plantquantity->execute();
                $orderprice->execute();
                $linkid->execute();
                $plantquantitytotal->execute();
                $orderpricetotal->execute();

                // Fetch data
                $paymentmethodarray = $paymentmethod->fetchAll(PDO::FETCH_ASSOC);
                $orderdatearray = $orderdate->fetchAll(PDO::FETCH_ASSOC);
                $plantquantityarray = $plantquantity->fetchAll(PDO::FETCH_ASSOC);
                $orderpricearray = $orderprice->fetchAll(PDO::FETCH_ASSOC);
                $linkidarray = $linkid->fetchAll(PDO::FETCH_ASSOC);

                $len = count($orderdatearray);
                $drop = $len + 1; //tinggi tabel sesuai banyak data + 1

                for ($rait = 0; $rait <= $drop; $rait++) { //$don = kolom tabel, $rait = baris tabel
                    for ($don = 0; $don <= 5; $don++) {
                        if ($rait == 0) { //header tabel
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
                            if ($don == 0) { //baris paling bawah
                                echo '<tfoot><tr><td>total</td>';
                            } else if ($don == 3) { //kolom 3 untuk total quantitas produk
                                if ($plantquantitytotal) {
                                    $quantity = $plantquantitytotal->fetchColumn();
                                    echo "<td>$quantity</td>";
                                } else {
                                    echo 0;
                                }
                            } else if ($don == 4) { //kolom 4 untuk total harga produk
                                if ($orderpricetotal) {
                                    $prices = $orderpricetotal->fetchColumn();
                                    echo "<td>$prices</td>";
                                } else {
                                    echo 0;
                                }
                            } else { //kosong, untuk tabel tanpa jumlah total
                                echo '<td> </td>';
                            }
                        } else if ($don == 0 && $rait != 0) {
                            if ($rait != $drop) { // isian nomor urut transaksi
                                if ($rait == 1) {
                                    echo '<tbody><tr><td>' . $rait . '</td>';
                                } else {
                                    echo '<tr><td>' . $rait . '</td>';
                                }
                            }
                        } else if ($don == 1 && $rait != 0 && $rait != $drop) { // kolom 1 untuk metode pembayaran
                            echo '<td>' . $paymentmethodarray[$rait - 1]['payment_method_bank'] . '</td>';
                        } else if ($don == 2 && $rait != 0 && $rait != $drop) { // kolom 2 untuk tanggal
                            echo '<td>' . $orderdatearray[$rait - 1]['order_date'] . '</td>';
                        } else if ($don == 3 && $rait != 0 && $rait != $drop) { // kolom 3 untuk kuantitas produk
                            echo '<td>' . $plantquantityarray[$rait - 1]['quantity'] . '</td>';
                        } else if ($don == 5) {
                            if ($rait == $len) { // kolom untuk info lebih lanjut
                                echo '<td><a href="./paid-transaction-single.php?transid=' . $linkidarray[$rait - 1]['order_id'] . '">More Info</a></td></tbody>';
                            } else {
                                echo '<td><a href="./paid-transaction-single.php?transid=' . $linkidarray[$rait - 1]['order_id'] . '">More Info</a></td>';
                            }
                        } else {
                            if ($rait != $drop) { // kolom 4 untuk harga 
                                echo '<td>' . $orderpricearray[$rait - 1]['order_total_price'] . '</td>';
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
                <?php while ($row = $tanggalpenjualan->fetch(PDO::FETCH_ASSOC)) {echo '"'.$row['order_date'].'",';} ?>
            ], // Nama data yang dihitung
            datasets: [{
                label: '# of Transactions',
                data: [
                    <?php while ($row = $penjualan->fetch(PDO::FETCH_ASSOC)) {echo '"'.$row['sold'].'",';} ?>
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
