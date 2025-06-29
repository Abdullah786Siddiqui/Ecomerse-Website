<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Production Level Responsive Navbar</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    .navbar-brand img {
      width: 35px;
    }

    .search-input {
      border-radius: 50px;
      background-color: #f1f3f5;
      border: none;
      padding-left: 1rem;
    }

    .search-input::placeholder {
      color: #6c757d;
    }

    .search-button {
      border-radius: 50px;
    }

    .nav-link {
      font-weight: 500;
    }

    .badge {
      font-size: 0.7rem;
    }

    .category-scroll {
      overflow-x: auto;
      white-space: nowrap;
      -webkit-overflow-scrolling: touch;
    }

    .category-scroll::-webkit-scrollbar {
      display: none;
    }

    .category-scroll .nav-link {
      display: inline-block;
      padding-left: 0.75rem;
      padding-right: 0.75rem;
      color: white;
    }

    .dropdown-menu {
      position: absolute;
    }

    /* Responsive tweaks */
    @media (max-width: 576px) {
      .search-row {
        order: 2;
        width: 100%;
        margin-top: 0.5rem;
      }

      .top-icons {
        order: 1;
        margin-left: auto;
      }
    }
  </style>
</head>
<body>

<!-- Top Navbar -->
<nav class="navbar navbar-expand-sm px-3 py-2 position-relative" style="background-color: #1F2937; z-index: 1030;">
  <div class="container-fluid flex-wrap align-items-start">

    <!-- Logo -->
    <a class="navbar-brand d-flex align-items-center text-white" href="#">
      <img src="https://flowbite.com/docs/images/logo.svg" alt="Logo">
      <span class="ms-2 fw-bold">Alexa</span>
    </a>

    <!-- Search -->
    <form class="d-flex flex-grow-1 mx-sm-3 my-2 my-sm-0 search-row">
      <input class="form-control search-input me-2" type="search" placeholder="Search for products, brands and more">
      <button class="btn btn-primary search-button px-3" type="submit">🔍</button>
    </form>

    <!-- Right Icons -->
    <ul class="navbar-nav flex-row top-icons align-items-center">
      <!-- Favorites -->
      <li class="nav-item position-relative me-3">
        <a class="nav-link text-white" href="#">❤️</a>
        <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">6</span>
      </li>

      <!-- Cart Dropdown -->
      <li class="nav-item dropdown position-static me-3">
        <a class="nav-link dropdown-toggle text-white" href="#" role="button" data-bs-toggle="dropdown">🛒</a>
        <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">2</span>
        <ul class="dropdown-menu dropdown-menu-dark dropdown-menu-end p-3 mt-2 shadow" style="min-width: 320px; right: 0; top: 100%;">
          <h6 class="dropdown-header text-center text-white">Your shopping cart</h6>
          <div class="progress mb-3" style="height: 6px;">
            <div class="progress-bar bg-success" style="width: 75%;"></div>
          </div>
          <div class="d-flex justify-content-between align-items-center mb-2">
            <div>
              <p class="mb-0 fw-semibold">iPhone 15</p>
              <small>$1,299</small>
            </div>
            <div class="d-flex align-items-center">
              <button class="btn btn-sm btn-outline-light me-1">-</button>
              <span>2</span>
              <button class="btn btn-sm btn-outline-light ms-1">+</button>
              <button class="btn btn-sm btn-danger ms-2">🗑</button>
            </div>
          </div>
        </ul>
      </li>

      <!-- Account Dropdown -->
      <li class="nav-item dropdown position-static">
        <a class="nav-link dropdown-toggle text-white" href="#" role="button" data-bs-toggle="dropdown">👤</a>
        <ul class="dropdown-menu dropdown-menu-dark dropdown-menu-end p-3 mt-2 shadow" style="width: 240px; right: 0; top: 100%;">
          <div class="d-flex align-items-center mb-3">
            <img src="https://flowbite.com/docs/images/people/profile-picture-5.jpg" alt="User" width="45" class="rounded-circle me-2">
            <div>
              <p class="mb-0 fw-bold">Hello, Jese</p>
              <small>name@example.com</small>
            </div>
          </div>
          <a class="btn btn-outline-light btn-sm w-100 mb-2" href="#">View Profile</a>
          <div class="list-group list-group-flush">
            <a href="#" class="list-group-item list-group-item-action bg-dark text-white border-0">My Account</a>
            <a href="#" class="list-group-item list-group-item-action bg-dark text-white border-0">My Wallet</a>
            <a href="#" class="list-group-item list-group-item-action bg-dark text-white border-0">My Orders</a>
          </div>
        </ul>
      </li>
    </ul>
  </div>
</nav>

<!-- Categories Navbar -->
<nav class="navbar navbar-dark bg-secondary px-3">
  <div class="container-fluid category-scroll">
    <ul class="navbar-nav flex-row mb-0">
      <li class="nav-item"><a class="nav-link" href="#">Home</a></li>
      <li class="nav-item"><a class="nav-link" href="#">Best Sellers</a></li>
      <li class="nav-item"><a class="nav-link" href="#">Gift Ideas</a></li>
      <li class="nav-item"><a class="nav-link" href="#">Games</a></li>
      <li class="nav-item"><a class="nav-link" href="#">PC</a></li>
      <li class="nav-item"><a class="nav-link" href="#">Music</a></li>
      <li class="nav-item"><a class="nav-link" href="#">Books</a></li>
      <li class="nav-item"><a class="nav-link" href="#">Electronics</a></li>
      <li class="nav-item"><a class="nav-link" href="#">Home & Garden</a></li>
    </ul>
  </div>
</nav>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
