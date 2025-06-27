<?php

include("./includes/header.html");
include("./config/db.php");
session_start();
if (isset($_SESSION['admin_id'])) {
  $admin_id = $_SESSION['admin_id'];
  $sql = "SELECT * FROM users WHERE id = $admin_id  ";
  $result = $conn->query($sql);
  if ($row = $result->fetch_assoc()) {
    $adminName = $row['name'];
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
<div class="sidebar active" id="sidebar">
  <div class="logo ">Admin Panel</div>
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
        <a class="nav-link" data-bs-toggle="collapse" href="#categoryMenu" role="button">
          <i class="bi bi-layers"></i> Category
        </a>
        <div class="collapse submenu" id="categoryMenu" data-bs-parent="#sidebarAccordion">
          <a href="#" class="nav-link"><i class="bi bi-list-ul me-2"></i>All Categories</a>

        </div>
      </li>

      <li class="nav-item">
        <a class="nav-link" data-bs-toggle="collapse" href="#attributesMenu" role="button">
          <i class="bi bi-box"></i> Attributes
        </a>
        <div class="collapse submenu" id="attributesMenu" data-bs-parent="#sidebarAccordion">
          <a href="#" class="nav-link"><i class="bi bi-sliders me-2"></i>All Attributes</a>

        </div>
      </li>

      <li class="nav-item">
        <a class="nav-link" data-bs-toggle="collapse" href="#orderMenu" role="button">
          <i class="bi bi-receipt"></i> Order
        </a>
        <div class="collapse submenu" id="orderMenu" data-bs-parent="#sidebarAccordion">
          <a href="#" class="nav-link"><i class="bi bi-card-checklist me-2"></i>Order List</a>
          <a href="#" class="nav-link"><i class="bi bi-hourglass-split me-2"></i>Pending List</a>
          <a href="#" class="nav-link"><i class="bi bi-check2-circle me-2"></i>Completed List</a>




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


      <li class="nav-item">
        <a class="nav-link" data-bs-toggle="collapse" href="#rolesMenu" role="button">
          <i class="bi bi-shield-lock"></i> Roles
        </a>
        <div class="collapse submenu" id="rolesMenu" data-bs-parent="#sidebarAccordion">
          <a href="#" class="nav-link">Role Management</a>
        </div>
      </li>

      <!-- Extra Navbar Icons inside Sidebar -->
      <li class="nav-item">
        <a class="nav-link" data-bs-toggle="collapse" href="#theme" role="button">
          <i class="bi bi-circle-half"></i>Theme Setting
        </a>
        <div class="collapse submenu" id="theme" data-bs-parent="#sidebarAccordion">
          <a href="#" class="nav-link">Dark Mode</a>
          <a href="#" class="nav-link">Light Mode</a>

        </div>
      </li>


      <li class="nav-item">
        <a class="nav-link" href="#"><i class="bi bi-chat-dots"></i> Messages</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#"><i class="bi bi-arrows-fullscreen"></i> Fullscreen</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#"><i class="bi bi-grid-3x3-gap"></i> Apps</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#"><i class="bi bi-person"></i> Profile</a>
      </li>

    </ul>
  </div>
</div>
<div class="content-wrapper shifted" id="contentWrapper">

  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm px-3 py-2 sticky-top">
    <div class="container-fluid d-flex align-items-center">
      <button id="sidebarToggle" class="sidebar-toggle-btn me-3">
        <i id="toggleIcon" class="bi bi-arrow-right-circle"></i>
      </button>
      <h2 class="admin d-none">Hi Admin, <?= $adminName  ?></h2>

      <form class="search-bar d-flex flex-grow-1 me-3">
        <input type="text" class="form-control search-input" placeholder="Search here...">
        <button class="btn search-btn" type="submit">
          <i class="bi bi-search"></i>
        </button>
      </form>


      <ul class="navbar-nav flex-row align-items-center gap-2">
        <li class="nav-item only-gear">
          <a class="nav-link mx-2 bg-white icon-btn rotating-gear fs-4" href="#"><i class="bi bi-gear"></i></a>
        </li>
        <li class="nav-item">
          <a class="nav-link icon-btn" href="#"><i class="bi bi-moon"></i></a>
        </li>
        <li class="nav-item position-relative">
          <a class="nav-link icon-btn" href="#"><i class="bi bi-bell"></i><span class="badge bg-danger rounded-pill position-absolute top-0 start-100 translate-middle">1</span></a>
        </li>
        <li class="nav-item position-relative">
          <a class="nav-link icon-btn" href="#"><i class="bi bi-chat-dots"></i><span class="badge bg-primary rounded-pill position-absolute top-0 start-100 translate-middle">1</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link icon-btn" href="#"><i class="bi bi-arrows-fullscreen"></i></a>
        </li>
        <li class="nav-item">
          <a class="nav-link icon-btn" href="#"><i class="bi bi-grid-3x3-gap"></i></a>
        </li>
        <li class="nav-item d-flex align-items-center ms-2">
          <img src="./assets/Images/Abdullah.jpg" style="border-radius: 50%; object-fit: cover;" width="50" height="50" class="shadow-sm me-2" alt="User">
          <div class="user-info">
            <span class="fw-semibold"><?= $adminName  ?></span><br>
            <small class="text-muted">Admin</small>
          </div>
        </li>
      </ul>

    </div>
  </nav>






  <!-- <div class="d-flex" id="sidebarContainer" style="min-height: 100vh;"> -->
  <!-- Collapsed Sidebar -->
  <!-- <div id="sidebar-collapsed" class="d-flex flex-column flex-shrink-0 text-bg-dark d-none text-white text-decoration-none" style="width: 4.5rem;">
    <a id="collapsedSidebarToggle" class="d-block p-3 sidebar-toggle-link text-decoration-none" data-bs-toggle="tooltip" data-bs-placement="right" title="Expand Sidebar">
      <i class="fa-solid fa-user-tie fs-1 px-1 text-white"></i>
    </a>

    <ul class="nav nav-pills nav-flush flex-column mb-auto text-center">
      <li class="nav-item">
        <a href="#" class="nav-link sidebar-toggle-link active py-3 border-bottom rounded-0" data-bs-toggle="tooltip" data-bs-placement="right" title="Home">
          <i class="bi bi-house"></i>
        </a>
      </li>
      <li>
        <a href="#" class="nav-link sidebar-toggle-link py-3 border-bottom rounded-0" data-bs-toggle="tooltip" data-bs-placement="right" title="Dashboard">
          <i class="bi bi-speedometer2"></i>
        </a>
      </li>
      <li>
        <a href="#" class="nav-link sidebar-toggle-link py-3 border-bottom rounded-0" data-bs-toggle="tooltip" data-bs-placement="right" title="Products">
          <i class="bi bi-table"></i>
        </a>
      </li>
      <li>
        <a href="#" class="nav-link sidebar-toggle-link py-3 border-bottom rounded-0" data-bs-toggle="tooltip" data-bs-placement="right" title="Categories">
          <i class="bi bi-grid"></i>
        </a>
      </li>
      <li>
        <a href="#" class="nav-link sidebar-toggle-link py-3 border-bottom rounded-0" data-bs-toggle="tooltip" data-bs-placement="right" title="Users">
          <i class="bi bi-people"></i>
        </a>
      </li>
    </ul>

    <div class="dropdown border-top">
      <a href="#" class="d-flex align-items-center justify-content-center p-3 dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
        <img src="https://github.com/mdo.png" alt="User" width="24" height="24" class="rounded-circle">
      </a>
      <ul class="dropdown-menu text-small shadow">
        <li><a class="dropdown-item" href="#">New project...</a></li>
        <li><a class="dropdown-item" href="#">Settings</a></li>
        <li><a class="dropdown-item" href="#">Profile</a></li>
        <li>
          <hr class="dropdown-divider">
        </li>
        <li><a class="dropdown-item" href="#">Sign out</a></li>
      </ul>
    </div>
  </div>

 Expanded Sidebar -->
  <!-- <div id="sidebar-expanded" class="d-flex flex-column flex-shrink-0 p-3 text-bg-dark" style="width: 280px;">
    <div class="d-flex align-items-center justify-content-between  text-white">
      <span class="fs-4"><i class="fa-solid fa-user-tie me-2"></i> Admin <?= $adminName ?></span>
      <button class="btn btn-outline-secondary btn-sm" id="toggleSidebarBtn" title="Collapse Sidebar">
        <i class="fa fa-bars"></i>
      </button>
    </div>

    <hr>

    <ul class="nav nav-pills flex-column mb-auto">
      <li>
        <a href="./Dashbboard.php" class="nav-link text-white active">
          <i class="bi bi-speedometer2 me-2"></i> Dashboard
        </a>
      </li> -->

  <!-- Products Dropdown -->
  <!-- <li>
        <button class="nav-link text-white d-flex justify-content-between align-items-center w-100 text-start btn btn-toggle" data-bs-toggle="collapse" data-bs-target="#ordersSubmenu1" aria-expanded="false" aria-controls="ordersSubmenu1" style="background: none; border: none;">
          <span><i class="bi bi-table me-2"></i> Products</span>
          <i class="fa-solid fa-caret-down"></i>
        </button>
        <div class="collapse ps-4" id="ordersSubmenu1">
          <ul class="nav flex-column">
            <li><a class="nav-link text-white" href="./View-Products.php">View Products</a></li>
            <li><a class="nav-link text-white" href="./Add-Product.php">Add Products</a></li>
          </ul>
        </div>
      </li> -->

  <!-- Orders Dropdown -->
  <!-- <li>
        <button class="nav-link text-white d-flex justify-content-between align-items-center w-100 text-start btn btn-toggle" data-bs-toggle="collapse" data-bs-target="#ordersSubmenu2" aria-expanded="false" aria-controls="ordersSubmenu2" style="background: none; border: none;">
          <span><i class="bi bi-bag-check me-2"></i> Orders</span>
          <i class="fa-solid fa-caret-down"></i>
        </button>
        <div class="collapse ps-4" id="ordersSubmenu2">
          <ul class="nav flex-column">
            <li><a class="nav-link text-white" href="./View-Orders.php">All Orders</a></li>
            <li><a class="nav-link text-white" href="./Pending-orders.php">Pending Orders</a></li>
            <li><a class="nav-link text-white" href="./Complete-orders.php">Completed Orders</a></li>
          </ul>
        </div>
      </li> -->

  <!-- Users Dropdown -->
  <!-- <li>
        <button class="nav-link text-white d-flex justify-content-between align-items-center w-100 text-start btn btn-toggle" data-bs-toggle="collapse" data-bs-target="#ordersSubmenu3" aria-expanded="false" aria-controls="ordersSubmenu3" style="background: none; border: none;">
          <span><i class="bi bi-people me-2"></i> Users</span>
          <i class="fa-solid fa-caret-down"></i>
        </button>
        <div class="collapse ps-4" id="ordersSubmenu3">
          <ul class="nav flex-column">
            <li><a class="nav-link text-white" href="./Users.php">All Users</a></li>
          </ul>
        </div>
      </li>
    </ul> -->



  <!-- <div class="dropdown">
      <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
        <img src="https://github.com/mdo.png" alt="User Avatar" width="32" height="32" class="rounded-circle me-2">
        <strong>mdo</strong>
      </a>
      <ul class="dropdown-menu dropdown-menu-dark text-small shadow">
        <li><a class="dropdown-item" href="#">New project...</a></li>
        <li><a class="dropdown-item" href="#">Settings</a></li>
        <li><a class="dropdown-item" href="#">Profile</a></li>
        <li>
          <hr class="dropdown-divider">
        </li>
        <li><a class="dropdown-item" href="#">Sign out</a></li>
      </ul>
    </div> -->
  <!-- </div> -->




  <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
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
</script> -->
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