<?php

session_start();

if (!isset($_SESSION['staff_id'])) {
  header("Location: ./login.php");
  exit();
}

if (!isset($_GET['supplier_id'])) {
  header("Location: ./suppliers.php");
  exit();
}

require_once('../data/supplier.php');

$supplier = find_supplier($_GET['supplier_id']);

if (!$supplier) {
  header("Location: ./suppliers.php");
  exit();
}

delete_supplier($_GET['supplier_id']);

header('Location: ./suppliers.php');
exit();
