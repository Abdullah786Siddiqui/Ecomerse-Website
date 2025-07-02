<?php
session_start();
header('Content-Type: application/json');
include("../Admin-Panel/config/db.php");
$response = [];


$user_id = $_SESSION['user_id'];
$cart_items = $_SESSION['cart'] ?? [];
$subtotal = $_SESSION['cart_subtotal'] ?? 0;
$payment_method = $_POST['payment_method'] ?? '';
if (empty($cart_items)) {
    $response['success'] = false;
    $response['message'] = "Cart is empty.";
    echo json_encode($response);
    exit();
}

$sql = "SELECT id FROM addresses WHERE user_id = $user_id LIMIT 1";
$result = $conn->query($sql);

if ($row = $result->fetch_assoc()) {
    $address_id = $row['id'];

    // Insert order
    $sql_order = "INSERT INTO orders (user_id, address_id, total, status,payment_method)
                  VALUES ($user_id, $address_id, $subtotal, 'pending','$payment_method')";
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
        $response['success'] = true;
        $response['message'] = "Order placed successfully.";
    } else {
        $response['success'] = false;
        $response['message'] = "Order insertion failed: " . $conn->error;
    }
} else {
    $response['success'] = false;
    $response['message'] = "No address found for this user.";
}
echo json_encode($response);
