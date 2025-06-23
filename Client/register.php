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





  <div class="container d-flex justify-content-center align-items-center" style="min-height: 100vh;">
  <div class="card shadow p-4 rounded-4 w-100" style="max-width: 400px;">
    <h2 class="text-center mb-4">Create Your Account</h2>
    <form action="../Server/Process/register-process.php" method="POST">
      
      <!-- Username -->
      <div class="mb-3">
        <label for="username" class="form-label">Username</label>
        <input
          type="text"
          class="form-control"
          id="username"
          name="register_username"
          required
          placeholder="Enter Your Username">
      </div>

      <!-- Email -->
      <div class="mb-3">
        <label for="email" class="form-label">Email Address</label>
        <input
          type="email"
          class="form-control"
          id="email"
          name="register_email"
          required
          placeholder="Enter Your Email">
      </div>

      <!-- Password -->
      <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <input
          type="password"
          class="form-control"
          id="password"
          name="register_password"
          required
          placeholder="Enter Your Password">
      </div>

      <!-- Register Button -->
      <div class="d-grid">
        <button type="submit" class="btn btn-primary fw-medium">Register</button>
      </div>

      <!-- Link to Login -->
      <div class="text-center mt-3">
        <p>Already have an account? <a href="./login.php">Login here</a></p>
      </div>

    </form>
  </div>
</div>


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>