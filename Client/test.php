<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>User Wishlist</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<style>
    body {
        background: linear-gradient(to right, #f0f4f8, #e4ebf1);
        font-family: 'Segoe UI', sans-serif;
    }
    .wishlist-header {
        text-align: center;
        padding: 30px 0;
        font-weight: 700;
        font-size: 2rem;
        color: #37474f;
    }
    .wishlist-card {
        background: #fff;
        border-radius: 15px;
        overflow: hidden;
        box-shadow: 0 4px 20px rgba(0,0,0,0.1);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }
    .wishlist-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 8px 30px rgba(0,0,0,0.15);
    }
    .wishlist-card img {
        height: 200px;
        width: 100%;
        object-fit: cover;
    }
    .wishlist-card .card-body {
        text-align: center;
    }
    .wishlist-card .card-title {
        font-size: 1.2rem;
        font-weight: 600;
        color: #455a64;
    }
    .wishlist-card .card-text {
        color: #78909c;
    }
    .btn-remove {
        background: #ef5350;
        border: none;
        color: #fff;
    }
    .btn-remove:hover {
        background: #e53935;
    }
    .btn-cart {
        background: #42a5f5;
        border: none;
        color: #fff;
    }
    .btn-cart:hover {
        background: #1e88e5;
    }
</style>
</head>
<body>

<div class="wishlist-header">💖 Your Wishlist</div>

<div class="container">
  <div class="row g-4">
    <!-- Product 1 -->
    <div class="col-lg-4 col-md-6">
      <div class="wishlist-card">
        <img src="https://via.placeholder.com/400x300" alt="Product 1">
        <div class="card-body">
          <h5 class="card-title">Stylish Headphones</h5>
          <p class="card-text">$89.99</p>
          <div class="d-flex justify-content-around mt-3">
            <button class="btn btn-remove btn-sm px-3">Remove</button>
            <button class="btn btn-cart btn-sm px-3">Add to Cart</button>
          </div>
        </div>
      </div>
    </div>

    <!-- Product 2 -->
    <div class="col-lg-4 col-md-6">
      <div class="wishlist-card">
        <img src="https://via.placeholder.com/400x300" alt="Product 2">
        <div class="card-body">
          <h5 class="card-title">Smart Watch</h5>
          <p class="card-text">$129.99</p>
          <div class="d-flex justify-content-around mt-3">
            <button class="btn btn-remove btn-sm px-3">Remove</button>
            <button class="btn btn-cart btn-sm px-3">Add to Cart</button>
          </div>
        </div>
      </div>
    </div>

    <!-- Product 3 -->
    <div class="col-lg-4 col-md-6">
      <div class="wishlist-card">
        <img src="https://via.placeholder.com/400x300" alt="Product 3">
        <div class="card-body">
          <h5 class="card-title">Trendy Sneakers</h5>
          <p class="card-text">$59.99</p>
          <div class="d-flex justify-content-around mt-3">
            <button class="btn btn-remove btn-sm px-3">Remove</button>
            <button class="btn btn-cart btn-sm px-3">Add to Cart</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
<script>
  // GSAP animation on page load
  gsap.from(".wishlist-card", {
    opacity: 0,
    y: 50,
    duration: 1,
    stagger: 0.2,
    ease: "power2.out"
  });
</script>

</body>
</html>
