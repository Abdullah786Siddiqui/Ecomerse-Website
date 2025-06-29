<?php
include("./includes/header.html");
include("./Sidebar.php");
?>
 <style>
 

 /* .out-of-stock {
    color: #ff6600;
    background-color: #ffe6cc;
    padding: 2px 8px;
    border-radius: 5px;
    font-size: 0.8rem;
    white-space: nowrap;
  }   */

  .add-btn {
    background-color: #f1f1ff;
    border: 1px solid #ddd;
    color: #007bff;
  }
  @media (max-width: 768px) {
  .table-control-wrapper {
    flex-direction: column;
    align-items: stretch;
  }

  .table-control-wrapper > div,
  .table-control-wrapper > input,
  .table-control-wrapper > button {
    width: 100% !important;
  }

  .table-control-wrapper input {
    margin-top: 8px;
    margin-bottom: 8px;
  }

  .add-btn {
    width: 100%;
    text-align: center;
  }
} 




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
  <table class="table table-hover table-striped align-middle">
    <thead class="table-light">
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
ORDER BY products.id ASC";
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

<!-- 
<div class="container">
  <h2 class="text-center my-4">Show Product</h2>

  <div class="main">
    <div class="table-responsive"> 
      <table class="table table-bordered table-striped text-center align-middle">
        <thead class="table-dark">
          <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Description</th>
            <th scope="col">Price</th>
            <th scope="col">Brand</th>
            <th scope="col">Image</th>
            <th scope="col">Edit</th>
            <th scope="col">Delete</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $sql = "SELECT products.id , products.name  , products.description , products.price , brand.name as brand , product_images.image_url  FROM products
INNER JOIN product_images on product_images.product_id = products.id
INNER JOIN brand on brand.id = products.brand_id";
          $result = $conn->query($sql);
          while ($row = $result->fetch_assoc()) {

          ?>
            <tr>
              <td><?= $row['id'] ?></td>
              <td><?= $row['name'] ?></td>
              <td><?= $row['description'] ?></td>
              <td><?= $row['price'] ?></td>
              <td><?= $row['brand'] ?></td>
              <td><img style="border-radius: 50% ; object-fit: cover;" src="../uploads/<?= $row['image_url']; ?>" width="50" height="50" alt="Product_Image"></td>
              <td><a href="#" class="btn btn-success">Edit</a></td>
              <td><a href="#" class="btn btn-danger">Delete</a></td>


            </tr>
          <?php


          }
          ?>
        </tbody>
      </table>
    </div>
  </div>
</div> -->
<?php include("./Includes/footer.html"); ?>