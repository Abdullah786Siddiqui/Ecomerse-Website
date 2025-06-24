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

<!-- Container -->
<div class="d-flex" id="sidebarContainer" style="min-height: 100vh;">
  <!-- Collapsed Sidebar -->
  <div id="sidebar-collapsed" class="d-flex flex-column flex-shrink-0 text-bg-dark d-none text-white text-decoration-none" style="width: 4.5rem;">
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

  <!-- Expanded Sidebar -->
  <div id="sidebar-expanded" class="d-flex flex-column flex-shrink-0 p-3 text-bg-dark" style="width: 280px;">
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
      </li>

      <!-- Products Dropdown -->
      <li>
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
      </li>

      <!-- Orders Dropdown -->
      <li>
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
      </li>

      <!-- Users Dropdown -->
      <li>
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
    </ul>

 

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
  </div>




  <script>
    const toggleBtn = document.getElementById('toggleSidebarBtn');
    const sidebarExpanded = document.getElementById('sidebar-expanded');
    const sidebarCollapsed = document.getElementById('sidebar-collapsed');

    toggleBtn.addEventListener('click', function() {
      sidebarExpanded.classList.toggle('d-none');
      sidebarCollapsed.classList.toggle('d-none');
    });

    document.querySelectorAll('.sidebar-toggle-link').forEach(link => {
      link.addEventListener('click', function() {
        sidebarExpanded.classList.remove('d-none');
        sidebarCollapsed.classList.add('d-none');
      });
    });

    // Enable tooltips
    const tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
    tooltipTriggerList.map(function(tooltipTriggerEl) {
      return new bootstrap.Tooltip(tooltipTriggerEl);
    });
  </script>
  <?php include("./Includes/footer.html"); ?>