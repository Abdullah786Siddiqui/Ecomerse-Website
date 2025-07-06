<?php
include './Components/header.html';
include './includes/Navbar.php';
include("../Server/Admin-Panel/config/db.php");
$user_id = $_SESSION['user_id'];

?>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet" />
<style>
  body {
    background: #f5f6f8;
  }

  .sidebar {
    min-height: 100vh;
    background: white;
    border-right: 1px solid #ddd;
  }

  .sidebar a {
    padding: 10px 20px;
    display: block;
    color: #333;
    text-decoration: none;
  }

  .sidebar a.active {
    background-color: #e7f1ff;
    font-weight: 600;
  }
</style>


<div class="container-fluid">
  <div class="row">

    <?php
    $sql = "SELECT * FROM users where  id = $user_id";
    $result = $conn->query($sql);
    if ($row = $result->fetch_assoc()) {
    ?>
      <!-- Sidebar -->
      <div class="col-md-3 col-lg-2 sidebar p-0">
        <div class="p-4">
          <h5>Your Account</h5>
          <small class="text-muted d-block mb-3"><?= $row['name'] ?></small>
          <a href="./homeprofile.php" id="Home" class="active">Home</a>
          <a href="./Profile.php" id='myorders'>My Orders</a>
          <a href="#">Saved Items</a>
          <hr />
          <a href="#">Customer Support</a>
          <a href="./logout.php">Log Out</a>
        </div>
      </div>
    <?php
    } ?>
    <div class="col-md-9 col-lg-10 p-4">
      <h4 class="mb-4">Home</h4>



      <!-- Main content -->


      <div class="card shadow-lg border-0 rounded-4 mt-4 p-4 bg-white">
        <div class="card-body">
          <!-- Header -->
         
          <div class="d-flex flex-column flex-sm-row align-items-center text-center text-sm-start gap-4 mb-4">
            <div>
              <img
                src=""
                alt="User Avatar"
                class="rounded-circle img-fluid shadow"
                style="width: 120px; height: 120px; object-fit: cover;">
            </div>
            <div>
              <h4 class="fw-bold mb-0">John Doe</h4>
              <p class="text-secondary small mb-1">johndoe@example.com</p>
              <p class="text-secondary small mb-0">+1 (555) 123-4567</p>
            </div>
          </div>

          <!-- User Info -->
          <hr class="my-4">

          <div class="row text-center text-md-start gy-3">
            <div class="col-12 col-md-6">
              <h6 class="text-muted fw-semibold mb-1"><i class="bi bi-geo-alt"></i> Default Address</h6>
              <p class="mb-0">123 Main Street<br>Springfield, USA</p>
            </div>
            <div class="col-12 col-md-6">
              <h6 class="text-muted fw-semibold mb-1"><i class="bi bi-calendar"></i> Member Since</h6>
              <p class="mb-0">January 1, 2021</p>
            </div>
          </div>

          <!-- E-commerce Specific Stats -->
          <hr class="my-4">

          <div class="row g-3">
            <!-- Total Orders -->
            <div class="col-6 col-md-4">
              <div class="border rounded-3 p-3 shadow-sm text-center h-100">
                <div class="text-primary fs-3 mb-1">
                  <i class="bi bi-bag-check"></i>
                </div>
                <h5 class="fw-bold mb-0">12</h5>
                <small class="text-muted">Total Orders</small>
              </div>
            </div>

            <!-- Pending Orders -->
            <div class="col-6 col-md-4">
              <div class="border rounded-3 p-3 shadow-sm text-center h-100">
                <div class="text-warning fs-3 mb-1">
                  <i class="bi bi-clock-history"></i>
                </div>
                <h5 class="fw-bold mb-0">2</h5>
                <small class="text-muted">Pending Orders</small>
              </div>
            </div>

            <!-- Wallet Balance -->
            <div class="col-6 col-md-4">
              <div class="border rounded-3 p-3 shadow-sm text-center h-100">
                <div class="text-success fs-3 mb-1">
                  <i class="bi bi-wallet2"></i>
                </div>
                <h5 class="fw-bold mb-0">$250</h5>
                <small class="text-muted">Wallet Balance</small>
              </div>
            </div>

            <!-- Available Coupons -->
            <div class="col-6 col-md-4">
              <div class="border rounded-3 p-3 shadow-sm text-center h-100">
                <div class="text-info fs-3 mb-1">
                  <i class="bi bi-ticket-perforated"></i>
                </div>
                <h5 class="fw-bold mb-0">3</h5>
                <small class="text-muted">Available Coupons</small>
              </div>
            </div>

            <!-- Membership Tier -->
            <div class="col-6 col-md-4">
              <div class="border rounded-3 p-3 shadow-sm text-center h-100">
                <div class="text-danger fs-3 mb-1">
                  <i class="bi bi-award"></i>
                </div>
                <h5 class="fw-bold mb-0">Gold</h5>
                <small class="text-muted">Membership Tier</small>
              </div>
            </div>

            <!-- Saved Addresses -->
            <div class="col-6 col-md-4">
              <div class="border rounded-3 p-3 shadow-sm text-center h-100">
                <div class="text-secondary fs-3 mb-1">
                  <i class="bi bi-geo-alt"></i>
                </div>
                <h5 class="fw-bold mb-0">5</h5>
                <small class="text-muted">Saved Addresses</small>
              </div>
            </div>
          </div>


          <div class="text-center text-md-end mt-4">
            <a href="#" class="btn btn-primary px-4 py-2 rounded-pill shadow-sm me-2">Edit Profile</a>
            <a href="#" class="btn btn-outline-secondary px-4 py-2 rounded-pill shadow-sm">Manage Addresses</a>
          </div>
        </div>
      </div>










    </div>
  </div>















  <?php include './Components/footer.html';  ?>