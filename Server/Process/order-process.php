<?php
session_start();
include("../Admin-Panel/config/db.php");

$user_id = $_SESSION['user_id'];
$cart_items = $_SESSION['cart'];
$subtotal = $_SESSION['cart_subtotal'];


$sql = "SELECT id FROM addresses WHERE user_id = $user_id LIMIT 1";
$result = $conn->query($sql);

if ($row = $result->fetch_assoc()) {
    $address_id = $row['id'];

    // Insert order
    $sql_order = "INSERT INTO orders (user_id, address_id, total, status)
                  VALUES ($user_id, $address_id, $subtotal, 'pending')";
    if ($conn->query($sql_order)) {
        $order_id = $conn->insert_id;

        // Insert order items
        foreach ($cart_items as $item) {
            $product_id = $item['id'];
            $quantity = $item['quantity'];
            $price = $item['price'];

            $sql_item = "INSERT INTO order_items (order_id, product_id, quantity, price) 
                         VALUES ($order_id, $product_id, $quantity, $price)";
            $conn->query($sql_item);
        }

        // Clear cart
        unset($_SESSION['cart']);

        // Redirect
        header("Location: http://localhost/ECOMERSE%20WEBSITE/Client/Profile.php?order_id=$order_id");
        exit;
    } else {
        echo "Order insertion failed: " . $conn->error;
    }
} else {
    echo "No address found for this user.";
}
?>
