<?php

include("./includes/header.html");
include("./config/db.php");
if (session_status() === PHP_SESSION_NONE) {
  session_start();
}


if (isset($_SESSION['admin_id'])) {
  $admin_id = $_SESSION['admin_id'] ?? "";
  $sql = "SELECT * FROM users WHERE id = $admin_id  ";
  $result = $conn->query($sql);
  if ($row = $result->fetch_assoc()) {
    $adminName = $row['name'] ?? "";
  }
}
?>




<style>
  .content-wrapper {
    margin-left: 0;
    transition: margin-left 0.3s ease;
  }

  .content-wrapper.shifted {
    margin-left: 260px;
  }

  .navbar-custom {
    background: linear-gradient(90deg, #ffffff, #f7f8fc);
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
    z-index: 1050;
  }

  .sidebar-toggle-btn {
    border: none;
    background: transparent;
    font-size: 1.8rem;
    color: #1e88e5;
    cursor: pointer;
    transition: transform 0.3s ease, color 0.3s ease;
  }

  .sidebar-toggle-btn:hover {
    transform: rotate(180deg) scale(1.1);
    color: #2563EB;
  }

  .search-bar {
    position: relative;
    width: 300px;
  }

  .search-input {
    border-radius: 30px;
    padding-left: 1rem;
    padding-right: 2.5rem;
    border: 1px solid #e0e0e0;
    box-shadow: none;
    transition: all 0.3s ease;
  }

  .search-input:focus {
    border-color: #2563EB;
    box-shadow: 0 0 10px rgba(63, 81, 181, 0.2);
  }

  .search-btn {
    position: absolute;
    right: 8px;
    top: 50%;
    transform: translateY(-50%);
    background: none;
    border: none;
    color: #555;
    font-size: 1rem;
  }

  .icon-btn {
    background-color: #f5f7fa;
    border-radius: 50%;
    width: 36px;
    height: 36px;
    display: flex;
    align-items: center;
    justify-content: center;
    color: #555;
    position: relative;
    transition: all 0.2s ease;
  }

  .icon-btn:hover {
    background-color: #e3e7ec;
    color: #1a237e;
  }

  .badge {
    font-size: 0.6rem;
    padding: 2px 5px;
  }

  .user-info span {
    font-size: 0.85rem;
  }

  .user-info small {
    font-size: 0.7rem;
  }

  @media (max-width: 1000px) {
    .search-bar {
      display: none !important;
    }

    .admin {
      display: block !important;
    }

    .navbar-nav .nav-item:not(.only-gear) {
      display: none !important;
    }
  }

  @media (max-width: 887px) {
    .navbar-mobile-search {
      display: flex !important;
      flex-grow: 1;
      margin-left: auto;
      margin-right: auto;
    }

    .navbar-desktop-search {
      display: none !important;
    }
  }

  .rotating-gear i {
    animation: spin 4s linear infinite;
  }

  @keyframes spin {
    0% {
      transform: rotate(0deg);
    }

    100% {
      transform: rotate(360deg);
    }
  }

  .sidebar {
    position: fixed;
    top: 0;
    left: -260px;
    width: 260px;
    height: 100%;
    background-color: #fff;
    box-shadow: 2px 0 8px rgba(0, 0, 0, 0.1);
    transition: left 0.3s ease;
    z-index: 1000;
    overflow-y: auto;
  }

  .sidebar {
    left: -260px;
  }

  .sidebar.active {
    left: 0;
  }


  .sidebar .logo {
    padding: 1rem 1.5rem;
    font-size: 1.4rem;
    font-weight: bold;
    color: #2563EB;
    border-bottom: 1px solid #f0f0f0;
    text-decoration: none;
  }

  .sidebar .nav-link {
    padding: 0.75rem 1.5rem;
    color: #333;
    font-weight: 500;
    display: flex;
    align-items: center;
  }

  .sidebar .nav-link:hover,
  .sidebar .nav-link.active {
    background-color: #e9f2ff;
    color: #2563EB;
  }

  .sidebar .nav-link i {
    margin-right: 10px;
    font-size: 1.1rem;
  }

  .sidebar .submenu a {
    padding-left: 2.5rem;
    font-size: 0.85rem;
    color: #555;
    display: block;
    padding-top: 0.4rem;
    padding-bottom: 0.4rem;
  }
</style>
<div class="sidebar active " id="sidebar">
  <div class="logo ">Adminx</div>
  <div id="sidebarAccordion">
    <ul class="nav flex-column">
      <li class="nav-item">
        <a class="nav-link" href="./Dashbboard.php">
          <i class="bi bi-speedometer2"></i> Dashboard
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-bs-toggle="collapse" href="#ecommerceMenu" role="button">
          <i class="bi bi-cart"></i> Ecommerce
        </a>
        <div class="collapse submenu" id="ecommerceMenu" data-bs-parent="#sidebarAccordion">
          <a href="./Add-Product.php" class="nav-link click"><i class="bi bi-plus-circle me-2"></i>Add Product</a>
          <a href="./View-Products.php" class="nav-link click"><i class="bi bi-list-check me-2"></i>Product List</a>

        </div>
      </li>




      <li class="nav-item">
        <a class="nav-link" data-bs-toggle="collapse" href="#orderMenu" role="button">
          <i class="bi bi-receipt"></i> Order
        </a>
        <div class="collapse submenu" id="orderMenu" data-bs-parent="#sidebarAccordion">
          <a href="./View-Orders.php" class="nav-link"><i class="bi bi-card-checklist me-2"></i>Order List</a>




        </div>
      </li>

      <li class="nav-item">
        <a class="nav-link" data-bs-toggle="collapse" href="#userMenu" role="button">
          <i class="bi bi-person"></i> User
        </a>
        <div class="collapse submenu" id="userMenu" data-bs-parent="#sidebarAccordion">
          <a href="./Users.php" class="nav-link ">
            <i class="bi bi-people-fill"></i> User List
          </a>
        </div>
      </li>

      <hr class="w-75 mx-3">

      <li class="nav-item">
        <a class="nav-link" href="../Process/logout-admin.php">
          <i class="bi bi-box-arrow-right"></i> Logout
        </a>
      </li>

      <!-- Extra Navbar Icons inside Sidebar -->
      <!-- <li class="nav-item">
        <a class="nav-link" data-bs-toggle="collapse" href="#theme" role="button">
          <i class="bi bi-circle-half"></i>Theme Setting
        </a>
        <div class="collapse submenu" id="theme" data-bs-parent="#sidebarAccordion">
          <a href="#" class="nav-link">Dark Mode</a>
          <a href="#" class="nav-link">Light Mode</a>

        </div>
      </li> -->




    </ul>
  </div>
</div>
<div class="content-wrapper shifted" id="contentWrapper">

  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm px-3 py-2 sticky-top">
    <div class="container-fluid d-flex align-items-center">

      <!-- Sidebar Toggle Button -->
      <button id="sidebarToggle" class="sidebar-toggle-btn me-3">
        <i id="toggleIcon" class="bi bi-arrow-right-circle"></i>
      </button>

      <!-- Admin greeting -->
      <h2 class="admin d-none">Hi Admin, <?= $adminName ?></h2>

      <!-- Alternative to Search Bar -->
      <div class="flex-grow-1 me-3">
        <h5 class="mb-0 text-muted">Dashboard</h5>
      </div>

      <!-- Right side icons -->
      <ul class="navbar-nav flex-row align-items-center gap-2">


        <li class="nav-item">
          <a class="nav-link icon-btn" href="#">
            <i class="bi bi-moon"></i>
          </a>
        </li>

        <li class="nav-item position-relative">
          <a class="nav-link icon-btn" href="#">
            <i class="bi bi-bell"></i>
            <span class="badge bg-danger rounded-pill position-absolute top-0 start-100 translate-middle">1</span>
          </a>
        </li>

        <li class="nav-item position-relative">
          <a class="nav-link icon-btn" href="#">
            <i class="bi bi-chat-dots"></i>
            <span class="badge bg-primary rounded-pill position-absolute top-0 start-100 translate-middle">1</span>
          </a>
        </li>

        <li class="nav-item">
          <a class="nav-link icon-btn" href="#">
            <i class="bi bi-arrows-fullscreen"></i>
          </a>
        </li>

        <li class="nav-item">
          <a class="nav-link icon-btn" href="#">
            <i class="bi bi-grid-3x3-gap"></i>
          </a>
        </li>

        <!-- User Info -->
        <li class="nav-item d-flex align-items-center ms-2">
          <a><img src="./assets/Images/Abdullah.jpg"
              class="shadow-sm me-2"
              style="border-radius: 50%; object-fit: cover;"
              width="50" height="50" alt="User">
          </a>
          <div class="user-info">
            <span class="fw-semibold "><?= $adminName ?></span><br>
            <small class="text-muted fw-bolder">Admin</small>
          </div>
        </li>

      </ul>
    </div>
  </nav>






  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

  <script>
    document.addEventListener('DOMContentLoaded', function() {
      document.querySelectorAll('.nav-link[data-bs-toggle="collapse"]').forEach(function(link) {
        link.addEventListener('click', function(e) {
          var targetSelector = link.getAttribute('href');
          var target = document.querySelector(targetSelector);

          if (target) {
            var bsCollapse = bootstrap.Collapse.getOrCreateInstance(target);

            if (target.classList.contains('show')) {
              // Agar already open hai, to band kar
              bsCollapse.hide();
              e.preventDefault(); // Bootstrap ka default toggle prevent kar
            } else {
              // Agar band hai to khol de
              bsCollapse.show();
              e.preventDefault(); // Bootstrap ka default toggle prevent kar
            }
          }
        });
      });
    });

    const sidebar = document.getElementById('sidebar');
    const contentWrapper = document.getElementById('contentWrapper');
    const sidebarToggle = document.getElementById('sidebarToggle');
    const toggleIcon = document.getElementById('toggleIcon');

    sidebarToggle.addEventListener('click', () => {
      sidebar.classList.toggle('active');
      contentWrapper.classList.toggle('shifted');

      if (sidebar.classList.contains('active')) {
        toggleIcon.classList.remove('bi-arrow-right-circle');
        toggleIcon.classList.add('bi-arrow-left-circle');
      } else {
        toggleIcon.classList.remove('bi-arrow-left-circle');
        toggleIcon.classList.add('bi-arrow-right-circle');
      }
    });
  </script>


  <?php include("./Includes/footer.html"); ?>