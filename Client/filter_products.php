<?php
include("../Server/Admin-Panel/config/db.php");
// include './Components/header.html';
// include './includes/Navbar.php';
$brands = $_POST['brands'] ?? [];
$subactegory_id = $_POST['subcategory_id'] ?? " ";
$brandFilter = '';
if (!empty($brands)) {
  $brandIds = implode(",", array_map('intval', $brands)); // Prevent SQL injection
  $brandFilter = " AND products.brand_id IN ($brandIds)";
}
$sql = "SELECT products.id, products.name, products.description, products.price, brand.name as brand, product_images.image_url  
        FROM products
        INNER JOIN product_images ON product_images.product_id = products.id
        INNER JOIN brand ON brand.id = products.brand_id
        WHERE 1 $brandFilter AND products.subcategory_id IN ($subactegory_id)";
$result = $conn->query($sql);



?>


<div class="row mt-4">
  <?php
  while ($row = $result->fetch_assoc()) {
  ?>
    <div class="col-sm-6 col-md-4 mb-4 product-card-animate">
      <div class="card p-3">
        <div class="discount-badge">25% OFF</div>
        <img src="../Server/uploads/<?= $row["image_url"];  ?>" class="img-fluid mb-2" alt="Product">
        <h6 class="mb-1"><?= $row["name"] ?></h6>
        <p class="mb-1 fw-bold">Rs.<?= $row["price"] ?><span class="old-price">Rs. 1,120</span></p>
        <div class="rating">★★★★☆ (1)</div>
      </div>
    </div>
    <?php } ?>
</div>

 <?php
  
  // include './Components/footer.html';
?>