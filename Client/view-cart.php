<?php

include './Components/header.html';

include './includes/Navbar.php';

$subtotal = 0;

?>
<style>
  .hover-text-danger:hover {
  color: #dc3545 !important; /* Bootstrap 5 Danger color */
}

</style>
<div class="container">
  <div class="bag-section">
    <h2>Your bag (<?= count($_SESSION['cart']) ?> items)</h2>
    <?php
    if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {

      foreach (array_reverse($_SESSION['cart'])  as  $items) {
        $totalprice = $items['price'] * $items['quantity'];
        $subtotal += $totalprice; 
    ?>
        <div class="bag-item">
          <div style="display: flex; gap: 10px">
            <img src="../Server/uploads/<?= $items['image'] ?>">
            <div class="item-details">
              <h3><?= $items['name'] ?></h3>

              <p style="color: #444444;">Colour: blue</p>
              <p style="color: #444444;">Size: 40R</p>

              <div class="item-actions ">
                <button class=" hover-text-danger"><i class="far fa-trash-alt "></i> Remove</button>
                <p
                  style="
                    border: 1px solid #929090;
                    width: 1px;
                    height: 15px;
                    margin: 0;
                    /* margin-top: 7px; */
                  "></p>
                <button class="hover-text-danger"><i class="far fa-heart"></i> Move to wish list</button>
              </div>
            </div>
          </div>

        <div class="item-footer mt-3 d-flex justify-content-between align-items-center flex-wrap gap-2">
  
  <!-- Quantity Dropdown -->
  <div class="quantity">
    <select class="form-select form-select-sm" style="width: 70px;">
      <option selected><?= $items['quantity'] ?></option>
      <option>2</option>
      <option>3</option>
      <option>4</option>
      <option>5</option>
      <option>6</option>
      <option>7</option>
      <option>8</option>
      <option>9</option>
      <option>10</option>
    </select>
  </div>

  <!-- Price Info -->
  <div class="text-end">
    <small class="text-muted text-decoration-line-through">£264.99</small><br>
    <span class="fw-bold text-dark">£<?= $totalprice ?></span><br>
    <small class="text-success">You save 40%</small>
  </div>

</div>

        </div>
    <?php
      }
    } 
      
    ?>




    <p class="note"><i class="fa-solid fa-circle-info"></i> Items placed in this bag are not reserved.</p>
  </div>

  <div class="summary-section my-4">
    <h2>Total</h2>
  <div class="card shadow-sm rounded-3 p-3">
    
    <h4 class="mb-3">Order Summary</h4>

    <div class="d-flex justify-content-between mb-2">
      <span class="text-muted">Subtotal</span>
      <span class="fw-bold">£<?= number_format($subtotal, 2) ?></span>
    </div>

    <div class="d-flex justify-content-between mb-2">
      <span class="text-muted">Delivery</span>
      <span class="fw-bold text-success">Free</span>
    </div>

    <hr>

    <div class="d-flex justify-content-between mb-3">
      <span class="fw-bold">Total (VAT included)</span>
      <span class="fw-bold text-dark">£<?= number_format($subtotal, 2) ?></span>
    </div>

    <button class="btn btn-primary w-100 fw-bold py-2">Go to Checkout</button>
  </div>

  <!-- Voucher Section -->
  <div class="card mt-3 p-3">
    <div class="d-flex justify-content-between align-items-center">
      <label for="voucher" class="mb-0">Add a voucher <span class="text-muted">(Optional)</span></label>
      <i class="fa-solid fa-chevron-down"></i>
    </div>
    <!-- Optional: Expandable voucher input -->
    
    <div class="mt-2">
      <input type="text" class="form-control form-control-sm" placeholder="Enter voucher code">
      <button class="btn btn-outline-secondary btn-sm mt-2">Apply</button>
    </div>
   
  </div>
</div>

</div>


<?php include './Components/footer.html';  ?>