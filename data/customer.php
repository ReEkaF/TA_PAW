<?php

error_reporting(E_ALL);

require_once(__DIR__ . '/../config/database.php');

function find_customer($email)
{
  try {
    $db = new PDO('mysql:host=localhost;dbname=' . DB_NAME, DB_USERNAME, DB_PASSWORD, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
    $statement = $db->prepare("SELECT * FROM customers WHERE customer_email = :email");
    $statement->bindValue(":email", htmlspecialchars(trim($email)));
    $statement->execute();

    $customer = $statement->fetch(PDO::FETCH_ASSOC);

    return $customer;
  } catch (PDOException $error) {
    throw new Exception($error->getMessage());
  }
}

function find_customer_with_id($id)
{
  try {
    $db = new PDO('mysql:host=localhost;dbname=' . DB_NAME, DB_USERNAME, DB_PASSWORD, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
    $statement = $db->prepare("SELECT * FROM customers WHERE customer_id = :id");
    $statement->bindValue(":id", htmlspecialchars(trim($id)));
    $statement->execute();

    $customer = $statement->fetch(PDO::FETCH_ASSOC);

    return $customer;
  } catch (PDOException $error) {
    throw new Exception($error->getMessage());
  }
}

function get_customers()
{
  try {
    $db = new PDO('mysql:host=localhost;dbname=' . DB_NAME, DB_USERNAME, DB_PASSWORD, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
    $statement = $db->prepare("SELECT * FROM customers ORDER BY customer_id DESC");
    $statement->execute();

    $customers = $statement->fetchAll(PDO::FETCH_ASSOC);

    return $customers;
  } catch (PDOException $error) {
    throw new Exception($error->getMessage());
  }
}

function get_email_customer($id)
{
  try {
    $db = new PDO('mysql:host=localhost;dbname=' . DB_NAME, DB_USERNAME, DB_PASSWORD, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
    $statement = $db->prepare("SELECT customer_email FROM customers where customer_id = {$id}");
    $statement->execute();

    $customers = $statement->fetch(PDO::FETCH_ASSOC);

    return $customers;
  } catch (PDOException $error) {
    throw new Exception($error->getMessage());
  }
}

function save_customer($customer)
{
  try {
    $db = new PDO('mysql:host=localhost;dbname=' . DB_NAME, DB_USERNAME, DB_PASSWORD, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
    $statement = $db->prepare("INSERT INTO customers (customer_name, customer_phone, customer_email, customer_password) VALUES (:name, :phone, :email, :password)");
    $statement->bindValue(":name", htmlspecialchars(trim($customer['name'])));
    $statement->bindValue(":phone", htmlspecialchars(trim($customer['phone'])));
    $statement->bindValue(":email", htmlspecialchars(trim($customer['email'])));
    $statement->bindValue(":password", password_hash(trim($customer['password']), PASSWORD_DEFAULT));
    $statement->execute();
  } catch (PDOException $error) {
    throw new Exception($error->getMessage());
  }
}
