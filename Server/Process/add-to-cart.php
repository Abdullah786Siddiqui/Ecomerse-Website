<?php
session_start();
include("../Admin-Panel/config/db.php");

if (isset($_POST['productid'])) {
  $product_id = $_POST['productid'];
  $isBuyNow = isset($_POST['buynow']) ? true : false;  

  $response = [];

  $sql = "SELECT products.id as id, products.name, products.price, product_images.image_url as image_url  
            FROM products
            INNER JOIN product_images ON products.id = product_images.product_id 
            WHERE products.id = $product_id";
  $result = $conn->query($sql);

  if ($row = $result->fetch_assoc()) {
    $product = [
      'id' =>  $row['id'],
      'name' => $row['name'],
      'price' => $row['price'],
      'image' => $row['image_url'],
      'quantity' => 1,
    ];

    if (!isset($_SESSION['cart'])) {
      $_SESSION['cart'] = [];
    }

    $found = false;
    foreach ($_SESSION['cart'] as &$item) {
      if ($item['id'] == $product['id']) {
        $found = true;

        if ($isBuyNow) {
          if ($item['quantity'] == 0) {
            $item['quantity'] = 1;
          }
        } else {
          $item['quantity'] += 1;
        }
        $response["quantity"] = $item['quantity'];
        break;
      }
    }
    unset($item);

    if (!$found) {
      $_SESSION['cart'][] = $product;
      $response["quantity"] = 1;
    }

    $response["success"] = true;
  } else {
    $response["success"] = false;
    $response["message"] = "Product not found!";
  }

  header('Content-Type: application/json');
  echo json_encode($response);
}
