<?php

session_start();

if (!isset($_SESSION['staff_id'])) {
  header("Location: ./login.php");
  exit();
}

if ($_SESSION['role_name'] != 'administrator') {
  header("Location: ./index.php");
  exit();
}

if (!isset($_GET['category_id'])) {
  header("Location: ./categories.php");
  exit();
}

require_once('../data/category.php');

$category = find_category($_GET['category_id']);

if (!$category) {
  header("Location: ./categories.php");
  exit();
}

delete_category($_GET['category_id']);

header('Location: ./categories.php');
exit();
