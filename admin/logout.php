<?php

session_start();

unset($_SESSION['role_name']);
unset($_SESSION['staff_id']);
unset($_SESSION['staff_name']);

header('Location: ./login.php');
exit();
