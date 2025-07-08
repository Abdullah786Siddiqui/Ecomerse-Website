<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Product Detail Page</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

  <div class="container py-5">
    <div class="row g-4">
      <?php

      $sql = "SELECT products.id , products.name  , products.description , products.price , brand.name as brand , product_images.image_url  FROM products
              INNER JOIN product_images on product_images.product_id = products.id
              INNER JOIN brand on brand.id = products.brand_id where products.id = $product_id";
      $result = $conn->query($sql);
      if ($row = $result->fetch_assoc()) {
      ?>
        <div class="col-md-6">
          <div class="border rounded p-3 text-center">
            <img src="../Server/uploads/<?= $row['image_url'] ?>"alt="Product Image" class="img-fluid rounded">
          </div>
        </div>

        <!-- Product Details -->
        <div class="col-md-6 d-flex flex-column">
          <h1 class="h4 mb-2"><?= $row['name'] ?>l</h1>
          <p class="text-muted mb-1">SKU: 123456</p>
          <div class="mb-2">
            ⭐⭐⭐⭐☆ <small>(128 reviews)</small>
          </div>
          <div class="mb-3">
            <span class="h4 text-danger">$<?= $row['price'] ?></span>
            <del class="text-muted ms-2">$129.99</del>
          </div>
          <p class="small text-success mb-3">In Stock</p>
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla fermentum blandit dolor, vel convallis mauris faucibus sed.</p>

         

          <button class="btn btn-primary btn-lg w-100 mb-2">Add to Cart</button>
          <button class="btn btn-outline-secondary w-100 mb-3">Add to Wishlist</button>

          <!-- Product Description (for mobile) -->
       
        </div>

        <!-- Product Description on desktop -->
        <div class="col-md-6 mt-4 d-none d-md-block">
          <h5>Product Description</h5>
          <p class="small">
            <?= $row['description'] ?>
          </p>
        </div>
    </div>
  <?php } ?>
  <!-- Tabs -->
  <div class="row mt-5">
    <div class="col-12">
      <ul class="nav nav-tabs" id="productTabs" role="tablist">
        <li class="nav-item" role="presentation">
          <button class="nav-link active" id="details-tab" data-bs-toggle="tab" data-bs-target="#details" type="button" role="tab">
            Details
          </button>
        </li>
        <li class="nav-item" role="presentation">
          <button class="nav-link" id="reviews-tab" data-bs-toggle="tab" data-bs-target="#reviews" type="button" role="tab">
            Reviews
          </button>
        </li>
      </ul>
      <div class="tab-content p-3 border border-top-0" id="productTabsContent">
        <div class="tab-pane fade show active" id="details" role="tabpanel">
          <p>Full product details will appear here.</p>
        </div>
        <div class="tab-pane fade" id="reviews" role="tabpanel">
          <p>Customer reviews will appear here.</p>
        </div>
      </div>
    </div>
  </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>