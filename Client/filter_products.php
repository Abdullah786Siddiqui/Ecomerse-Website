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
  ?>
     <div class="col-sm-6 col-md-4 mb-4 product-card-animate">
                                <div class="card border-0 shadow-sm rounded-4 h-100 p-3 position-relative">

                                    <!-- Discount Badge -->
                                    <span class="badge bg-danger position-absolute top-0 start-0 m-2 small">25% OFF</span>

                                    <!-- Product Image -->
                                    <img src="../Server/uploads/<?= $row['image_url']; ?>" class="img-fluid rounded-3 mb-2" alt="Product">

                                    <!-- Product Name -->
                                    <h6 class="fw-semibold mb-1 text-truncate"><?= $row['name'] ?></h6>

                                    <!-- Price -->
                                    <p class="mb-1">
                                        <span class="fw-bold text-success">Rs.<?= $row['price'] ?></span>
                                        <small class="text-muted text-decoration-line-through ms-2">Rs.1,120</small>
                                    </p>

                                    <!-- Rating -->
                                    <div class="text-warning small mb-2">★★★★☆ <span class="text-muted">(1)</span></div>

                                    <!-- Action Button -->
                                    <a href="./product-detail.php?productid=<?= $row['id'] ?>" class="btn btn-sm btn-outline-primary w-100 fw-semibold mb-2">View Details</a>
                                    <a class="btn btn-primary fw-bold w-100" onclick="addToCart(<?= $product_id ; ?>)">Add to Cart</a>

                                </div>
                            </div>
    <?php } ?>
</div>
    ,<script src="../Client/Assets/JS/cart.js"></script>

 <?php
  
  include './Components/footer.html';
?>