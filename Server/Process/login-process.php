

<?php
session_start();
include("../Admin-Panel/config/db.php");
if ($_SERVER['REQUEST_METHOD'] == "POST") {
  $email = $_POST['login_email'];
  $password = $_POST['login_password'];
  $sql = "SELECT * FROM users where email = '$email' ";
  $result = $conn->query($sql);
  if ($row = $result->fetch_assoc()) {
    $hashed_Password = $row['password'];

    if (password_verify($password, $hashed_Password)) {


      if ($row['role'] === "admin") {
        $_SESSION['admin_id'] = $row['id'];

        header("Location: ../Admin-Panel/Dashbboard.php");
        exit();
      }
      if ($row['role'] === "user") {
        $_SESSION['user_id'] = $row['id'];
        $redirect_url = isset($_POST['redirect']) ? $_POST['redirect'] : 'index.php';
        if (strpos($redirect_url, '/') === 0) {
          header("Location: $redirect_url");
          exit();
        } else {
          header("Location: ../../Client/index.php");
          exit();
        }
      }
    } else {
      header("Location: ../../Client/login.php?password=invalid");
      exit();
    }
  } else {
    header("Location: ../../Client/login.php?email=invalid");
    exit;
  }
} else {
  echo "Invalid request method.";
}
