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

  .order-card {
    border: 1px solid #ddd;
    background: #fff;
    border-radius: 8px;
    margin-bottom: 20px;
    padding: 20px;
  }

  .order-card img {
    max-width: 60px;
  }

  .order-status {
    font-weight: bold;
  }
</style>

<div  class="container-fluid">
  <div class="row">
<?php
$sql = "SELECT * FROM users where  id = $user_id";
$result = $conn->query($sql);
if($row = $result->fetch_assoc()){
 ?>
    <!-- Sidebar -->
    <div class="col-md-3 col-lg-2 sidebar p-0">
      <div class="p-4">
        <h5>Your Account</h5>
        <small class="text-muted d-block mb-3"><?= $row['name']?></small>
        <a href="#" class="active">My Orders</a>
        <a href="#">Your Addresses</a>
        <a href="#">Login & Security</a>
        <a href="#">Payments</a>
        <a href="#">Archived Orders</a>
        <a href="#">Saved Items</a>
        <hr />
        <a href="#">Customer Support</a>
        <a href="./logout.php">Log Out</a>
      </div>
    </div>
<?php
} ?>
    <!-- Main Content -->
    <div class="col-md-9 col-lg-10 p-4">
      <h4 class="mb-4">Orders</h4>

      <!-- Tabs -->
      <ul class="nav nav-tabs mb-4" id="orderTabs" role="tablist">
        <li class="nav-item" role="presentation">
          <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#current">In Progress</button>
        </li>
        <li class="nav-item" role="presentation">
          <button class="nav-link" data-bs-toggle="tab" data-bs-target="#unpaid">To Pay</button>
        </li>
        <li class="nav-item" role="presentation">
          <button class="nav-link" data-bs-toggle="tab" data-bs-target="#all">All Orders</button>
        </li>
      </ul>

      <div class="tab-content">
        <div class="tab-pane fade show active" id="current">
         

         <?php
         

          $sql = "
SELECT DISTINCT orders.user_id, order_items.quantity, orders.created_at AS created_at, orders.status, orders.id AS order_id, addresses.address_line1 AS address, orders.total AS total, products.name AS product_name, product_images.image_url FROM orders INNER JOIN order_items ON orders.id = order_items.order_id INNER JOIN addresses ON orders.address_id = addresses.id INNER JOIN products ON products.id = order_items.product_id INNER JOIN product_images ON product_images.product_id = products.id WHERE orders.user_id = $user_id AND orders.status IN ('pending', 'shipped') ORDER BY orders.created_at DESC


";
          $result = $conn->query($sql);
          while ($row = $result->fetch_assoc()) {
          ?>
            <!-- Order Cards -->
            <div class="order-card shadow rounded-4 p-4 mb-4 bg-white border border-light-subtle">
  <div class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center gap-2">
    <div>
      <h5 class="mb-1 text-dark fw-semibold">Order #<?= $row['order_id'] ?></h5>
      <div class="text-muted small"><?= $row['quantity'] ?> Products • <?= date('M d, Y', strtotime($row['created_at'])) ?></div>
    </div>
   <div class="d-flex flex-wrap gap-2 mt-2 mt-md-0">
  <button class="btn btn-sm btn-primary d-inline-flex align-items-center gap-2 shadow-sm">
    <i class="bi bi-download fs-6"></i>
    <span>Download Invoice</span>
  </button>
  <?= $row['status'] === 'delivered' ? ' <button class="btn btn-sm btn-danger d-inline-flex align-items-center gap-2 shadow-sm">
    <i class="bi bi-trash fs-6"></i>
    <span>Remove</span>
  </button>' : '' ?>
 
</div>

  </div>

  <hr class="my-3">

  <?php
    $badgeClass = '';
    $progress = 0;
    if ($row['status'] === "pending") {
      $badgeClass = 'bg-warning text-dark';
      $progress = 25;
    } elseif ($row['status'] === "shipped") {
      $badgeClass = 'bg-primary';
      $progress = 50;
    } elseif ($row['status'] === "delivered") {
      $badgeClass = 'bg-success';
      $progress = 100;
    } elseif ($row['status'] === "cancelled") {
      $badgeClass = 'bg-danger';
      $progress = 0;
    }
  ?> 

  <div class="d-flex flex-wrap gap-2 align-items-center mb-3">
    <span class="badge <?= $badgeClass ?> text-capitalize px-3 py-2 fs-6"><?= $row['status'] ?></span>
    <div class="flex-grow-1">
      <div class="progress mt-1" style="height: 6px;">
        <div class="progress-bar <?= $badgeClass ?>" role="progressbar" style="width: <?= $progress ?>%;" aria-valuenow="<?= $progress ?>" aria-valuemin="0" aria-valuemax="100"></div>
      </div>
    </div>
  </div>

  <div class="small text-muted mb-3">
    <strong>Delivery:</strong> Nov 13, 2025 • 
    <strong>Address:</strong> <?= $row['address'] ?> • 
    <strong>Total:</strong> <?= $row['total'] ?>
  </div>

  <div class="row g-3">
    <div class="col-6 col-md-3">
      <div class="card product-card border-0 shadow-sm h-100 hover-shadow transition">
        <img src="../Server/uploads/1751055693-EIF SKIN CAREC.jpg" alt="Product" class="card-img-top img-fluid rounded-top">
        <div class="card-body p-2">
          <p class="small mb-1 fw-semibold"><?= $row['product_name'] ?></p>
          <div class="text-muted small">Qty: 1 • Color: Silver • Size: Large</div>
        </div>
      </div>
    </div>
    <div class="col-6 col-md-3">
      <div class="card product-card border-0 shadow-sm h-100 hover-shadow transition">
        <img src="../Server/uploads/<?= $row['image_url'] ?>" alt="Product" class="card-img-top img-fluid rounded-top">
        <div class="card-body p-2">
          <p class="small mb-1 fw-semibold">Table Lamp</p>
          <div class="text-muted small">Qty: 1 • Color: Silver • Size: Large</div>
        </div>
      </div>
    </div>
  </div>
</div>


          <?php } ?>
        </div>

        <!-- Unpaid tab -->
        <div class="tab-pane fade" id="unpaid">
            <?php
         

          $sql = "
SELECT DISTINCT orders.user_id, order_items.quantity, orders.created_at AS created_at, orders.status, orders.id AS order_id, addresses.address_line1 AS address, orders.total AS total, products.name AS product_name, product_images.image_url FROM orders INNER JOIN order_items ON orders.id = order_items.order_id INNER JOIN addresses ON orders.address_id = addresses.id INNER JOIN products ON products.id = order_items.product_id INNER JOIN product_images ON product_images.product_id = products.id WHERE orders.user_id = $user_id AND orders.status = 'delivered' ORDER BY orders.created_at DESC


";
          $result = $conn->query($sql);
          while ($row = $result->fetch_assoc()) {
          ?>
            <!-- Order Cards -->
            <div class="order-card shadow rounded-4 p-4 mb-4 bg-white border border-light-subtle">
  <div class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center gap-2">
    <div>
      <h5 class="mb-1 text-dark fw-semibold">Order #<?= $row['order_id'] ?></h5>
      <div class="text-muted small"><?= $row['quantity'] ?> Products • <?= date('M d, Y', strtotime($row['created_at'])) ?></div>
    </div>
   <div class="d-flex flex-wrap gap-2 mt-2 mt-md-0">
  <button class="btn btn-sm btn-primary d-inline-flex align-items-center gap-2 shadow-sm">
    <i class="bi bi-download fs-6"></i>
    <span>Download Invoice</span>
  </button>
  <?= $row['status'] === 'delivered' ? ' <button class="btn btn-sm btn-danger d-inline-flex align-items-center gap-2 shadow-sm">
    <i class="bi bi-trash fs-6"></i>
    <span>Remove</span>
  </button>' : '' ?>
 
</div>

  </div>

  <hr class="my-3">

  <?php
    $badgeClass = '';
    $progress = 0;
    if ($row['status'] === "pending") {
      $badgeClass = 'bg-warning text-dark';
      $progress = 25;
    } elseif ($row['status'] === "shipped") {
      $badgeClass = 'bg-primary';
      $progress = 50;
    } elseif ($row['status'] === "delivered") {
      $badgeClass = 'bg-success';
      $progress = 100;
    } elseif ($row['status'] === "cancelled") {
      $badgeClass = 'bg-danger';
      $progress = 0;
    }
  ?> 

  <div class="d-flex flex-wrap gap-2 align-items-center mb-3">
    <span class="badge <?= $badgeClass ?> text-capitalize px-3 py-2 fs-6"><?= $row['status'] ?></span>
    <div class="flex-grow-1">
      <div class="progress mt-1" style="height: 6px;">
        <div class="progress-bar <?= $badgeClass ?>" role="progressbar" style="width: <?= $progress ?>%;" aria-valuenow="<?= $progress ?>" aria-valuemin="0" aria-valuemax="100"></div>
      </div>
    </div>
  </div>

  <div class="small text-muted mb-3">
    <strong>Delivery:</strong> Nov 13, 2025 • 
    <strong>Address:</strong> <?= $row['address'] ?> • 
    <strong>Total:</strong> <?= $row['total'] ?>
  </div>

  <div class="row g-3">
    <div class="col-6 col-md-3">
      <div class="card product-card border-0 shadow-sm h-100 hover-shadow transition">
        <img src="../Server/uploads/1751055693-EIF SKIN CAREC.jpg" alt="Product" class="card-img-top img-fluid rounded-top">
        <div class="card-body p-2">
          <p class="small mb-1 fw-semibold"><?= $row['product_name'] ?></p>
          <div class="text-muted small">Qty: 1 • Color: Silver • Size: Large</div>
        </div>
      </div>
    </div>
    <div class="col-6 col-md-3">
      <div class="card product-card border-0 shadow-sm h-100 hover-shadow transition">
        <img src="../Server/uploads/<?= $row['image_url'] ?>" alt="Product" class="card-img-top img-fluid rounded-top">
        <div class="card-body p-2">
          <p class="small mb-1 fw-semibold">Table Lamp</p>
          <div class="text-muted small">Qty: 1 • Color: Silver • Size: Large</div>
        </div>
      </div>
    </div>
  </div>
</div>


          <?php } ?>
        </div>

        <!-- All Orders tab -->
        <div class="tab-pane fade" id="all">
           <?php
         

          $sql = "
SELECT DISTINCT
    orders.user_id,
    order_items.quantity,
    orders.created_at AS created_at,
    orders.status,
    orders.id AS order_id,
    addresses.address_line1 AS address,
    orders.total AS total,
    products.name AS product_name,
    product_images.image_url
FROM orders
INNER JOIN order_items ON orders.id = order_items.order_id
INNER JOIN addresses ON orders.address_id = addresses.id
INNER JOIN products ON products.id = order_items.product_id
INNER JOIN product_images ON product_images.product_id = products.id
WHERE orders.user_id = $user_id
ORDER BY orders.created_at DESC


";
          $result = $conn->query($sql);
          while ($row = $result->fetch_assoc()) {
          ?>
            <!-- Order Cards -->
            <div class="order-card shadow rounded-4 p-4 mb-4 bg-white border border-light-subtle">
  <div class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center gap-2">
    <div>
      <h5 class="mb-1 text-dark fw-semibold">Order #<?= $row['order_id'] ?></h5>
      <div class="text-muted small"><?= $row['quantity'] ?> Products • <?= date('M d, Y', strtotime($row['created_at'])) ?></div>
    </div>
   <div class="d-flex flex-wrap gap-2 mt-2 mt-md-0">
  <button class="btn btn-sm btn-primary d-inline-flex align-items-center gap-2 shadow-sm">
    <i class="bi bi-download fs-6"></i>
    <span>Download Invoice</span>
  </button>
  <?= $row['status'] === 'delivered' ? ' <button class="btn btn-sm btn-danger d-inline-flex align-items-center gap-2 shadow-sm">
    <i class="bi bi-trash fs-6"></i>
    <span>Remove</span>
  </button>' : '' ?>
 
</div>

  </div>

  <hr class="my-3">

  <?php
    $badgeClass = '';
    $progress = 0;
    if ($row['status'] === "pending") {
      $badgeClass = 'bg-warning text-dark';
      $progress = 25;
    } elseif ($row['status'] === "shipped") {
      $badgeClass = 'bg-primary';
      $progress = 50;
    } elseif ($row['status'] === "delivered") {
      $badgeClass = 'bg-success';
      $progress = 100;
    } elseif ($row['status'] === "cancelled") {
      $badgeClass = 'bg-danger';
      $progress = 0;
    }
  ?> 

  <div class="d-flex flex-wrap gap-2 align-items-center mb-3">
    <span class="badge <?= $badgeClass ?> text-capitalize px-3 py-2 fs-6"><?= $row['status'] ?></span>
    <div class="flex-grow-1">
      <div class="progress mt-1" style="height: 6px;">
        <div class="progress-bar <?= $badgeClass ?>" role="progressbar" style="width: <?= $progress ?>%;" aria-valuenow="<?= $progress ?>" aria-valuemin="0" aria-valuemax="100"></div>
      </div>
    </div>
  </div>

  <div class="small text-muted mb-3">
    <strong>Delivery:</strong> Nov 13, 2025 • 
    <strong>Address:</strong> <?= $row['address'] ?> • 
    <strong>Total:</strong> <?= $row['total'] ?>
  </div>

  <div class="row g-3">
    <div class="col-6 col-md-3">
      <div class="card product-card border-0 shadow-sm h-100 hover-shadow transition">
        <img src="../Server/uploads/1751055693-EIF SKIN CAREC.jpg" alt="Product" class="card-img-top img-fluid rounded-top">
        <div class="card-body p-2">
          <p class="small mb-1 fw-semibold"><?= $row['product_name'] ?></p>
          <div class="text-muted small">Qty: 1 • Color: Silver • Size: Large</div>
        </div>
      </div>
    </div>
    <div class="col-6 col-md-3">
      <div class="card product-card border-0 shadow-sm h-100 hover-shadow transition">
        <img src="../Server/uploads/<?= $row['image_url'] ?>" alt="Product" class="card-img-top img-fluid rounded-top">
        <div class="card-body p-2">
          <p class="small mb-1 fw-semibold">Table Lamp</p>
          <div class="text-muted small">Qty: 1 • Color: Silver • Size: Large</div>
        </div>
      </div>
    </div>
  </div>
</div>


          <?php } ?>

        </div>
      </div>
    </div>

  </div>
</div>





<?php include './Components/footer.html';  ?>