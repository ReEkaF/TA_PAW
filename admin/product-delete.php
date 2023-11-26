<?php

session_start();

if (!isset($_SESSION['staff_id'])) {
  header("Location: ./login.php");
  exit();
}

if (!isset($_GET['plant_id'])) {
  header("Location: ./products.php");
  exit();
}

require_once('../data/plant.php');
require_once('../libs/file.php');

$plant = find_plant($_GET['plant_id']);

if (!$plant) {
  header("Location: ./products.php");
  exit();
}

delete_plant($_GET['plant_id']);
delete_file($plant['plant_photo'], 'plants');

header('Location: ./products.php');
exit();
