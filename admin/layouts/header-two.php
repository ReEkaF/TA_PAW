<?php

require_once('../config/setup.php');
require_once('../data/database.php');

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <title><?= isset($title) ? $title . ' - ' : ''; ?>FloraFavs</title>

  <!-- css templates -->
  <link rel="stylesheet" href="../assets/css/style.css" />
  <link rel="stylesheet" href="../assets/css/customer.css" />

  <!-- css customs -->

  <link rel="shortcut icon" href="../favicon.ico" type="image/x-icon" />
</head>

<body>
  <!-- navbar -->
  <div class="navbar">
    <div class="navbar__container container">
      <a href="../index.php" class="navbar__brand">
        <img src="../assets/img/logo.png" alt="FloraFavs" />
      </a>
      <nav class="navbar__nav">
        <a href="../index.php" class="navbar__link">Products</a>
        <a href="../transactions.php" class="navbar__link">Transactions</a>
        <a href="../cart.php" class="navbar__link">Cart(<span>0</span>)</a>
      </nav>
      <div class="navbar__right">
        <a href="../login.php" class="navbar__cta">Login</a>
        <a href="../register.php" class="navbar__cta">Register</a>
        <div class="navbar__profile">
          <a href="javascript:void(0)" class="navbar__profile-toggler">
            <img src="../assets/img/profiles/profile-2.png" alt="" class="navbar__profile-img" />
          </a>
          <div class="navbar__profile-menu-list">
            <a href="../profile.php" class="navbar__profile-menu-link">
              <i class="ph ph-user"></i>
              View profile</a>
            <a href="../change-password.php" class="navbar__profile-menu-link">
              <i class="ph ph-lock-simple"></i>
              Change password</a>
            <hr class="navbar__profile-menu-divider" />
            <a href="../login.php" class="navbar__profile-menu-link">
              <i class="ph ph-arrow-right"></i>

              Logout</a>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- end navbar -->