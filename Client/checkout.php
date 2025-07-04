 <?php

  include("../Server/Admin-Panel/config/db.php");
  include './Components/header.html';
  include './includes/Navbar.php';

if (!isset($_SESSION['user_id'])) {
  // include("../Client/login.php")
 echo '<script>window.location.href = "../Client/login.php"</script>';
  
}



  $user_id = $_SESSION['user_id'] ?? "";
  $subtotal = 0;
  if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
    foreach ($_SESSION['cart'] as $items) {
      $totalprice = $items['price'] * $items['quantity'];
      $subtotal += $totalprice;
    }
    $_SESSION['subtotal'] = $subtotal;
  }
  $sql = "SELECT * FROM addresses WHERE user_id = '$user_id' AND type = 'billing' LIMIT 1";
  $hasAddress = false;
  $result = $conn->query($sql);
  if ($row = $result->fetch_assoc()) {
    $hasAddress = true;
  }

  ?>

 <div class="cont p-5 ">
   <div class="row g-3">

     <?php if ($hasAddress) : ?>
       <div class="col-12 col-lg-8">
         <div class="card shadow-sm rounded-4 border h-100">
           <div class="card-body p-4 ">
             <div class="border rounded-3 mb-4">

               <!-- Shipping & Billing Section Header -->
               <div class="d-flex align-items-center justify-content-between p-2 bg-light rounded-top">
                 <h5 class="mb-0 text-success">Shipping & Billing</h5>
                 <button class="btn btn-success btn-sm">Edit</button>
               </div>

               <!-- Address Details -->
               <ul class="list-group list-group-flush">
                 <li class="list-group-item px-3 py-2"><strong>Name:</strong> <?= $row['full_name'] ?></li>
                 <li class="list-group-item px-3 py-2"><strong>Address:</strong> <?= $row['address_line1'] ?></li>
                 <li class="list-group-item px-3 py-2"><strong>Phone:</strong> <?= $row['phone'] ?></li>
                 <li class="list-group-item px-3 py-2"><strong>City:</strong> <?= $row['city'] ?></li>
               </ul>

             </div>


             <!-- Cart Items -->
             <?php

              $subtotal = 0;
              if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
                foreach (array_reverse($_SESSION['cart']) as $items) {
                  $totalprice = $items['price'] * $items['quantity'];
                  $subtotal += $totalprice;
              ?>
                 <div class="mb-4 p-3 border rounded-4 shadow-sm bg-white bag-item" data-id="<?= $items['id'] ?>">

                   <!-- Product Details Row -->
                   <div class="d-flex flex-column flex-md-row gap-3">

                     <!-- Product Image -->
                     <div class="flex-shrink-0" style="width: 120px; height: 120px; overflow: hidden;">
                       <img src="../Server/uploads/<?= $items['image'] ?>" class="img-fluid rounded-3 h-100 w-100 object-fit-cover" alt="Product Image">
                     </div>

                     <!-- Product Info -->
                     <div class="flex-grow-1 d-flex flex-column justify-content-between">
                       <div>
                         <h6 class="fw-bold mb-1"><?= $items['name'] ?></h6>
                         <p class="mb-1 text-body-secondary small">Colour: <span class="text-dark">Blue</span></p>
                         <p class="mb-2 text-body-secondary small">Size: <span class="text-dark">40R</span></p>
                       </div>

                       <!-- Item Actions -->
                       <div class="d-flex flex-wrap gap-2">
                         <button class="btn btn-sm btn-outline-danger" onclick="removeCart(<?= $items['id'] ?>)">
                           <i class="far fa-trash-alt me-1"></i> Remove
                         </button>
                         <button class="btn btn-sm btn-outline-secondary">
                           <i class="far fa-heart me-1"></i> Move to Wishlist
                         </button>
                       </div>
                     </div>
                   </div>

                   <!-- Divider -->
                   <hr class="my-3">

                   <!-- Quantity and Price Row -->
                   <div class="d-flex justify-content-between align-items-center flex-wrap gap-3">

                     <!-- Quantity -->
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

                     <!-- Price -->
                     <div class="text-end">
                       <small class="text-muted text-decoration-line-through">£264.99</small><br>
                       <span class="fw-bold fs-5">£<?= $totalprice ?></span><br>
                       <small class="text-success">You save 40%</small>
                     </div>

                   </div>
                 </div>
               <?php

                }
                $_SESSION['subtotal'] = $subtotal;
              } else {
                ?>

               <h1 class="text-center">Your Cart is Empty</h1>
             <?php
              }
              ?>

           </div>
         </div>
       </div>



     <?php else: ?>
       <div class="col-12 col-lg-8">
         <div class="card shadow-sm rounded-4">
           <div class="card-body p-4">
             <h2 class="text-center mb-4" style="font-family: 'Gill Sans', 'Trebuchet MS'; color:#333;">Delivery Address</h2>

             <form id="address-form" novalidate>
               <div class="row g-3">
                 <div class="col-12">
                   <label for="fullName" class="form-label">Full Name</label>
                   <input type="text" class="form-control" name="checkout_name" id="fullName" placeholder="Enter Your Full Name" required>
                   <div id="fullName-error" class="text-danger"></div>
                 </div>

                 <input type="hidden" id="user_id" name="user_id" value="<?= $user_id  ?>">

                 <div class="col-12">
                   <label for="address" class="form-label">Address</label>
                   <input type="text" class="form-control" name="checkout_address" id="address" placeholder="1234 Main St" required>
                   <div id="address-error" class="text-danger"></div>
                 </div>

                 <div class="col-12">
                   <label for="phone" class="form-label">Phone</label>
                   <input type="text" class="form-control" name="checkout_phone" id="phone" placeholder="+92300000000" required>
                   <div id="phone-error" class="text-danger"></div>
                 </div>

                 <div class="col-md-6">
                   <label for="country" class="form-label">Country</label>
                   <select class="form-select" id="country" name="checkout_country" required>
                     <option value="">Choose...</option>
                     <option>Pakistan</option>
                     <option>United States</option>
                     <option>India</option>
                     <option>France</option>
                   </select>
                   <div id="country-error" class="text-danger"></div>
                 </div>

                 <div class="col-md-6">
                   <label for="city" class="form-label">City</label>
                   <select class="form-select" id="city" name="checkout_city" required>
                     <option value="">Choose...</option>
                     <option>Lahore</option>
                     <option>Karachi</option>
                     <option>Multan</option>
                   </select>
                   <div id="city-error" class="text-danger"></div>
                 </div>
               </div>

               <hr class="my-4">

               <div class="form-check mb-3">
                 <input type="checkbox" class="form-check-input" id="same-address" name="check_address" value="1">
                 <label class="form-check-label fw-bold" for="same-address">Shipping address is the same as billing</label>
               </div>

               <div id="shipping-section" class="bg-light p-3 rounded-3" style="display:none;">
                 <h5 class="mb-3">Shipping Address</h5>

                 <div class="mb-3">
                   <label for="shippingName" class="form-label">Full Name</label>
                   <input type="text" class="form-control" name="checkout_shipping_name" id="shippingName">
                   <div id="shippingName-error" class="text-danger"></div>
                 </div>

                 <div class="mb-3">
                   <label for="shippingAddress" class="form-label">Address</label>
                   <input type="text" class="form-control" name="checkout_shipping_address" id="shippingAddress">
                   <div id="shippingAddress-error" class="text-danger"></div>
                 </div>

                 <div class="mb-3">
                   <label for="shippingPhone" class="form-label">Phone</label>
                   <input type="text" class="form-control" name="checkout_shipping_phone" id="shippingPhone">
                   <div id="shippingPhone-error" class="text-danger"></div>
                 </div>

                 <div class="mb-3">
                   <label for="shippingCountry" class="form-label">Country</label>
                   <select class="form-select" name="checkout_shipping_country" id="shippingCountry">
                     <option value="">Choose...</option>
                     <option>Pakistan</option>
                     <option>India</option>
                     <option>USA</option>
                   </select>
                   <div id="shippingCountry-error" class="text-danger"></div>
                 </div>

                 <div class="mb-3">
                   <label for="shippingCity" class="form-label">City</label>
                   <select class="form-select" id="shippingCity" name="checkout_shipping_city">
                     <option value="">Choose...</option>
                     <option>Karachi</option>
                     <option>Lahore</option>
                     <option>Islamabad</option>
                   </select>
                   <div id="shippingCity-error" class="text-danger"></div>
                 </div>
               </div>

               <button class="btn btn-primary w-100 btn-lg mt-3" type="submit">Save</button>
             </form>
           </div>
         </div>
       </div>
     <?php endif; ?>


     <!-- </div>  -->

     <div class="col-12 col-lg-4">
       <div class="summary-section">

         <div class="card shadow-sm rounded-4 p-3 mb-3">
           <h4 class="mb-3">Order Summary</h4>

           <div class="d-flex justify-content-between mb-2">
             <span class="text-muted">Subtotal</span>
             <span class="fw-bold cart-subtotal">$ <?= $subtotal ?></span>

           </div>

           <div class="d-flex justify-content-between mb-2">
             <span class="text-muted">Delivery</span>
             <span class="fw-bold text-success">Free</span>
           </div>

           <hr>

           <div class="d-flex justify-content-between mb-3">
             <span class="fw-bold">Total (VAT included)</span>
             <span class="fw-bold text-dark cart-subtotal">$ <?= $subtotal ?></span>

           </div>


           <a onclick="checkCartBeforePay()" class="btn btn-primary text-white w-100 fw-bold py-2">Proceed to Pay</a>
         </div>

         <div class="card p-3">
           <div class="d-flex justify-content-between align-items-center">
             <label for="voucher" class="mb-0">Add a voucher <span class="text-muted">(Optional)</span></label>
             <i class="fa-solid fa-chevron-down"></i>
           </div>

           <div class="mt-2">
             <input type="text" class="form-control form-control-sm" placeholder="Enter voucher code">
             <button class="btn btn-outline-secondary btn-sm mt-2">Apply</button>
           </div>
         </div>

       </div>
     </div>

   </div> <!-- End .row -->
 </div> <!-- End .container -->






 <script src="./Assets/JS/checkout.js"></script>
 <script src="./Assets/JS/cart.js"></script>


 <?php include './Components/footer.html';  ?>