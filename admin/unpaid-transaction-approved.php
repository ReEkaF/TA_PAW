<?php

session_start();

if (!isset($_SESSION['staff_id'])) {
  header("Location: ./login.php");
  exit();
}

if ($_SESSION['role_name'] != 'administrator') {
  header("Location: ./unpaid-transactions.php");
  exit();
}

if (!isset($_GET['order_id'])) {
  header("Location: ./unpaid-transactions.php");
  exit();
}

require_once('../data/transaction.php');

$find_order = find_order_admin($_GET['order_id']);

if (!$find_order) {
  header('Location: ./unpaid-transactions.php');
  exit();
}

approve_order($_GET['order_id']);

header('Location: ./unpaid-transactions.php');
exit();
