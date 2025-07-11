<?php
if (session_status() === PHP_SESSION_NONE) {
  session_start();
}

if (!isset($_SESSION['user_id'])) {
  header("Location: ./index.php");
  exit();
}
include './Components/header.html';

include './includes/Navbar.php';


$subtotal = 0;

?>
<style>
  .hover-text-danger:hover {
    color: #dc3545 !important;
    /* Bootstrap 5 Danger color */
  }
</style>

<div class="container ">

  <div style="background-color: whitesmoke;" class="bag-section ">
    <?php
    if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
    ?>
      <h2 class="mt-4">Your bag (<span class="cart-count "><?= count($_SESSION['cart']) ?></span>)items</h2>

      <p id='bag-sec' class=""></p>
      <?php


      foreach (array_reverse($_SESSION['cart'])  as  $items) {
        $totalprice = $items['price'] * $items['quantity'];
        $subtotal += $totalprice;

      ?>

        <div class="bag-item border rounded-3 p-3 mb-3 bg-white shadow-sm" data-id="<?= $items['id'] ?>">

          <!-- 🖼 Image + Details -->
          <div class="row g-2">
            <div class="col-3 col-sm-2">
              <img src="../Server/uploads/<?= $items['image'] ?>"
                class="img-fluid rounded-2 w-100 h-auto">
            </div>

            <div class="col-9 col-sm-10">
              <h6 class="mb-1 fw-semibold"><?= $items['name'] ?></h6>
              <p class="text-muted mb-0 small">Colour: blue</p>
              <p class="text-muted mb-1 small">Size: 40R</p>

              <div class="item-actions d-flex flex-wrap align-items-center gap-2 mt-2">
                <button class="btn btn-link p-0 text-danger small" onclick="removeCart(<?= $items['id'] ?>)">
                  <i class="far fa-trash-alt"></i> Remove
                </button>

                <span class="vr mx-1 d-none d-sm-inline"></span>

                <button class="btn btn-link p-0 text-danger small">
                  <i class="far fa-heart"></i> Wishlist
                </button>
              </div>
            </div>
          </div>

          <!-- Divider -->
          <hr class="my-2">

          <!-- 📦 Quantity + Price -->
          <div class="row g-2 align-items-center">
            <div class="col-auto">
              <select class="form-select form-select-sm" style="width: 70px;"
                onchange="updateQuantity(<?= $items['id'] ?>, this.value)">
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


            <div class="col text-end">
              <div class="small text-muted text-decoration-line-through">£264.99</div>
              <div class="fw-bold text-dark">£<?= $totalprice ?></div>
              <div class="text-success small">You save 40%</div>
            </div>
          </div>

        </div>

      <?php
      }
      // $_SESSION['cart_subtotal'] = $subtotal;

      ?>




  </div>

  <div class="summary-section my-4">
    <h2>Total</h2>
    <div class="card shadow-sm rounded-3 p-3">

      <h4 class="mb-3">Order Summary</h4>

      <div class="d-flex justify-content-between mb-2">
        <span class="text-muted">Subtotal</span>
        <span class="fw-bold cart-subtotal">£<?= $subtotal ?></span>
      </div>

      <div class="d-flex justify-content-between mb-2">
        <span class="text-muted">Delivery</span>
        <span class="fw-bold text-success">Free</span>
      </div>

      <hr>

      <div class="d-flex justify-content-between mb-3 gap-2">
        <span class="fw-bold">Total (VAT included)</span>
        <span class="fw-bold text-dark cart-subtotal">£<?= $subtotal ?></span>
      </div>

      <a href="./checkout.php" class="btn btn-primary w-100 fw-bold py-2 mb-2">Go to Checkout</a>
      <a class="w-100 btn btn-warning text-white w-100 fw-bold py-2" type="submit">Continue Shopping</a>
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
<?php    } else {
?>
  <div class="empty-cart-section text-center my-5">
    <img src="https://cdn-icons-png.flaticon.com/512/2038/2038854.png" alt="Empty Cart" style="width: 150px; opacity: 0.8;">
    <h2 class="mt-4">Your Cart is Empty</h2>
    <p class="text-muted">Looks like you haven’t added anything to your bag yet.</p>
    <a href="shop.php" class="btn btn-primary mt-3 px-4 py-2 fw-bold">Continue Shopping</a>
  </div>


<?php }  ?>
  <?php include("./includes/mobile-icon.php") ?>

<script src="./Assets/JS/cart.js"></script>
<script>
  function updateQuantity(productid, val) {
    fetch("../Server/Process/update-cart.php", {
        method: "POST",
        headers: {
          "Content-Type": "application/x-www-form-urlencoded"
        },
        body: `productid=${productid}&quantity=${val}`,
      })
      .then((res) => res.json())
      .then((data) => {
        if (data.success) {
          // Update subtotal in summary section
          document.querySelectorAll(".cart-subtotal").forEach(el => {
            el.textContent = "$ " + data.subtotal;
          });
        }
      });
  }
</script>


<?php include './Components/footer.html';  ?>