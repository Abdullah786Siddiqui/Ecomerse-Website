<?php 
include("../Admin-Panel/config/db.php");
session_start();
$response = [];

if (isset($_SESSION['cart']) && count($_SESSION['cart']) > 0) {
    $response['success'] = true;
} else {
    $response['success'] = false;
    $response['message'] = "Your cart is empty! Please add items before proceeding to payment.";
}

echo json_encode($response);?>