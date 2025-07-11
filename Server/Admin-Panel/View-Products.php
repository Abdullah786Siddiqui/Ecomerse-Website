<?php
include("./includes/header.html");
include("./Sidebar.php");
?>
  <style>
    .product-img {
      width: 45px;
      height: 45px;
      object-fit: cover;
      border-radius: 8px;
      box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
    }

    .table-responsive {
      border-radius: 12px;
      overflow: hidden;
      box-shadow: 0 8px 16px rgba(0,0,0,0.04);
      background-color: #ffffff;
    }

    .table thead th {
      background-color: #f8fafc;
      text-transform: uppercase;
      font-size: 0.75rem;
      letter-spacing: 0.04em;
      color: #6c757d;
      border-bottom: 2px solid #e9ecef;
    }

    .table-striped tbody tr:nth-of-type(odd) {
      background-color: #f9fbfd;
    }

    .table-hover tbody tr:hover {
      background-color: #eef2f7;
    }

    .badge-status {
      padding: 6px 12px;
      border-radius: 30px;
      font-size: 0.75rem;
      font-weight: 500;
    }

    .badge-out {
      background-color: #ffe6e6;
      color: #dc3545;
    }

    .badge-in {
      background-color: #e6f4ea;
      color: #28a745;
    }

    .table td,
    .table th {
      vertical-align: middle;
      font-size: 0.85rem;
      padding: 12px 16px;
    }
  </style>

  <div class="container  p-3">
    <h4 class="mb-4 text-center ">View Product List</h4>

  <div class="d-flex justify-content-between align-items-center mb-3 flex-wrap gap-2 table-control-wrapper">

    <div class="d-flex align-items-center gap-2 flex-wrap">
      
      <label for="showEntries">Showing</label>
      <select id="showEntries" class="form-select form-select-sm" style="width: 70px;">
        <option selected>10</option>
        <option>25</option>
        <option>50</option>
      </select>
    </div>

    <input type="text" class="form-control w-50 flex-grow-1 " placeholder="Search here..." />

    <a href="./Add-Product.php" class="btn add-btn"><i class="bi bi-plus"></i> Add new</a>
  </div>


  <style>
    .product-img {
      width: 50px;
      height: 50px;
      object-fit: cover;
      border-radius: 8px;
      box-shadow: 0 2px 6px rgba(0,0,0,0.1);
    }
    .table thead th {
      text-transform: uppercase;
      font-size: 0.85rem;
      letter-spacing: 0.05em;
      background-color: #f8f9fa;
    }
    .table td, .table th {
      vertical-align: middle;
    }
    .badge-status {
      padding: 5px 10px;
      border-radius: 20px;
      font-size: 0.75rem;
      font-weight: 600;
    }
    .badge-out {
      background-color: #ffe5e5;
      color: #d9534f;
    }
    .badge-in {
      background-color: #e0f7e9;
      color: #28a745;
    }
  </style>

  <div class="table-responsive">
    <table class="table table-hover table-borderless table-striped align-middle">
      <thead class="">
        <tr>
          <th>Product</th>
          <th>ID</th>
          <th>Price</th>
          <th>Quantity</th>
          <th>Sale</th>
          <th>Stock Status</th>
          <th>Start Date</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $sql = "SELECT DISTINCT 
      products.id, 
      products.name, 
      products.status AS status, 
      products.description, 
      products.price, 
      brand.name AS brand, 
      product_images.image_url
  FROM products
  INNER JOIN product_images ON product_images.product_id = products.id
  INNER JOIN brand ON brand.id = products.brand_id
  ORDER BY products.id DESC";
        $result = $conn->query($sql);
        while ($row = $result->fetch_assoc()) {
        ?>
          <tr>
            <td>
              <div class="d-flex align-items-center gap-2">
                <img src="../uploads/<?= $row['image_url']; ?>" alt="Product" class="product-img">
                <div>
                  <strong><?= $row['name'] ?></strong><br>
                  <small class="text-muted"><?= $row['brand'] ?></small>
                </div>
              </div>
            </td>
            <td class="text-muted">#<?= $row['id'] ?></td>
            <td><strong>$<?= number_format($row['price'], 2) ?></strong></td>
            <td>1,638</td>
            <td>20</td>
            <td>
              <span class="badge text-bg-danger p-2 "><?= $row['status'] ?></span>
            </td>
            <td>28 June 2025</td>
          </tr>
        <?php } ?>
      </tbody>
    </table>
  </div>


      
<?php include("./Includes/footer.html"); ?>