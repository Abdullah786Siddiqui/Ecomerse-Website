

<?php
include("../Admin-Panel/config/db.php");
if ($_SERVER['REQUEST_METHOD'] == "POST") {
  $email = $_POST['login_email'];
  $password = $_POST['login_password'];
  $sql = "SELECT * FROM users where email = '$email' ";
  $result = $conn->query($sql);
  if ($row = $result->fetch_assoc()) {
    $hashed_Password = $row['password'];

    if (password_verify($password, $hashed_Password)) {
      // $_SESSION['email'] = $row['email'];
      // $_SESSION['role'] = $row['role'];

      if ($row['role'] === "admin") {
        // $_SESSION['admin_Username'] = $row['name'];

        header("Location: ../Admin-Panel/Dashbboard.php");
        exit();
      }
      if ($row['role'] === "user") {
        // $_SESSION['username'] = $row['name'];

        header("Location: ../../Client/index.php");
        exit();
      }
    } else {
      header("Location: ../../Client/index.php?password=invalid");
      exit();
    }
  } else {
    header("Location: ../../Client/index.php?email=invalid");
    exit;
  }
} else {
  echo "Invalid request method.";
}
