<?php
session_start();
include("../Admin-Panel/config/db.php");
$response = [];
$order_id = $_POST['order_id'];
$sql = "UPDATE orders set status = 'cancelled' where id = $order_id";
$result = $conn->query($sql);
if ($result) {
  $response['success'] = true;
  $response['message'] = "Order Cancel Sucesfully";
} else {
  $response['success'] = false;
}
echo json_encode($response);

