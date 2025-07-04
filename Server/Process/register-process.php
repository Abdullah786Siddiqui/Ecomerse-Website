<?php
include("../Admin-Panel/config/db.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $name = $_POST['register_username'];
  $email = $_POST['register_email'];
  $password = $_POST['register_password'];
  $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

  $sql = "INSERT INTO users (name,email,password) value ('$name','$email','$hashedPassword')";
  $result = $conn->query($sql);
  if ($result) {
    header("Location: ../../Client/login.php");
  }
} else {
  echo "Invalid request method.";
}
