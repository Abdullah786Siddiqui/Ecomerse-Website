<?php
$validity_email = $_GET['email'] ?? '';
$validity_password = $_GET['password'] ?? '';
?>
<div class="modal fade custom-fade" id="authModal" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" aria-labelledby="authModalTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content border-0 shadow-sm rounded-4 overflow-hidden">
      <div class="modal-header bg-white border-bottom py-3 px-4">
        <h5 class="modal-title fw-semibold text-secondary" id="authModalTitle">Login</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body bg-light px-4 py-4">

        <!-- Login Form -->
        <form id="loginForm" method="post" action="../Server/Process/login-process.php" class="auth-form">
          <div class="mb-3">
            <label class="form-label text-muted small">Email</label>
            <input type="email" name="login_email" class="form-control" placeholder="you@example.com" required>
          </div>
          <div class="error text-danger mt-1">
            <?= ($validity_email === "invalid") ? "Invalid Email" : "" ?>
          </div>
          <div class="mb-3">
            <label class="form-label text-muted small">Password</label>
            <input type="password" name="login_password" class="form-control" placeholder="Enter your password" required>
          </div>
          <div class="error text-danger mt-1">
            <?= ($validity_password === "invalid") ? "Invalid Password" : "" ?>
          </div>
          <button type="submit" class="btn btn-dark w-100 fw-semibold py-2">Login</button>
          <p class="text-center mt-3 small text-muted">
            Don't have an account?
            <a href="#" onclick="showSignup()" class="text-decoration-none">Signup</a>
          </p>
        </form>

        <!-- Signup Form -->
        <!-- Signup form -->
        <form id="signupForm" method="post" class="auth-form d-none">

          <div id="signup-section">
            <div class="mb-3">
              <label class="form-label text-muted small">Name</label>
              <input type="text" name="register_username" class="form-control" placeholder="Your full name" required>
            </div>
            <div class="mb-3">
              <label class="form-label text-muted small">Email</label>
              <input type="email" name="register_email" class="form-control" placeholder="you@example.com" required>
            </div>
            <div class="mb-3">
              <label class="form-label text-muted small">Password</label>
              <input type="password" name="register_password" class="form-control" placeholder="Enter password" required>
            </div>

            <button type="submit" class="btn btn-dark w-100 fw-semibold py-2">Signup</button>
            <p class="text-center mt-3 small text-muted">
              Already have an account?
              <a href="#" onclick="showLogin()" class="text-decoration-none">Login</a>
            </p>
          </div>


        </form>

        <!-- OTP verification section -->
       <div id="otp-section" class="auth-form d-none mt-3">
  <div class="mb-3">
    <label class="form-label text-muted small">Enter OTP sent to your email</label>
    <input type="text" name="otp" class="form-control" placeholder="6-digit OTP" required>
  </div>
  <button type="button" id="verifyOtpBtn" class="btn btn-dark w-100 fw-semibold py-2">Verify OTP</button>
</div>



      </div>
    </div>
  </div>
</div>