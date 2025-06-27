<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Product Table UI</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    .product-img {
      width: 40px;
      height: 40px;
      object-fit: cover;
    }
    .out-of-stock {
      color: #ff6600;
      background-color: #ffe6cc;
      padding: 2px 8px;
      border-radius: 5px;
      font-size: 0.8rem;
      white-space: nowrap;
    }
    .add-btn {
      background-color: #f1f1ff;
      border: 1px solid #ddd;
      color: #007bff;
    }
  </style>
</head>
<body>

<div class="container mt-4">
  <div class="d-flex justify-content-between align-items-center mb-3 flex-wrap gap-2">
    <div class="d-flex align-items-center gap-2">
      <label for="showEntries">Showing</label>
      <select id="showEntries" class="form-select form-select-sm" style="width: 70px;">
        <option selected>10</option>
        <option>25</option>
        <option>50</option>
      </select>
      <span>entries</span>
    </div>
    <input type="text" class="form-control w-auto" placeholder="Search here..." />
    <button class="btn add-btn"><i class="bi bi-plus"></i> Add new</button>
  </div>

  <div class="table-responsive">
    <table class="table table-hover align-middle">
      <thead class="table-light">
        <tr>
          <th>Product</th>
          <th>Product ID</th>
          <th>Price</th>
          <th>Quantity</th>
          <th>Sale</th>
          <th>Stock</th>
          <th>Start date</th>
        </tr>
      </thead>
      <tbody>
        <!-- Sample Row (repeat this structure) -->
        <tr>
          <td>
            <div class="d-flex align-items-center gap-2">
              <img src="https://via.placeholder.com/40" alt="Product" class="product-img rounded">
              <span>Dog Food, Chicken & Chicken Liver Recipe…</span>
            </div>
          </td>
          <td>#7712309</td>
          <td>$1,452.500</td>
          <td>1,638</td>
          <td>20</td>
          <td><span class="out-of-stock">Out of stock</span></td>
          <td>$28,672.36</td>
        </tr>
        <!-- Duplicate above row for more items -->
      </tbody>
    </table>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
</body>
</html>
