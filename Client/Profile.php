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
      <!-- in Progress -->
      <div class="tab-content">
        <div class="tab-pane fade show active" id="current">
          <?php
          $sql_pending_shipped = "
 
SELECT
    o.id AS order_id,
    o.user_id,
    o.created_at,
    o.status,
    o.total,
    a.address_line1 AS address,
    COUNT(oi.id) AS product_count_ps
FROM orders o
INNER JOIN addresses a ON o.address_id = a.id
INNER JOIN order_items oi ON o.id = oi.order_id
WHERE o.user_id = $user_id
AND o.status IN ('pending', 'shipped')
GROUP BY o.id, o.user_id, o.created_at, o.status, o.total, a.address_line1
ORDER BY o.created_at DESC";

          $result_pending_shipped = $conn->query($sql_pending_shipped);

          while ($order_ps = $result_pending_shipped->fetch_assoc()) {
          ?>
            <!-- Order Card -->
            <div class="order-card shadow rounded-4 p-4 mb-4 bg-white border border-light-subtle">
              <div class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center gap-2">
                <div>

                  <h5 class="mb-1 text-dark fw-semibold">Order #<?= $order_ps['order_id'] ?></h5>
                  <div class="text-muted small">
                    <?= $order_ps['product_count_ps'] ?> Products • <?= date('M d, Y', strtotime($order_ps['created_at'])) ?>
                  </div>
                </div>
                <div class="d-flex flex-wrap gap-2 mt-2 mt-md-0">
                  <button class="btn btn-sm btn-primary d-inline-flex align-items-center gap-2 shadow-sm">
                    <i class="bi bi-download fs-6"></i>
                    <span>Download Invoice</span>
                  </button>
                  <?php if ($order_ps['status'] === 'delivered') { ?>
                    <button class="btn btn-sm btn-danger d-inline-flex align-items-center gap-2 shadow-sm">
                      <i class="bi bi-trash fs-6"></i>
                      <span>Remove</span>
                    </button>
                  <?php } ?>
                </div>
              </div>

              <hr class="my-3">

              <?php
              $badgeClass = '';
              $progress = 0;
              if ($order_ps['status'] === "pending") {
                $badgeClass = 'bg-warning text-dark';
                $progress = 25;
              } elseif ($order_ps['status'] === "shipped") {
                $badgeClass = 'bg-primary';
                $progress = 50;
              } elseif ($order_ps['status'] === "delivered") {
                $badgeClass = 'bg-success';
                $progress = 100;
              } elseif ($order_ps['status'] === "cancelled") {
                $badgeClass = 'bg-danger';
                $progress = 0;
              }
              ?>

              <div class="d-flex flex-wrap gap-2 align-items-center mb-3">
                <span class="badge <?= $badgeClass ?> text-capitalize px-3 py-2 fs-6"><?= $order_ps['status'] ?></span>
                <div class="flex-grow-1">
                  <div class="progress mt-1" style="height: 6px;">
                    <div class="progress-bar <?= $badgeClass ?>" role="progressbar" style="width: <?= $progress ?>%;" aria-valuenow="<?= $progress ?>" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                </div>
              </div>

              <div class="small text-muted mb-3">
                <strong>Delivery:</strong> Nov 13, 2025 •
                <strong>Address:</strong> <?= $order_ps['address'] ?> •
                <strong>Total:</strong> <?= $order_ps['total'] ?>
              </div>

              <div class="row g-3">
                <?php
                $order_id_ps = $order_ps['order_id'];
                $itemsSql_ps = "
SELECT
  products.name AS product_name,
  product_images.image_url,
  order_items.quantity
FROM order_items
INNER JOIN products ON products.id = order_items.product_id
INNER JOIN product_images ON product_images.product_id = products.id
WHERE order_items.order_id = $order_id_ps";
                $itemsResult_ps = $conn->query($itemsSql_ps);

                while ($item_ps = $itemsResult_ps->fetch_assoc()) {
                ?>
                  <div class="col-6 col-md-3">
                    <div class="card product-card border-0 shadow-sm h-100 hover-shadow transition">
                      <img src="../Server/uploads/<?= $item_ps['image_url'] ?>" alt="Product" class="card-img-top img-fluid rounded-top">
                      <div class="card-body p-2">
                        <p class="small mb-1 fw-semibold"><?= $item_ps['product_name'] ?></p>
                        <div class="text-muted small">Qty: <?= $item_ps['quantity'] ?></div>
                      </div>
                    </div>
                  </div>
                <?php } ?>
              </div>
            </div>
          <?php } ?>

        </div>


        <!-- to pay -->
        <div class="tab-pane fade" id="unpaid">
          <?php
          $sql_del = "
SELECT
    o.id AS order_id,
    o.user_id,
    o.created_at,
    o.status,
    o.total,
    a.address_line1 AS address,
    COUNT(oi.id) AS product_count
FROM orders o
INNER JOIN addresses a ON o.address_id = a.id
INNER JOIN order_items oi ON o.id = oi.order_id
WHERE o.user_id = $user_id
AND o.status = 'delivered'
GROUP BY o.id, o.user_id, o.created_at, o.status, o.total, a.address_line1
ORDER BY o.created_at DESC";

          $result_del = $conn->query($sql_del);

          while ($order_del = $result_del->fetch_assoc()) {
          ?>
            <!-- Order Card -->
            <div class="order-card shadow rounded-4 p-4 mb-4 bg-white border border-light-subtle">
              <div class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center gap-2">
                <div>
                  <h5 class="mb-1 text-dark fw-semibold">Order #<?= $order_del['order_id'] ?></h5>
                  <div class="text-muted small">
                    <?= $order_del['product_count'] ?> Products • <?= date('M d, Y', strtotime($order_del['created_at'])) ?>
                  </div>
                </div>
                <div class="d-flex flex-wrap gap-2 mt-2 mt-md-0">
                  <button class="btn btn-sm btn-primary d-inline-flex align-items-center gap-2 shadow-sm">
                    <i class="bi bi-download fs-6"></i>
                    <span>Download Invoice</span>
                  </button>
                  <?php if ($order_del['status'] === 'delivered') { ?>
                    <button class="btn btn-sm btn-danger d-inline-flex align-items-center gap-2 shadow-sm">
                      <i class="bi bi-trash fs-6"></i>
                      <span>Remove</span>
                    </button>
                  <?php } ?>
                </div>
              </div>

              <hr class="my-3">

              <?php
              $badgeClass = '';
              $progress = 0;
              if ($order_del['status'] === "pending") {
                $badgeClass = 'bg-warning text-dark';
                $progress = 25;
              } elseif ($order_del['status'] === "shipped") {
                $badgeClass = 'bg-primary';
                $progress = 50;
              } elseif ($order_del['status'] === "delivered") {
                $badgeClass = 'bg-success';
                $progress = 100;
              } elseif ($order_del['status'] === "cancelled") {
                $badgeClass = 'bg-danger';
                $progress = 0;
              }
              ?>

              <div class="d-flex flex-wrap gap-2 align-items-center mb-3">
                <span class="badge <?= $badgeClass ?> text-capitalize px-3 py-2 fs-6"><?= $order_del['status'] ?></span>
                <div class="flex-grow-1">
                  <div class="progress mt-1" style="height: 6px;">
                    <div class="progress-bar <?= $badgeClass ?>" role="progressbar" style="width: <?= $progress ?>%;" aria-valuenow="<?= $progress ?>" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                </div>
              </div>

              <div class="small text-muted mb-3">
                <strong>Delivery:</strong> Nov 13, 2025 •
                <strong>Address:</strong> <?= $order_del['address'] ?> •
                <strong>Total:</strong> <?= $order_del['total'] ?>
              </div>

              <div class="row g-3">
                <?php
                $order_id_del = $order_del['order_id'];
                $itemsSql_del = "
SELECT
  products.name AS product_name,
  product_images.image_url,
  order_items.quantity
FROM order_items
INNER JOIN products ON products.id = order_items.product_id
INNER JOIN product_images ON product_images.product_id = products.id
WHERE order_items.order_id = $order_id_del";
                $itemsResult_del = $conn->query($itemsSql_del);

                while ($item_del = $itemsResult_del->fetch_assoc()) {
                ?>
                  <div class="col-6 col-md-3">
                    <div class="card product-card border-0 shadow-sm h-100 hover-shadow transition">
                      <img src="../Server/uploads/<?= $item_del['image_url'] ?>" alt="Product" class="card-img-top img-fluid rounded-top">
                      <div class="card-body p-2">
                        <p class="small mb-1 fw-semibold"><?= $item_del['product_name'] ?></p>
                        <div class="text-muted small">Qty: <?= $item_del['quantity'] ?></div>
                      </div>
                    </div>
                  </div>
                <?php } ?>
              </div>
            </div>
          <?php } ?>
        </div>

        <!-- All Orders tab -->
        <div class="tab-pane fade" id="all">
          <?php
          $sql = "
SELECT
    o.id AS order_id,
    o.user_id,
    o.created_at,
    o.status,
    o.total,
    a.address_line1 AS address,
    COUNT(oi.id) AS product_count_all
FROM orders o
INNER JOIN addresses a ON o.address_id = a.id
INNER JOIN order_items oi ON o.id = oi.order_id
WHERE o.user_id = $user_id
GROUP BY o.id, o.user_id, o.created_at, o.status, o.total, a.address_line1
ORDER BY o.created_at DESC";

          $result = $conn->query($sql);

          while ($order = $result->fetch_assoc()) {
          ?>
            <!-- Order Card -->
            <div class="order-card shadow rounded-4 p-4 mb-4 bg-white border border-light-subtle">
              <div class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center gap-2">
                <div>
                  <!-- <h5 class="mb-1 text-dark fw-semibold">Order #<?= $order['order_id'] ?></h5>
                    <div class="text-muted small"><?= date('M d, Y', strtotime($order['created_at'])) ?></div> -->
                  <h5 class="mb-1 text-dark fw-semibold">Order #<?= $order['order_id'] ?></h5>
                  <div class="text-muted small">
                    <?= $order['product_count_all'] ?> Products • <?= date('M d, Y', strtotime($order['created_at'])) ?>
                  </div>

                </div>
                <div class="d-flex flex-wrap gap-2 mt-2 mt-md-0">
                  <button class="btn btn-sm btn-primary d-inline-flex align-items-center gap-2 shadow-sm">
                    <i class="bi bi-download fs-6"></i>
                    <span>Download Invoice</span>
                  </button>
                  <?php if ($order['status'] === 'delivered') { ?>
                    <button class="btn btn-sm btn-danger d-inline-flex align-items-center gap-2 shadow-sm">
                      <i class="bi bi-trash fs-6"></i>
                      <span>Remove</span>
                    </button>
                  <?php } ?>
                </div>
              </div>

              <hr class="my-3">

              <?php
              $badgeClass = '';
              $progress = 0;
              if ($order['status'] === "pending") {
                $badgeClass = 'bg-warning text-dark';
                $progress = 25;
              } elseif ($order['status'] === "shipped") {
                $badgeClass = 'bg-primary';
                $progress = 50;
              } elseif ($order['status'] === "delivered") {
                $badgeClass = 'bg-success';
                $progress = 100;
              } elseif ($order['status'] === "cancelled") {
                $badgeClass = 'bg-danger';
                $progress = 0;
              }
              ?>

              <div class="d-flex flex-wrap gap-2 align-items-center mb-3">
                <span class="badge <?= $badgeClass ?> text-capitalize px-3 py-2 fs-6"><?= $order['status'] ?></span>
                <div class="flex-grow-1">
                  <div class="progress mt-1" style="height: 6px;">
                    <div class="progress-bar <?= $badgeClass ?>" role="progressbar" style="width: <?= $progress ?>%;" aria-valuenow="<?= $progress ?>" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                </div>
              </div>

              <div class="small text-muted mb-3">
                <strong>Delivery:</strong> Nov 13, 2025 •
                <strong>Address:</strong> <?= $order['address'] ?> •
                <strong>Total:</strong> <?= $order['total'] ?>
              </div>

              <div class="row g-3">
                <?php
                $order_id = $order['order_id'];
                $itemsSql = "
SELECT
  products.name AS product_name,
  product_images.image_url,
  order_items.quantity
FROM order_items
INNER JOIN products ON products.id = order_items.product_id
INNER JOIN product_images ON product_images.product_id = products.id
WHERE order_items.order_id = $order_id";
                $itemsResult = $conn->query($itemsSql);

                while ($item = $itemsResult->fetch_assoc()) {
                ?>
                  <div class="col-6 col-md-3">
                    <div class="card product-card border-0 shadow-sm h-100 hover-shadow transition">
                      <img src="../Server/uploads/<?= $item['image_url'] ?>" alt="Product" class="card-img-top img-fluid rounded-top">
                      <div class="card-body p-2">
                        <p class="small mb-1 fw-semibold"><?= $item['product_name'] ?></p>
                        <div class="text-muted small">Qty: <?= $item['quantity'] ?></div>
                      </div>
                    </div>
                  </div>
                <?php } ?>
              </div>
            </div>
          <?php } ?>
        </div>

      </div>

    </div>
  </div>





  <?php include './Components/footer.html';  ?>