<?php

session_start();

if (!isset($_SESSION['customer_id'])) {
  header("Location: ./login.php");
  exit();
}

if (!isset($_POST['plant_id'])) {
  header("Location: ./products.php");
  exit();
}

require_once('data/cart-item.php');

$customer_id = $_SESSION['customer_id'];
$plant_id = $_POST['plant_id'];

$cart_item = find_cart_item($customer_id, $plant_id);

if (!$cart_item) {
  save_cart_item($customer_id, $plant_id);
} else {
  update_cart_item($customer_id, $plant_id, $cart_item['cart_item_qty'] + 1);
}

if (isset($_POST['buy_now'])) {
  header('Location: ./cart.php');
  exit();
}

$previous_page = $_SERVER['HTTP_REFERER'];
header("Location: $previous_page");
exit();
