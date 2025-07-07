<?php
include("../Server/Admin-Panel/config/db.php");

$brands = $_POST['brands'] ?? [];
$subactegory_id = $_POST['subcategory_id'] ?? " ";
$brandFilter = '';
if (!empty($brands)) {
  $brandIds = implode(",", array_map('intval', $brands)); // Prevent SQL injection
  $brandFilter = " AND products.brand_id IN ($brandIds)";
}
$sql = "SELECT products.id as id, products.name, products.description, products.price, brand.name as brand, product_images.image_url  
        FROM products
        INNER JOIN product_images ON product_images.product_id = products.id
        INNER JOIN brand ON brand.id = products.brand_id
        WHERE 1 $brandFilter AND products.subcategory_id IN ($subactegory_id)";
$result = $conn->query($sql);



?>


<div class="row mt-4">
  <?php
  while ($row = $result->fetch_assoc()) {
    $product_id = $row['id']
  ?>

    <div class="col-sm-6 col-md-4 mb-4 product-card-animate">
      <a href="./product-detail.php?productid=<?= $product_id; ?>" class="text-decoration-none">
        <div class="card border-0 shadow-sm rounded-4 h-100 p-4 position-relative hover-shadow">

          <!-- Discount Badge -->

          <!-- Product Image -->
          <div class="ratio ratio-1x1 mb-3">
            <img
              src="../Server/uploads/<?= $row['image_url']; ?>"
              class="img-fluid rounded-3 object-fit-cover w-100 h-100"
              alt="<?= htmlspecialchars($row['name']) ?>"
              loading="lazy">
          </div>

          <!-- Product Name -->
          <h5 class="fw-semibold mb-2 text-truncate text-dark"><?= $row['name'] ?></h5>

          <!-- Price -->
          <p class="mb-2">
            <span class="fw-bold text-success fs-6">Rs.<?= $row['price'] ?></span>
            <small class="text-muted text-decoration-line-through ms-2">Rs.1,120</small>
          </p>

          <!-- Rating -->
          <div class="text-warning small">★★★★☆ <span class="text-muted">(1)</span></div>

        </div>
      </a>
    </div>
  <?php } ?>
</div>
<script src="./Assets/JS/cart.js"></script>

<?php

include './Components/footer.html';
?>