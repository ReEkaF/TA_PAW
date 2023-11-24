<?php
    session_start();
    require "../validate.php";
    $db = new PDO('mysql:host=localhost;dbname=store','root','');


    //$buatkeranjang = $db->prepare("INSERT into carts (customer_id) values (1)"); // ini dibuat setelah user registrasi
    //$buatkeranjang->execute();
    if (isset($_SESSION['custid'])){
        if (isset($_GET['tambah'])){
            if (!validatejumlah($errorjum,$_GET,'jumlah')){
                $errorjum = "JUMLAH HARUS ANGKA";
                header("Location: homepage.php");
                
            }
            else{
                echo'masukelse';
                $custid = $_SESSION['custid'];

                $cartid = $db->prepare("SELECT cart_id from carts where customer_id = '{$custid}'");
                $cartid->execute();
                $cartid = $cartid->fetchAll(PDO::FETCH_ASSOC);
                $cartid = $cartid[0]['cart_id'];


                $idprdct = $_GET['idprdct'];
                $jumprdct = $_GET['jumlah'];

                $checkproduct = $db->prepare("SELECT plant_id from cart_details where cart_id = '{$cartid}' and plant_id = '{$idprdct}'");
                $checkproduct->execute();
                $checkproduct = $checkproduct->fetchAll(PDO::FETCH_ASSOC);

                if ($checkproduct){
                    
                    $updatejum = $db->prepare("UPDATE cart_details SET cart_detail_qty = cart_detail_qty + {$jumprdct} where plant_id = '{$idprdct}' and cart_id = '{$cartid}' ");
                    $updatejum->execute();

                }
                else{

                    $masukkeranjang = $db->prepare("INSERT into cart_details (plant_id,cart_id,cart_detail_qty) values({$idprdct},{$cartid},{$jumprdct})");
                    $masukkeranjang->execute();
                }
                header("Location: keranjang.php");
            }
            // var_dump($jumprdct);
            // $tambah = $db->prepare("INSERT into cart_details (plant_id,cart_id,cart_detail_qty) values ({$idprdct},{$cartid},{$jumprdct})");
            // $tambah->execute();
        }
    }
    else{
        header("Location: ../login.php");
    }
?>