<?php
include './Components/header.html';
include './includes/Navbar.php';
$product_id = $_GET['productid'];

?>
<style>
  body {
    background-color: #ffffff;
    color: #333333;
  }

  .product-img {
    background-color: #f8f9fa;
    height: 300px;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 10px;
    text-align: center;
    border: 1px solid #dee2e6;
    overflow: hidden;
    /* Prevent overflow */
  }

  .product-img img {
    max-width: 100%;
    max-height: 100%;
    object-fit: contain;
  }

  .thumbnail {
    height: 60px;
    background-color: #f1f1f1;
    border-radius: 8px;
    margin-bottom: 10px;
    border: 1px solid #dee2e6;
  }

  .section-title {
    font-weight: bold;
    margin-top: 20px;
    color: #212529;
  }

  .card-light {
    background-color: #fdfdfd;
    border: 1px solid #dee2e6;
    border-radius: 10px;
  }

  .price {
    font-size: 1.5rem;
    color: #28a745;
  }
</style>
</head>

<body>
  <?php

  $sql = "SELECT products.id , products.name  , products.description , products.price , brand.name as brand , product_images.image_url  FROM products
              INNER JOIN product_images on product_images.product_id = products.id
              INNER JOIN brand on brand.id = products.brand_id where products.id = $product_id";
  $result = $conn->query($sql);
  if ($row = $result->fetch_assoc()) {
  ?>
    <div class="container py-5">
      <div class="row g-4">

        <!-- Left Side: Images + Product Details -->
        <div class="col-lg-6 col-md-12">
          <div class="row g-3">

            <!-- Thumbnails -->
            <div class="col-12 col-md-2 d-flex flex-md-column flex-row gap-2">
              <div class="thumbnail flex-fill"></div>
              <div class="thumbnail flex-fill"></div>
              <div class="thumbnail flex-fill"></div>
              <div class="thumbnail flex-fill"></div>
            </div>

            <!-- Main Image -->
            <div class="col-12 col-md-10">
              <div class="product-img mb-3">
                <img src="../Server/uploads/<?= $row['image_url'] ?>" alt="">

              </div>
            </div>
          </div>

          <!-- Product Details -->
          <div class="section-title">Product Details</div>
          <p>
            <?= $row['description'] ?>
          </p>
          <ul>
            <li>Sleek interface</li>
            <li>Customizable settings</li>
            <li>Compatibility with various devices</li>
          </ul>
        </div>

        <!-- Right Side: Purchase Options -->
        <div class="col-lg-6 col-md-12">
          <div class="card card-light p-4 h-100 d-flex flex-column justify-content-between">
            <div>
              <h3><?= $row['name'] ?></h3>
              <p class="text-muted">Apple M1, 8GB RAM</p>
              <p class="price"><?= $row['price'] ?></p>

              <!-- Color Options -->
              <div class="mb-3">
                <label class="form-label">Colour</label>
                <div class="d-flex flex-wrap gap-2">
                  <button type="button" class="btn btn-outline-secondary btn-sm">Green</button>
                  <button type="button" class="btn btn-outline-secondary btn-sm">Pink</button>
                  <button type="button" class="btn btn-outline-secondary btn-sm">Silver</button>
                  <button type="button" class="btn btn-outline-secondary btn-sm">Blue</button>
                </div>
              </div>

              <!-- SSD Options -->
              <div class="mb-3">
                <label class="form-label">SSD Capacity</label>
                <div class="d-flex flex-wrap gap-2">
                  <button type="button" class="btn btn-outline-secondary btn-sm">256GB</button>
                  <button type="button" class="btn btn-outline-secondary btn-sm">512GB</button>
                  <button type="button" class="btn btn-outline-secondary btn-sm">1TB</button>
                </div>
              </div>

              <!-- Shipping -->
              <!-- <a href="../Server/Process/checkout-check.php " onclick="addToCart(<?= $product_id ?>)" class=" text-white btn btn-warning w-100 fw-bold py-2 mb-2">Buy now</a> -->
              <a onclick="buynow(<?= $product_id ?>)" class=" text-white btn btn-warning w-100 fw-bold py-2 mb-2">Buy now</a>
              <!-- Warranty -->
              <!-- <div class="mb-3">
                <label class="form-label">Add Extra Warranty</label>
                <select class="form-select form-select-sm">
                  <option>1 year - $29</option>
                  <option>2 years - $49</option>
                  <option>3 years - $79</option>
                </select>
              </div>
            </div> -->

              <!-- Add to Cart -->
              <button class="btn btn-primary fw-bold w-100" onclick="addToCart(<?= $product_id; ?>)">Add to Cart</button>


            </div>
          </div>

        </div>
      </div>
    <?php
  }

    ?>
    <section class="mt-5" id="reviews-section">
      <!-- Average Rating Summary -->
      <div class="text-center mb-5">
        <h2 class="fw-bold mb-3">What Our Customers Say</h2>
        <div class="d-flex justify-content-center align-items-center mb-2">
          <div class="text-warning fs-2">★★★★★</div>
          <span class="ms-2 fs-4 fw-semibold">4.8/5</span>
        </div>
        <small class="text-muted">Based on <span id="review-count">2</span> verified reviews</small>
      </div>

      <!-- Review List: One Below Another -->
      <div class="review-list mb-5" id="review-list">
        <!-- Review 1 -->
        <div class="card mb-4 border-0 shadow rounded-4">
          <div class="card-body">
            <div class="d-flex justify-content-between mb-2">
              <span class="fw-semibold text-primary">Verified Purchase</span>
              <div class="text-warning small">★★★★☆</div>
            </div>
            <p>The screen quality and performance blew me away. Delivery was super fast too!</p>
            <small class="text-muted">Posted 3 days ago</small>
          </div>
        </div>

        <!-- Review 2 -->
        <div class="card mb-4 border-0 shadow rounded-4">
          <div class="card-body">
            <div class="d-flex justify-content-between mb-2">
              <span class="fw-semibold text-primary">Satisfied User</span>
              <div class="text-warning small">★★★★★</div>
            </div>
            <p>Super smooth experience with the M1 chip. Worth every penny!</p>
            <small class="text-muted">Posted 1 week ago</small>
          </div>
        </div>
      </div>

      <!-- Review Form -->
      <section class="mt-5" id="leave-review-section">
        <div class="card border-0 shadow-lg rounded-4 p-4">
          <h4 class="mb-4 fw-bold text-center text-gradient">Leave Your Review</h4>

          <form id="review-form">

            <!-- Star Rating -->
            <div class="mb-4 text-center">
              <label class="form-label fw-semibold d-block mb-2">Your Rating</label>
              <div class="star-rating d-inline-flex flex-row-reverse gap-1">
                <input type="radio" name="rating" id="star5" value="5" />
                <label for="star5" title="5 stars">★</label>

                <input type="radio" name="rating" id="star4" value="4" />
                <label for="star4" title="4 stars">★</label>

                <input type="radio" name="rating" id="star3" value="3" />
                <label for="star3" title="3 stars">★</label>

                <input type="radio" name="rating" id="star2" value="2" />
                <label for="star2" title="2 stars">★</label>

                <input type="radio" name="rating" id="star1" value="1" />
                <label for="star1" title="1 star">★</label>
              </div>
            </div>

            <!-- Feedback Text -->
            <div class="mb-4">
              <label for="reviewText" class="form-label fw-semibold">Your Feedback</label>
              <textarea class="form-control rounded-3 shadow-sm" id="reviewText" rows="4" placeholder="Share your experience..."></textarea>
            </div>

            <!-- Submit Button -->
            <button type="submit" class="btn btn-gradient w-100 py-2 fw-semibold">Submit Review</button>
          </form>
        </div>
      </section>

      <!-- Custom CSS for Star Rating and Gradient -->
      <style>
        /* Star Rating Styles */
        .star-rating input[type="radio"] {
          display: none;
        }

        .star-rating label {
          font-size: 2rem;
          color: #ddd;
          cursor: pointer;
          transition: color 0.2s;
        }

        .star-rating input[type="radio"]:checked~label,
        .star-rating label:hover,
        .star-rating label:hover~label {
          color: #ffc107;
        }

        /* Gradient Button Style */
        .btn-gradient {
          background: linear-gradient(90deg, #ff7e5f, #feb47b);
          color: white;
          border: none;
        }

        .btn-gradient:hover {
          opacity: 0.9;
        }
      </style>


      <!-- Star Rating CSS -->
      <style>
        .star-rating input[type="radio"] {
          display: none;
        }

        .star-rating label {
          font-size: 2rem;
          color: #ddd;
          cursor: pointer;
          transition: color 0.2s;
        }

        .star-rating input[type="radio"]:checked~label,
        .star-rating label:hover,
        .star-rating label:hover~label {
          color: #ffc107;
        }

        .btn-gradient {
          background: linear-gradient(90deg, #ff7e5f, #feb47b);
          color: white;
          border: none;
        }

        .btn-gradient:hover {
          opacity: 0.9;
        }
      </style>


      <?php include './Components/footer.html';  ?>