<?php
session_start();
include("../Admin-Panel/config/db.php");


$email = $_SESSION['signup_email'] ?? '';
$inputOtp = $_POST['otp'] ?? '';

if (empty($email) || empty($inputOtp)) {
  echo json_encode(['success' => false, 'message' => 'Invalid request']);
  exit;
}

$sql = "SELECT id FROM otp_verification WHERE email = '$email' AND otp = '$inputOtp' ORDER BY created_at DESC LIMIT 1";

$result = $conn->query($sql);

if ($row = $result->fetch_assoc()) {

  echo json_encode(['success' => true, 'message' => 'OTP verified']);
} else {
  echo json_encode(['success' => false, 'message' => 'Invalid OTP']);
}
