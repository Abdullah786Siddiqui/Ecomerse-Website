<?php
include("../Admin-Panel/config/db.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $user_Id = $_POST['user_id'];
  $billing_name = $_POST['checkout_name'];
  $billing_phone = $_POST['checkout_phone'];
  $billing_address = $_POST['checkout_address'];
  $billing_country = $_POST['checkout_country'];
  $billing_city = $_POST['checkout_city'];

  $check_address = isset($_POST['check_address']) ? $_POST['check_address'] : '';

  $shipping_name = $_POST['checkout_shipping_name'] ?? "";
  $shipping_address = $_POST['checkout_shipping_address'] ?? "";
  $shipping_phone = $_POST['checkout_shipping_phone'] ?? "";
  $shipping_city = $_POST['checkout_shipping_city'] ?? "";
  $shipping_country = $_POST['checkout_shipping_country'] ?? "";

  // Billing address insert
  $sql = "INSERT INTO addresses (user_id, full_name, phone, address_line1, city, country, type) 
          VALUES ('$user_Id', '$billing_name', '$billing_phone', '$billing_address', '$billing_city', '$billing_country', 'billing')";
  $sql2 = "INSERT INTO users (phone) values ('$billing_phone')";
  $conn->query($sql2);
  $result = $conn->query($sql);

  // Shipping address insert (if checkbox not checked)
  if (empty($check_address)) {
    $sql = "INSERT INTO addresses (user_id, full_name, phone, address_line1, city, country, type) 
            VALUES ('$user_Id', '$shipping_name', '$shipping_phone', '$shipping_address', '$shipping_city', '$shipping_country', 'shipping')";
    $result = $conn->query($sql);
  }
  echo "success";
}
