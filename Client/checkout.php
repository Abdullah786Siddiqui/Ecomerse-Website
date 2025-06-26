<?php
 include './Components/header.html'; 

include './includes/Navbar.php';



if (!isset($_SESSION['user_id'])) {
 echo "<script>window.location.href = './login.php'</script>";
}

?>

<div class="container mt-4">
  <div class="row justify-content-center">

    <!-- Billing Form -->
    <div class="col-12 col-lg-8 mb-4">
      <h4 class="text-center fs-1 mb-3" style="font-family: 'Gill Sans', 'Trebuchet MS'; color:black">Billing Address</h4>
      <form class="needs-validation p-4" novalidate>
        <div class="row g-3">
          <div class="col-12">
            <label for="fullName" class="form-label text-black">Full Name</label>
            <input type="text" class="form-control" id="fullName" placeholder="Enter Your Full Name" required>
            <div class="invalid-feedback">Valid full name is required.</div>
          </div>

          <div class="col-12">
            <label for="email" class="form-label text-black">Email</label>
            <input type="email" class="form-control" id="email" placeholder="you@example.com">
            <div class="invalid-feedback">Please enter a valid email address for shipping updates.</div>
          </div>

          <div class="col-12">
            <label for="address" class="form-label text-black">Address</label>
            <input type="text" class="form-control" id="address" placeholder="1234 Main St" required>
            <div class="invalid-feedback">Please enter your shipping address.</div>
          </div>

          <div class="col-12">
            <label for="phone" class="form-label text-black">Phone</label>
            <input type="text" class="form-control" id="phone" placeholder="+92300000000" required>
            <div class="invalid-feedback">Please enter your Phone Number.</div>
          </div>

          <div class="col-md-5">
            <label for="country" class="form-label text-black">Country</label>
            <select class="form-select" id="country" required>
              <option value="">Choose...</option>
              <option>Pakistan</option>
              <option>United States</option>
              <option>India</option>
              <option>France</option>
            </select>
            <div class="invalid-feedback">Please select a valid country.</div>
          </div>

          <div class="col-md-4">
            <label for="state" class="form-label text-black">City</label>
            <select class="form-select" id="state" required>
              <option value="">Choose...</option>
              <option>Lahore</option>
              <option>Karachi</option>
              <option>Multan</option>
            </select>
            <div class="invalid-feedback">Please provide a valid city.</div>
          </div>

          <div class="col-md-3">
            <label for="zip" class="form-label text-black">Zip</label>
            <input type="text" class="form-control" id="zip" required>
            <div class="invalid-feedback">Zip code required.</div>
          </div>
        </div>

        <hr class="my-4">

        <!-- Shipping checkbox -->
        <div class="form-check">
          <input type="checkbox" class="form-check-input" id="same-address">
          <label class="form-check-label text-black fw-bold" for="same-address">Shipping address is the same as my billing address</label>
        </div>

        <!-- Optional Shipping section -->
        <div id="shipping-section" style="display: none;">
          <h5 class="mt-3 text-black">Shipping Address</h5>

          <div class="mb-3">
            <label for="shippingName" class="form-label text-black">Full Name</label>
            <input type="text" class="form-control" id="shippingName" required>
            <div class="invalid-feedback">Full name is required.</div>
          </div>

          <div class="mb-3">
            <label for="shippingAddress" class="form-label text-black">Address</label>
            <input type="text" class="form-control" id="shippingAddress" required>
            <div class="invalid-feedback">Address is required.</div>
          </div>

          <div class="mb-3">
            <label for="shippingPhone" class="form-label text-black">Phone</label>
            <input type="text" class="form-control" id="shippingPhone" required>
            <div class="invalid-feedback">Phone is required.</div>
          </div>

          <div class="mb-3">
            <label for="shippingCountry" class="form-label text-black">Country</label>
            <select class="form-select" id="shippingCountry" required>
              <option value="">Choose...</option>
              <option>Pakistan</option>
              <option>India</option>
              <option>USA</option>
            </select>
            <div class="invalid-feedback">Country is required.</div>
          </div>

          <div class="mb-3">
            <label for="shippingCity" class="form-label text-black">City</label>
            <select class="form-select" id="shippingCity" required>
              <option value="">Choose...</option>
              <option>Karachi</option>
              <option>Lahore</option>
              <option>Islamabad</option>
            </select>
            <div class="invalid-feedback">City is required.</div>
          </div>
        </div>

        <hr class="my-4 text-black">

        <h4 class="mb-3 text-black">Payment</h4>

        <div class="my-3">
          <div class="form-check">
            <input id="credit" name="paymentMethod" type="radio" class="form-check-input" checked required>
            <label class="form-check-label text-black" for="credit">Credit card</label>
          </div>
          <div class="form-check">
            <input id="debit" name="paymentMethod" type="radio" class="form-check-input" required>
            <label class="form-check-label text-black" for="debit">Debit card</label>
          </div>
          <div class="form-check">
            <input id="paypal" name="paymentMethod" type="radio" class="form-check-input" required>
            <label class="form-check-label text-black" for="paypal">Cash on delivery</label>
          </div>
        </div>

        <hr class="my-4 text-black">

        <button class="w-100 btn btn-primary btn-lg" type="submit" id="checkoutbtn">Continue to checkout</button>
      </form>
    </div>

    <!-- Cart Summary -->
    <div class="col-12 col-lg-4">
      <h4 class="d-flex justify-content-between align-items-center mb-3">
        <span class="text-center fs-1" style="font-family: 'Gill Sans', 'Trebuchet MS'; color:black">Your cart</span>
        <span class="badge bg-primary rounded-pill">3</span>
      </h4>

      <ul class="list-group mb-3">
        <li class="list-group-item d-flex justify-content-between lh-sm">
          <div>
            <h6 class="my-0">Product name</h6>
            <small class="text-muted">Brief description</small>
          </div>
          <span class="text-muted">$12</span>
        </li>
        <li class="list-group-item d-flex justify-content-between lh-sm">
          <div>
            <h6 class="my-0">Second product</h6>
            <small class="text-muted">Brief description</small>
          </div>
          <span class="text-muted">$8</span>
        </li>
        <li class="list-group-item d-flex justify-content-between lh-sm">
          <div>
            <h6 class="my-0">Third item</h6>
            <small class="text-muted">Brief description</small>
          </div>
          <span class="text-muted">$5</span>
        </li>
        <li class="list-group-item d-flex justify-content-between">
          <strong>Total (USD)</strong>
          <strong>$25</strong>
        </li>
      </ul>
    </div>

  </div>
</div>



<?php  include './Components/footer.html';  ?>