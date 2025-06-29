<?php

session_start();

include("../Admin-Panel/config/db.php");
if (isset($_POST['productid'])) {
  $product_id = $_POST['productid'];

  $sql = "SELECT products.id as id , products.name , products.price , product_images.image_url as image_url  FROM products
INNER JOIN   product_images on products.id = product_images.product_id where products.id = $product_id";
  $result = $conn->query($sql);
  if ($row = $result->fetch_assoc()) {
    $product_id = $row['id'];
    $product_name = $row['name'];
    $product_price = $row['price'];
    $product_image = $row['image_url'];

    $product = [
      'id' =>  $product_id,
      'name' => $product_name,
      'price' => $product_price,
      'image'=> $product_image,
      'quantity' => 1
    ];

 

     if (!isset($_SESSION['cart'])) {
      $_SESSION['cart'] = [];
     };

    $found = false;
    foreach ($_SESSION['cart'] as &$item) {
      if ($item['id'] == $product['id']) {
        $item['quantity'] += 1;
        $found = true;
        break;
      }
    }
    unset($item);

    if (!$found) {
      $_SESSION['cart'][] = $product;
    }
    echo "success";


  } else {
    echo "Product not found!";
  }
}
