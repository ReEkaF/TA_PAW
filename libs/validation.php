<?php

require_once(__DIR__ . '/../config/staff.php');
require_once(__DIR__ . '/../data/customer.php');
require_once(__DIR__ . '/../data/staff.php');

function is_filled($value)
{
  $value = trim($value);
  return !empty($value);
}

function validate_token(&$errors, $field_list, $field_name)
{
  if (!is_filled($field_list[$field_name])) {
    $errors[$field_name] = 'Kolom wajib diisi!';
    return false;
  }

  if ($field_list[$field_name] == STAFF_ADMINISTRATOR_TOKEN) {
    return 1;
  }

  if ($field_list[$field_name] == STAFF_MANAGER_TOKEN) {
    return 2;
  }

  $errors[$field_name] = 'Token tidak valid!';
  return false;
}

function validate_name(&$errors, $field_list, $field_name)
{
  if (!is_filled($field_list[$field_name])) {
    $errors[$field_name] = 'Kolom wajib diisi!';
    return false;
  }

  $pattern = "/^[a-zA-Z-' ]{1,}+$/"; // huruf dan min 1 char
  if (!preg_match($pattern, $field_list[$field_name])) {
    $errors[$field_name] = 'Masukan harus berupa huruf saja!';
    return false;
  }

  return true;
}

function validate_phone(&$errors, $field_list, $field_name)
{
  if (!is_filled($field_list[$field_name])) {
    $errors[$field_name] = 'Kolom wajib diisi!';
    return false;
  }

  $pattern =  "/^[\d]{10,13}$/"; // angka
  if (!preg_match($pattern, $field_list[$field_name])) {
    $errors[$field_name] = 'Masukan harus berupa angka dengan 10-13 karakter!';
    return false;
  }

  return true;
}

function validate_alphanum(&$errors, $field_list, $field_name)
{
  if (!is_filled($field_list[$field_name])) {
    $errors[$field_name] = 'Kolom wajib diisi!';
    return false;
  }

  $pattern = "/^[a-zA-Z]+[0-9]+$/"; // alphanum
  if (!preg_match($pattern, $field_list[$field_name])) {
    $errors[$field_name] = "Masukan harus berupa huruf dan angka!";
    return false;
  }

  return true;
}

function validate_email(&$errors, $field_list, $field_name)
{
  if (!is_filled($field_list[$field_name])) {
    $errors[$field_name] = 'Kolom wajib diisi!';
    return false;
  }

  if (preg_match('/\s/', $field_list[$field_name])) {
    $errors[$field_name] = 'Masukan tidak boleh mengandung spasi!';
    return false;
  }

  $pattern = '/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/';
  if (!preg_match($pattern, $field_list[$field_name])) {
    $errors[$field_name] = 'Format email salah!';
    return false;
  }

  return true;
}

function validate_email_customer(&$errors, $field_list, $field_name)
{
  if (!is_filled($field_list[$field_name])) {
    $errors[$field_name] = 'Kolom wajib diisi!';
    return false;
  }

  $customers = get_customers();
  if (isset($_SESSION['customer_id'])){
    $emailcust = get_email_customer($_SESSION['customer_id']);

    if ($field_list[$field_name] != $emailcust['customer_email']){
      foreach ($customers as $customer) {
      
        if ($customer['customer_email'] == $field_list[$field_name]) {
          $errors[$field_name] = 'Email telah terdaftar, gunakan email lain!';
          return false;
        }
      }
    }
  }else {
    foreach ($customers as $customer) {
      
      if ($customer['customer_email'] == $field_list[$field_name]) {
        $errors[$field_name] = 'Email telah terdaftar, gunakan email lain!';
        return false;
      }
    }
  }
  

  if (preg_match('/\s/', $field_list[$field_name])) {
    $errors[$field_name] = 'Masukan tidak boleh mengandung spasi!';
    return false;
  }

  $pattern = '/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/';
  if (!preg_match($pattern, $field_list[$field_name])) {
    $errors[$field_name] = 'Format email salah!';
    return false;
  }

  return true;
}


function validate_email_staff(&$errors, $field_list, $field_name)
{
  if (!is_filled($field_list[$field_name])) {
    $errors[$field_name] = 'Kolom wajib diisi!';
    return false;
  }

  $staffs = get_staffs();
  foreach ($staffs as $staff) {
    if ($staff['staff_email'] == $field_list[$field_name]) {
      $errors[$field_name] = 'Email telah terdaftar, gunakan email lain!';
      return false;
    }
  }

  if (preg_match('/\s/', $field_list[$field_name])) {
    $errors[$field_name] = 'Masukan tidak boleh mengandung spasi!';
    return false;
  }

  $pattern = '/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/';
  if (!preg_match($pattern, $field_list[$field_name])) {
    $errors[$field_name] = 'Format email salah!';
    return false;
  }

  return true;
}

function validate_password(&$errors, $field_list, $field_name)
{
  if (!is_filled($field_list[$field_name])) {
    $errors[$field_name] = 'Kolom wajib diisi!';
    return false;
  }

  if (strlen($field_list[$field_name]) < 8 || strlen($field_list[$field_name]) > 16) {
    $errors[$field_name] = 'Panjang password 8 hingga 16 karakter!';
    return false;
  }

  if (!preg_match('/[A-Z]/', $field_list[$field_name])) {
    $errors[$field_name] = 'Harus terdapat minimal 1 huruf besar!';
    return false;
  }

  if (!preg_match('/[a-z]/', $field_list[$field_name])) {
    $errors[$field_name] = 'Harus terdapat minimal 1 huruf kecil!';
    return false;
  }

  if (!preg_match('/\W/', $field_list[$field_name])) {
    $errors[$field_name] = 'Harus terdapat minimal 1 karakter spesial!';
    return false;
  }

  if (preg_match('/\s/', $field_list[$field_name])) {
    $errors[$field_name] = 'Masukan tidak boleh mengandung spasi!';
    return false;
  }

  return true;
}

function validate_num(&$errors, $field_list, $field_name)
{
  if (!is_filled($field_list[$field_name])) {
    $errors[$field_name] = 'Kolom wajib diisi!';
    return false;
  }

  $pattern =  "/^[\d]{1,}$/"; // angka
  if (!preg_match($pattern, $field_list[$field_name])) {
    $errors[$field_name] = 'Masukan harus berupa angka!';
    return false;
  }

  return true;
}

function validate_address(&$errors, $field_list, $field_name)
{
  if (!is_filled($field_list[$field_name])) {
    $errors[$field_name] = 'Kolom wajib diisi!';
    return false;
  }

  return true;
}
