<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" />
</head>

<body>
  <?php
  $validity_email = $_GET['email'] ?? '';
  $validity_password = $_GET['password'] ?? '';
  $redirect_url = isset($_GET['redirect']) ? $_GET['redirect'] : 'index.php';
  ?>


  <div class="d-flex justify-content-center align-items-center vh-100">
    <div class="card shadow p-4 rounded-4 w-100" style="max-width: 400px;">
      <h2 class="text-center mb-4">Login here!</h2>
      <form action="../Server/Process/login-process.php" method="post">

        <!-- Email Input -->
        <div class="mb-3">
          <label class="form-label">Email</label>
          <input type="email" class="form-control" name="login_email" placeholder="Enter Your Email" required>
          <!-- PHP Error Example -->

          <div class="error text-danger mt-1">
            <?= ($validity_email === "invalid") ? "Invalid Email" : "" ?>
          </div>

        </div>

        <!-- Password Input -->
        <div class="mb-3">
          <label class="form-label">Password</label>
          <input type="password" class="form-control" name="login_password" placeholder="Enter Your Password" required>


          <div class="error text-danger mt-1">
            <?= ($validity_password === "invalid") ? "Invalid Password" : "" ?>
          </div>

        </div>
        <input type="hidden" name="redirect" value="<?php echo htmlspecialchars($redirect_url); ?>">


        <!-- Submit Button -->
        <button type="submit" class="btn btn-primary w-100 fw-medium">Login</button>

        <!-- Account Links -->
        <div class="text-center mt-3">
          <p class="mb-1">
            Don't have an account? <a href="./register.php">Sign up</a>
          </p>
          <p>
            <a href="#">Forgot your password?</a>
          </p>
        </div>

      </form>
    </div>
  </div>


  <!-- Bootstrap JS CDN -->

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>