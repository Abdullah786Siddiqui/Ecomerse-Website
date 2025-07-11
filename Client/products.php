<?php
include './Components/header.html';
include './includes/Navbar.php';


$subCategory_id = isset($_GET['subcategory_id']) ? (int)$_GET['subcategory_id'] : 0;
$search_id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

?>
<style>
  body {
    background-color: #f8f9fa;
    font-family: 'Segoe UI', sans-serif;
  }

  .filter-sidebar {
    background: #fff;
    border-radius: 0.75rem;
    box-shadow: 0 0 15px rgba(0, 0, 0, 0.04);
    padding: 1.5rem;
  }

  .filter-sidebar h5 {
    font-size: 1.1rem;
    margin-bottom: 1rem;
  }

  .filter-group:not(:last-child) {
    margin-bottom: 1.5rem;
  }

  .filter-group label {
    font-size: 0.95rem;
    margin-left: 0.5rem;
    color: #333;
  }

  .product-card {
    background: #fff;
    border-radius: 0.75rem;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.04);
    transition: all 0.2s ease-in-out;
    overflow: hidden;
    text-decoration: none;
    color: inherit;
    display: block;
  }

  .product-card:hover {
    transform: translateY(-4px);
    box-shadow: 0 6px 20px rgba(0, 0, 0, 0.06);
  }

  .product-card img {
    width: 100%;
    height: 180px;
    object-fit: cover;
  }

  .product-card-body {
    padding: 0.75rem;
  }

  .product-name {
    font-weight: 600;
    font-size: 0.95rem;
    margin-bottom: 0.3rem;
  }

  .product-price {
    font-size: 0.9rem;
    color: #0d6efd;
    font-weight: 500;
    margin-bottom: 0.3rem;
  }

  .product-description {
    font-size: 0.8rem;
    color: #666;
  }

  .offcanvas-body {
    overflow-y: auto !important;
    /* scroll bar control */
  }

  @media (max-width: 767.98px) {
    .product-card img {
      height: 140px;
    }
  }

  @media (max-width: 767.98px) {
    .offcanvas-bottom {
      min-height: 60vh !important;
    }
  }
</style>
<!-- Skeleton Loader -->

<div class="mx-3 mt-4 " id="skeleton-loader" style="display:none;">
   <div class="row">
    <!-- Sidebar Skeleton -->
    <aside class="col-lg-3 d-none d-lg-block">
      <div class="filter-sidebar bg-light border rounded p-4 h-100 shadow-sm bg-white">
        <h5 class="mb-4 text-primary">Filter Products</h5>
        <div class="filter-group mb-3">
          <h6 class="text-muted mb-3 border-bottom pb-2">Brand</h6>
          <div class="skeleton skeleton-check mb-3"></div>
          <div class="skeleton skeleton-check mb-3"></div>
          <div class="skeleton skeleton-check mb-3"></div>
          <div class="skeleton skeleton-check mb-3"></div>
        </div>
      </div>
    </aside>

    <!-- Main Content Skeleton -->
    <main class="col-lg-9">
      <div id="product-list">
        <div class="row g-4">
          <div class="col-sm-6 col-md-4 mb-4">
            <div class="card border-0 shadow-sm rounded-4 h-100 p-4 position-relative">
              <div class="ratio ratio-1x1 mb-4 skeleton skeleton-img"></div>
              <div class="skeleton skeleton-title mb-3"></div>
              <div class="skeleton skeleton-price mb-3"></div>
              <div class="skeleton skeleton-rating"></div>
            </div>
          </div>
          <div class="col-sm-6 col-md-4 mb-4">
            <div class="card border-0 shadow-sm rounded-4 h-100 p-4 position-relative">
              <div class="ratio ratio-1x1 mb-4 skeleton skeleton-img"></div>
              <div class="skeleton skeleton-title mb-3"></div>
              <div class="skeleton skeleton-price mb-3"></div>
              <div class="skeleton skeleton-rating"></div>
            </div>
          </div>
          <div class="col-sm-6 col-md-4 mb-4">
            <div class="card border-0 shadow-sm rounded-4 h-100 p-4 position-relative">
              <div class="ratio ratio-1x1 mb-4 skeleton skeleton-img"></div>
              <div class="skeleton skeleton-title mb-3"></div>
              <div class="skeleton skeleton-price mb-3"></div>
              <div class="skeleton skeleton-rating"></div>
            </div>
          </div>
        </div>
      </div>
    </main>
  </div>
</div>

<style>
  .skeleton {
  background: linear-gradient(-90deg, #e2e2e2 0%, #f0f0f0 50%, #e2e2e2 100%);
  background-size: 400% 400%;
  animation: shimmer 2s ease-in-out infinite; /* slower and softer */
  border-radius: 6px;
}

.skeleton-img {
  width: 100%;
  height: 0;
  padding-top: 110%; /* bigger square */
  border-radius: 12px;
}

.skeleton-title {
  width: 85%;
  height: 22px;
}

.skeleton-price {
  width: 55%;
  height: 18px;
}

.skeleton-rating {
  width: 40%;
  height: 14px;
}

.skeleton-check {
  width: 75%;
  height: 20px;
  border-radius: 4px;
}

@keyframes shimmer {
  0% { background-position: -300% 0; }
  100% { background-position: 300% 0; }
}

</style>
<div id="main-content" style="display:none;">


  <div class="container-fluid mt-4">
    <div class="row">
      <!-- Sidebar Desktop -->
      <aside class="col-lg-3 d-none d-lg-block  ">
        <div class="filter-sidebar bg-light border rounded p-3 h-100 shadow-sm bg-white">
          <h5 class="mb-4 text-primary">Filter Products</h5>

          <div class="filter-group mb-3">
            <h6 class="text-muted mb-3 border-bottom pb-1">Brand</h6>

            <?php
            $sql = "
      SELECT DISTINCT brand.id AS id, brand.name, products.subcategory_id AS subcategory_id
      FROM products
      INNER JOIN brand ON brand.id = products.brand_id
      WHERE products.subcategory_id = $subCategory_id OR products.id = $search_id
    ";
            $result = $conn->query($sql);
            while ($row = $result->fetch_assoc()) {
              $brand_id = $row['id'];
              $brand_name = $row['name'];
            ?>
              <div class="form-check mb-2">
                <input
                  class="form-check-input brand-filter"
                  type="checkbox"
                  value="<?= $brand_id ?>"
                  id="brand<?= $brand_id ?>"
                  <?= $search_id != 0 ? 'disabled' : '' ?>>
                <label class="form-check-label" for="brand<?= $brand_id ?>">
                  <?= htmlspecialchars($brand_name) ?>
                </label>
              </div>
            <?php } ?>
          </div>
        </div>

      </aside>
      <div class="mt-1 text-end d-lg-none  mb-2">
        <button class="btn btn-sm btn-outline-primary" type="button" data-bs-toggle="offcanvas" data-bs-target="#mobileFilters">
          Filters
        </button>
      </div>

      <!-- Main Content -->
      <main class="col-lg-9">
        <div id="product-list">
          <div class="row g-3">
            <?php
            $sql = "SELECT DISTINCT products.id as productid , products.name , products.description , products.price , brand.name as brand , product_images.image_url  
                FROM products
                INNER JOIN product_images ON product_images.product_id = products.id
                INNER JOIN brand ON brand.id = products.brand_id  
                WHERE products.subcategory_id = $subCategory_id  or products.id = $search_id   ORDER BY products.id DESC";
            $result = $conn->query($sql);
            while ($row = $result->fetch_assoc()) {
              $product_id = $row['productid']
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


            <!-- Add more product cards here -->
          </div>

          <!-- Mobile filter button niche -->


      </main>
    </div>
  </div>

  <!-- Mobile Offcanvas -->
  <div class="offcanvas offcanvas-bottom d-lg-none" tabindex="-1" id="mobileFilters">
    <div class="offcanvas-header">
      <h5 class="offcanvas-title">Filters</h5>
      <button type="button" class="btn-close" data-bs-dismiss="offcanvas"></button>
    </div>
    <div class="offcanvas-body">
      <div class="filter-sidebar">
        <h5>Filter Products</h5>

        <div class="filter-group">
          <h6 class="text-muted">Brand</h6>
          <?php
          $sql = "SELECT  DISTINCT brand.id as id ,   brand.name , products.subcategory_id as subcategory_id FROM products
INNER JOIN brand on brand.id = products.brand_id where products.subcategory_id = $subCategory_id or products.id = $search_id  ";
          $result = $conn->query($sql);
          while ($row = $result->fetch_assoc()) {
            $brand_id = $row['id'];
            $brand_name = $row['name'];

          ?>
            <div style="font-weight: 500;" class="form-check ">
              <input class="form-check-input brand-filter" type="checkbox" value="<?= $brand_id ?>" id="brand<?= $brand_id ?>" <?= $search_id != 0 ?  'disabled ' : '' ?>>

              <label class="form-check-label" for="brand<?= $brand_id ?>"><?= $brand_name ?></label>
            </div>
          <?php
          }
          ?>
        </div>
      </div>
    </div>
  </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
  document.addEventListener("DOMContentLoaded", function() {
    document.getElementById("skeleton-loader").style.display = "block";
    document.getElementById("main-content").style.display = "none";
  });

  window.onload = function() {
    setTimeout(function() { // simulate loading
      document.getElementById("skeleton-loader").style.display = "none";
      document.getElementById("main-content").style.display = "block";
    }, 800); // 800ms loader, adjust as needed
  };

  function animateProductExit(callback) {
    gsap.to('.product-card-animate', {
      y: 30,
      opacity: 0,
      scale: 0.95,
      duration: 0.4,
      stagger: 0.05,
      ease: "power2.in",
      onComplete: callback
    });
  }

  function animateNewProducts() {
    gsap.from('.product-card-animate', {
      y: 20,
      opacity: 0,
      scale: 0.98,
      duration: 0.6,
      stagger: 0.1,
      ease: "power3.out"
    });
  }
  $(document).ready(function() {
    animateNewProducts();
  });

  $('.brand-filter').on('change', function() {
    var selectedBrands = [];

    $('.brand-filter:checked').each(function() {
      selectedBrands.push($(this).val());
    });

    animateProductExit(function() {
      $.ajax({
        url: 'filter_products.php',
        method: 'POST',
        data: {
          brands: selectedBrands,
          subcategory_id: <?= $subCategory_id ?>
        },
        success: function(response) {
          $('#product-list').html(response);
          animateNewProducts();
        }
      });
    });
  });
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
<?php include './Components/footer.html';  ?>