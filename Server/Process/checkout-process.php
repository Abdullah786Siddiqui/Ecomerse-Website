<?php
session_start();
$product_id = $_POST['productid'];

if (!isset($_SESSION['user_id'])) {
  $current_page = $_SERVER['REQUEST_URI'];
  header("Location: ../../Client/login.php?redirect=$current_page");
  exit();
} else {
  header("Location: ../../Client/checkout.php?productid=$product_id");
  exit();
}
