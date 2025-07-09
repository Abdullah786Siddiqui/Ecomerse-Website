<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['user_id'])) {
    header("Location: ./index.php"); 
    exit();
}
include_once 'Components/header.html';
include_once './includes/Navbar.php';

$final_subtotal = $_SESSION['final_subtotal'] ?? 0;
//  if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
?>

<style>
  body {
    background-color: #f8f9fa;
  }
  .cursor-pointer{
    cursor: pointer;
  }

  .payment-method-card:hover {
    border-color: #0d6efd;
    box-shadow: 0 0 10px rgba(13, 110, 253, 0.2);
  }
</style>

<div class="cont m-5">
  <div class="row g-4">

    <!-- Left: Payment Methods -->
    <div class="col-12 col-lg-8">

      <div class="card p-4 shadow-sm rounded-4">
        <h4 class="mb-4">Choose Payment Method</h4>

        <!-- Payment Options -->
        <div class="mb-4">
          <div class="row g-4">

            <div class="col-6 col-sm-4 col-lg-3 cursor-pointer">
              <div class="border rounded-3 text-center p-3 payment-method-card h-100 card-option">
                <i class="fas fa-credit-card fa-2x text-primary mb-2"></i>
                <p class="mb-0">Credit/Debit Card</p>
              </div>
            </div>

            <div class="col-6 col-sm-4 col-lg-3 cursor-pointer">
              <div class="border rounded-3 text-center p-3 payment-method-card h-100 netbanking-option">
                <i class="fas fa-university fa-2x text-success mb-2"></i>
                <p class="mb-0">Net Banking</p>
              </div>
            </div>

            <div class="col-6 col-sm-4 col-lg-3 cursor-pointer">
              <div class="border rounded-3 text-center p-3 payment-method-card h-100 wallet-option">
                <i class="fas fa-wallet fa-2x text-warning mb-2"></i>
                <p class="mb-0">Wallet / UPI</p>
              </div>
            </div>

     <div class="col-6 col-sm-4 col-lg-3 cursor-pointer">
  <div class="border rounded-3 text-center p-3 payment-method-card h-100 cod-option">
    <i class="fas fa-shipping-fast fa-2x text-success mb-2"></i>
    <p class="mb-0">Cash on Delivery</p>
  </div>
</div>



          </div>
        </div>

        <!-- Card Payment Form -->
        <div class="mb-4 d-none card-form d-none">
          <h5 style="color: #0D6EFD;" class="mb-3 fw-bold ">Card Details</h5>
          <form id='payment_card'>
            <div class="mb-3">
              <label for="cardNumber" class="form-label">Card Number</label>
              <input type="text" class="form-control shadow-sm rounded-3" id="cardNumber" placeholder="1234 5678 9012 3456">
              <div class="error-message text-danger"></div>
            </div>

            <div class="mb-3">
              <label for="cardExpiry" class="form-label">Expiry Date</label>
              <input type="text" class="form-control shadow-sm rounded-3" id="cardExpiry" placeholder="MM / YY">
              <div class="error-message text-danger"></div>
            </div>

            <div class="mb-3">
              <label for="cardCVC" class="form-label">CVV</label>
              <input type="text" class="form-control shadow-sm rounded-3" id="cardCVC" placeholder="123">
              <div class="error-message text-danger"></div>
            </div>

            <div class="mb-3">
              <label for="cardName" class="form-label">Name on Card</label>
              <input type="text" class="form-control shadow-sm rounded-3" id="cardName" placeholder="Full Name">
              <div class="error-message text-danger"></div>
            </div>

            <button type="submit" style="background-color: #0D6EFD;" class="btn  w-100 fw-bold py-2 shadow-sm">
              <i class="fas fa-lock me-2"></i> Pay Securely
            </button>
          </form>
        </div>

        <!-- Wallet UPI -->
        <div class="mb-4 d-none wallet-form d-none">
          <h5 class="mb-3 fw-bold text-warning">Wallet / UPI / Easypaisa Payment</h5>
          <form id='payment_wallet'>
            <div class="mb-3">
              <label for="upiId" class="form-label">Enter UPI ID or Easypaisa Number</label>
              <input type="text" class="form-control shadow-sm rounded-3" id="upiId" placeholder="e.g. 03xxxxxxxxx or your UPI ID">
              <div class="error-message text-danger"></div>
            </div>

            <div class="mb-3">
              <label for="walletProvider" class="form-label">Select Wallet Provider</label>
              <select class="form-select shadow-sm rounded-3" id="walletProvider">
                <option selected disabled>Choose Provider...</option>
                <option>JazzCash</option>
                <option>Easypaisa</option>
                <option>Google Pay / UPI</option>
              </select>
              <div class="error-message text-danger"></div>
            </div>

           

            <button type="submit" class="btn btn-warning w-100 fw-bold py-2 shadow-sm">
              <i class="fas fa-wallet me-2"></i> Proceed to Pay
            </button>
          </form>

        </div>

        <!-- Net Banking -->
        <div class="mb-4 d-none netbanking-form d-none">
          <h5 class="mb-3 fw-bold text-success">Net Banking Payment</h5>
          <form id='payment_netbanking'>
            <div class="mb-3">
              <label for="bankName" class="form-label">Select Your Bank</label>
              <select class="form-select shadow-sm rounded-3" id="bankName">
                <option selected disabled>Choose Bank...</option>
                <option>HBL</option>
                <option>UBL</option>
                <option>MCB</option>
                <option>Bank Alfalah</option>
                <option>Standard Chartered</option>
              </select>
              <div class="error-message text-danger"></div>
            </div>

            <div class="mb-3">
              <label for="accountNumber" class="form-label">Account Number</label>
              <input type="text" class="form-control shadow-sm rounded-3" id="accountNumber" placeholder="Enter your bank account number">
              <div class="error-message text-danger"></div>
            </div>

          

            <button type="submit" class="btn btn-success w-100 fw-bold py-2 shadow-sm">
              <i class="fas fa-university me-2"></i> Proceed with Net Banking
            </button>
          </form>

        </div>

     <!-- Cash on Delivery -->
<div class="mb-4 d-none cod-form">
  <h5 class="mb-3 fw-bold text-success">Cash on Delivery</h5>
  <form id="payment_cod">

    <button type="submit" class="btn btn-success w-100 fw-bold py-2 shadow-sm">
      <i class="fas fa-truck me-2"></i> Confirm Order
    </button>
  </form>
</div>


      </div>
    </div>

    <!-- Right: Order Summary -->
    <div class="col-12 col-lg-4">
      <div class="summary-section">
        <div class="card shadow-sm rounded-4 p-3 mb-3">
          <h4 class="mb-3">Order Summary</h4>

          <div class="d-flex justify-content-between mb-2">
            <span class="text-muted">Subtotal</span>
            <span class="fw-bold cart-subtotal ">£<?= $final_subtotal?></span>
          </div>

          <div class="d-flex justify-content-between mb-2">
            <span class="text-muted">Delivery</span>
            <span class="fw-bold text-success">Free</span>
          </div>

          <hr>

          <div class="d-flex justify-content-between mb-3">
            <span class="fw-bold">Total (VAT included)</span>
            <span class="fw-bold text-dark cart-subtotal">£<?= $final_subtotal ?></span>
          </div>

        </div>
      </div>
    </div>

  </div>
</div>
<?php


?>
<script src="./Assets/JS/payment.js"></script>
<?php include 'Components/footer.html'; ?>
