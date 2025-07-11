<?php
include_once 'Components/header.html';
include_once './includes/Navbar.php';


?>

<!-- Carousel Section -->
<div id="proCarousel" class="carousel slide carousel-fade" data-bs-ride="carousel" data-bs-interval="3000">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#proCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#proCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#proCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
  </div>

  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="../Client/Assets/Images/1.png" class="d-block w-100 img-fluid" alt="Slide 1">
    </div>
    <div class="carousel-item">
      <img src="../Client/Assets/Images/2.png" class="d-block w-100 img-fluid" alt="Slide 2">
    </div>
    <div class="carousel-item">
      <img src="../Client/Assets/Images/3.png" class="d-block w-100 img-fluid" alt="Slide 3">
    </div>
  </div>
</div>

<!-- <a class="text-black" href="./products.php?subcategory_id=89">link hey ye</a> -->

<!-- Featured Products -->
<div class="container py-5">
  <h2 class="text-center mb-3">Browse by Category</h2>
  <div class="row g-4">

    <!-- Category 1 -->
    <div class="col-6 col-sm-4 col-md-3 col-lg-2 ">
      <div class="text-center category-card p-3 bg-white">
        <img src="https://cdn-icons-png.flaticon.com/128/2278/2278984.png" alt="Electronics" class="category-icon mb-2">
        <div class="category-title">Electronics</div>
      </div>
    </div>


    <!-- Category 2 -->
    <div class="col-6 col-sm-4 col-md-3 col-lg-2">
      <div class="text-center category-card p-3 bg-white">
        <img src="https://cdn-icons-png.flaticon.com/128/12516/12516451.png" alt="Fashion" class="category-icon mb-2">
        <div class="category-title">Fashion</div>
      </div>
    </div>



    <!-- Category 9 -->
    <div class="col-6 col-sm-4 col-md-3 col-lg-2">
      <div class="text-center category-card p-3 bg-white">
        <img src="https://cdn-icons-png.flaticon.com/128/3075/3075977.png" alt="Grocery" class="category-icon mb-2">
        <div class="category-title">Grocery</div>
      </div>
    </div>



    <!-- Category 4 -->
    <div class="col-6 col-sm-4 col-md-3 col-lg-2">
      <div class="text-center category-card p-3 bg-white">
        <img src="https://cdn-icons-png.flaticon.com/128/1940/1940922.png" alt="Beauty" class="category-icon mb-2">
        <div class="category-title">Beauty</div>
      </div>
    </div>

    <!-- Category 5 -->
    <div class="col-6 col-sm-4 col-md-3 col-lg-2">
      <div class="text-center category-card p-3 bg-white">
        <img src="https://cdn-icons-png.flaticon.com/128/763/763812.png" alt="Sports" class="category-icon mb-2">
        <div class="category-title">Sports</div>
      </div>
    </div>

    <!-- Category 6 -->
    <div class="col-6 col-sm-4 col-md-3 col-lg-2">
      <div class="text-center category-card p-3 bg-white">
        <img src="https://cdn-icons-png.flaticon.com/128/3145/3145765.png" alt="Books" class="category-icon mb-2">
        <div class="category-title">Books</div>
      </div>
    </div>

  </div>
</div>
 <style>
   .promo-tile {
  position: relative;
  color: #000;
  border-radius: 10px;
  overflow: hidden;
  background-size: cover;
  background-position: center;
  display: flex;
  align-items: flex-start;
  justify-content: flex-start;
  padding: 2rem;            /* bada padding */
  min-height: 300px;        /* bada height */
}

.promo-tile::before {
  content: "";
  position: absolute;
  inset: 0;
   background: rgba(231, 224, 224, 0.5);
  backdrop-filter: blur(1px);
}

.promo-content {
  position: relative;
  z-index: 2;
}

.promo-tile h5, .promo-tile h6 {
  font-weight: bold;
  font-size: 1.5rem;        /* bigger headings */
}

.text-sm {
  font-size: 1rem;          /* slightly bigger subtitle */
  color: #333;
}

.cta {
  color: #e63946;
  font-weight: 600;
  font-size: 1rem;          /* bigger button text */
}

@media (max-width: 576px) {
  .promo-tile {
    min-height: 200px;      /* mobile bhi bada */
    padding: 1.5rem;
  }
}
  </style>
</head>
<body class="bg-light py-4">

  <div class="container-fluid d-flex justify-content-center">
    <div class="row g-3">

      <!-- Macbook Air -->
      <div class="col-12 col-md-6 ">
        <div class="promo-tile h-100 " style="background-image: url('https://images.unsplash.com/photo-1541807084-5c52b6b3adef?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MjB8fGxhcHRvcHxlbnwwfHwwfHx8MA%3D%3D');">
          <div class="promo-content">
            <div class="text-sm">Get up to 15% off</div>
            <h5>New Macbook Air</h5>
            <div class="cta">SHOP NOW</div>
          </div>
        </div>
      </div>

      <!-- Furniture + Shoes + Earbuds -->
      <div class="col-12 col-md-6">
        <div class="row g-3">

          <!-- Furniture Collection -->
          <div class="col-12">
            <div class="promo-tile" style="background-image: url('https://images.unsplash.com/photo-1600585154340-be6161a56a0c?ixlib=rb-4.0.3&auto=format&fit=crop&w=900&q=80');">
              <div class="promo-content">
                <div class="text-sm">Get up to 50% off</div>
                <h5>Furniture Collection</h5>
                <div class="cta">SHOP NOW</div>
              </div>
            </div>
          </div>

          <!-- Shoes -->
          <div class="col-6">
            <div class="promo-tile" style="background-image: url('https://images.unsplash.com/photo-1460353581641-37baddab0fa2?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8Mjd8fHNob2VzfGVufDB8fDB8fHww');">
              <div class="promo-content">
                <div class="text-sm">Get up to 20% off</div>
                <h6>New Shoes Sale</h6>
                <div class="cta">SHOP NOW</div>
              </div>
            </div>
          </div>

          <!-- Earbuds -->
          <div class="col-6">
            <div class="promo-tile" style="background-image: url('https://images.unsplash.com/photo-1699290438461-c89f6db093be?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1yZWxhdGVkfDMwfHx8ZW58MHx8fHx8');">
              <div class="promo-content">
                <div class="text-sm">Get up to 30% off</div>
                <h6>Realme Earbuds</h6>
                <div class="cta">SHOP NOW</div>
              </div>
            </div>
          </div>

        </div>
      </div>

    </div>
  </div>

<!-- <a href="logout.php" class="btn btn-danger">Logout</a> -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


<?php include 'Components/footer.html';


?>