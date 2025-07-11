<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Promo Grid</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
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
      padding: 1.5rem;
      min-height: 200px;
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
    }

    .text-sm {
      font-size: 0.875rem;
      color: #333;
    }

    .cta {
      color: #e63946;
      font-weight: 600;
      font-size: 0.875rem;
    }

    @media (max-width: 576px) {
      .promo-tile {
        min-height: 150px;
        padding: 1rem;
      }
    }
  </style>
</head>
<body class="bg-light py-4">

  <div class="container">
    <div class="row g-3">

      <!-- Macbook Air -->
      <div class="col-12 col-md-6">
        <div class="promo-tile h-100" style="background-image: url('https://images.unsplash.com/photo-1541807084-5c52b6b3adef?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MjB8fGxhcHRvcHxlbnwwfHwwfHx8MA%3D%3D');">
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

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
