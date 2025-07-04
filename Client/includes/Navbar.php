 <?php
  session_start();


  include("../Server/Admin-Panel/config/db.php");
  include("../Client/Components/header.html");

  $username = "";
  if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
    $sql = "SELECT * FROM users WHERE id = $user_id ";
    $result = $conn->query($sql);
    if ($row = $result->fetch_assoc()) {
      $username = $row['name'];
    }
  }

  ?>
 <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

 <style>
   .search-box {
     border-radius: 0;
   }

   .search-btn {
     border-radius: 0 5px 5px 0;
   }

   @media (max-width: 768px) {
     .offcanvas-mobile-75 {
       width: 75% !important;
     }
   }

   .dropdown-menu.show {
     z-index: 1100;
   }

   .nav-link {
     font-weight: 500;
   }

   .dropdown-menu-country {
     min-width: 250px;
     max-height: 300px;
     overflow-y: auto;
   }

   .dropdown-item input {
     margin-right: 10px;
   }

   .country-flag,
   .lang-flag {
     width: 20px;
     margin-right: 10px;
   }

   .dropdown-menu .dropdown-item.active,
   .dropdown-menu .dropdown-item:hover {
     background-color: #f1f1f1;
   }
 </style>
 </head>

 <body>

   <!-- DESKTOP & TABLET NAV -->
   <nav class="navbar navbar-expand-lg bg-white border-bottom py-2 d-none d-lg-flex   ">
     <div class="container-fluid mx-2">
       <!-- Logo -->
       <a class="navbar-brand d-flex align-items-start fs-4" href="./index.php">
         <i class="bi bi-stars" style="color: #2563EB; transform: rotate(45deg);"></i>
         <strong class="ms-1">Alexa</strong>
       </a>

       <!-- Search -->
       <form class="d-flex flex-grow-1 mx-4" role="search">
         <div class="input-group flex-grow-1">
           <select class="form-select" style="max-width: 150px;">
             <option>All categories</option>
             <option>Books</option>
             <option>Music</option>
             <option>PC</option>
           </select>
           <input class="form-control search-box" type="search" placeholder="What can we help you find today?">
           <button class="btn btn-primary search-btn" type="submit">
             <i class="bi bi-search"></i>
           </button>
         </div>
       </form>

       <!-- Icons -->
       <div class="d-flex align-items-center gap-3">
         <a href="#" class="nav-link position-relative">
           <i class="bi bi-heart"></i> Favorites

         </a>
         <a href="./view-cart.php" class="nav-link position-relative">
           <i class="bi bi-cart"></i> My Cart
         </a>


         <!-- Account Dropdown -->
         <div class="dropdown">
           <a class="nav-link d-flex align-items-center" href="#" data-bs-toggle="dropdown">
             <img src="<?= isset($_SESSION['user_id']) ? '../Server/uploads/Abdullah.png' : './Assets/Images/user.png' ?>" width="30" height="30" class="rounded-circle me-1">
             My Account
           </a>

           <?php if (isset($_SESSION['user_id'])): ?>
             <div class="dropdown-menu dropdown-menu-end p-3" style="width: 250px; z-index: 1100; overflow: hidden">
               <div class="text-center mb-2">
                 <img src="../Server/uploads/Abdullah.png" width="50" height="50" class="rounded-circle mb-2">

                 <div><strong><?= htmlspecialchars($username) ?></strong></div>
                 <small class="text-muted d-block text-truncate"><?= htmlspecialchars($row['email']) ?></small>
                 <a href="./Profile.php" class="btn btn-outline-primary btn-sm w-100 mt-2">View Profile</a>
               </div>
               <hr>
               <a class="dropdown-item" href="./Profile.php"><i class="bi bi-person me-2"></i> My Account</a>
               <a class="dropdown-item d-flex justify-content-between align-items-center" href="#">
                 <span><i class="bi bi-lightning-fill me-2"></i> Flowbite</span>
                 <span class="badge bg-primary">PRO</span>
               </a>
               <a class="dropdown-item" href="#"><i class="bi bi-wallet2 me-2"></i> My Wallet</a>
               <a class="dropdown-item" href="#"><i class="bi bi-bag-check me-2"></i> My Orders</a>
               <a class="dropdown-item" href="#"><i class="bi bi-geo-alt me-2"></i> Delivery Addresses</a>
               <a class="dropdown-item" href="#"><i class="bi bi-gear me-2"></i> Settings</a>
               <hr>
               <a class="dropdown-item text-danger" href="./logout.php"><i class="bi bi-box-arrow-right me-2"></i> Log Out</a>
             </div>

           <?php else: ?>
             <ul class="dropdown-menu dropdown-menu-end shadow-sm">
               <li><a class="dropdown-item" href="./login.php"><i class="bi bi-box-arrow-in-right me-2"></i> Login</a></li>
               <li><a class="dropdown-item" href="./register.php"><i class="bi bi-pencil-square me-2"></i> Register</a></li>
               <li><a class="dropdown-item" href="./forgot-password.php"><i class="bi bi-key me-2"></i> Forgot Password</a></li>
             </ul>
           <?php endif; ?>
         </div>

       </div>
     </div>
   </nav>

   <!-- DESKTOP NAV LINKS -->
   <nav class="bg-white border-bottom py-2 d-none d-lg-block   ">
     <div class="container-fluid mx-2 d-flex justify-content-between">
       <div class="d-flex gap-4 flex-wrap">
         <?php
          $sql = "SELECT * FROM categories";
          $result = $conn->query($sql);

          while ($row = $result->fetch_assoc()) {
          ?>
           <div class="dropdown">
             <a href="#" class="nav-link" data-bs-toggle="dropdown">
               <?= htmlspecialchars($row['name']) ?>
             </a>

             <ul class="dropdown-menu">
               <?php
                $cat_id = $row['id'];
                $sub_sql = "SELECT * FROM subcategories WHERE category_id = $cat_id";
                $sub_result = $conn->query($sub_sql);

                if ($sub_result->num_rows > 0) {
                  while ($sub_row = $sub_result->fetch_assoc()) {
                    $subcat_id = $sub_row['id']; // 🔷 یہاں غلطی تھی
                ?>
                   <li>
                     <a class="dropdown-item" href="./products.php?subcategory_id=<?= $subcat_id ?>">
                       <?= htmlspecialchars($sub_row['name']) ?>
                     </a>
                   </li>
               <?php
                  }
                } else {
                  echo "<li><span class='dropdown-item text-muted'>No subcategories</span></li>";
                }
                ?>
             </ul>
           </div>
         <?php
          }
          ?>
       </div>



       <div class="d-flex gap-2">
         <div class="dropdown">
           <button class="btn btn-light dropdown-toggle" type="button" data-bs-toggle="dropdown">
             <i class="bi bi-geo-alt"></i> Deliver to: United States
           </button>
           <ul class="dropdown-menu dropdown-menu-country p-2 shadow">
             <li class="dropdown-item"><input type="checkbox"><img src="https://flagcdn.com/ca.svg" class="country-flag"> Canada</li>
             <li class="dropdown-item"><input type="checkbox"><img src="https://flagcdn.com/pk.svg" class="country-flag"> Pakistan</li>
             <li class="dropdown-item"><input type="checkbox" checked><img src="https://flagcdn.com/gb.svg" class="country-flag"> UK</li>
             <li class="dropdown-item"><input type="checkbox" checked><img src="https://flagcdn.com/us.svg" class="country-flag"> US</li>
           </ul>
         </div>
         <div class="dropdown">
           <button class="btn btn-light dropdown-toggle" type="button" data-bs-toggle="dropdown">
             US English (USA)
           </button>
           <ul class="dropdown-menu shadow">
             <li><a class="dropdown-item active" href="#"><img src="https://flagcdn.com/us.svg" class="lang-flag"> English (U.S.)</a></li>
             <li><a class="dropdown-item" href="#"><img src="https://flagcdn.com/gb.svg" class="lang-flag"> English (U.K.)</a></li>
           </ul>
         </div>
       </div>
     </div>
   </nav>

   <!-- MOBILE TOP -->
   <nav class="bg-white border-bottom py-2 px-3 d-flex d-lg-none justify-content-between align-items-center ">

     <!-- Left: Brand -->
     <a href="./index.php" class="d-flex align-items-center">
       <i class="bi bi-stars text-primary fs-5"></i>
       <strong class="ms-1" style="font-size: 1rem;">Alexa</strong>
     </a>

     <!-- Middle: Icons -->
     <div class="d-flex align-items-center gap-3">
       <!-- Search -->
       <a href="#" class="text-dark position-relative">
         <i class="bi bi-search fs-5"></i>
       </a>

       <!-- Cart -->
       <a href="./view-cart.php" class="nav-link position-relative">
         <i class="bi bi-cart"></i> My Cart
       </a>


       <!-- User Dropdown -->
       <div class="dropdown">
         <a class="nav-link  p-0 d-flex align-items-center" href="#" role="button" data-bs-toggle="dropdown">
           <img src="../Server/uploads/Abdullah.png" width="32" height="32" class="rounded-circle border border-light shadow-sm">
         </a>
         <div class="dropdown-menu dropdown-menu-end p-2" style="width: 200px; font-size: 0.875rem;z-index: 1100;">
           <div class="text-center mb-2">
             <img src="../Server/uploads/Abdullah.png" width="40" height="40" class="rounded-circle mb-1">
             <div style="font-size: 0.9rem;"><strong>Hello, Jese</strong></div>
             <small class="text-muted" style="font-size: 0.75rem;">name@example.com</small>
             <a href="./Profile.php" class="btn btn-outline-primary btn-sm w-100 mt-1 py-1" style="font-size: 0.75rem;">View Profile</a>
           </div>
           <hr class="my-1">
           <a class="dropdown-item py-1" href="./Profile.php"><i class="bi bi-person me-1"></i> My Account</a>
           <a class="dropdown-item py-1" href="#"><i class="bi bi-wallet2 me-1"></i> My Wallet</a>
           <a class="dropdown-item py-1" href="#"><i class="bi bi-bag-check me-1"></i> My Orders</a>
           <a class="dropdown-item py-1" href="#"><i class="bi bi-geo-alt me-1"></i> Addresses</a>
           <a class="dropdown-item py-1" href="#"><i class="bi bi-gear me-1"></i> Settings</a>
           <a class="dropdown-item py-1" href="#"><i class="bi bi-question-circle me-1"></i> Helpdesk</a>
           <hr class="my-1">
           <a class="dropdown-item py-1 text-danger" href="./logout.php"><i class="bi bi-box-arrow-right me-1"></i> Log Out</a>
         </div>
       </div>
     </div>
   </nav>


   <!-- MOBILE SEARCH & MENU -->
   <nav class="bg-white border-bottom py-2 px-3 d-lg-none  ">
     <div class="input-group rounded border mb-2">
       <input type="text" class="form-control border-0 bg-light text-secondary" placeholder="Search in all categories">
       <button class="btn btn-primary btn-sm fw-bold rounded-3">Search</button>
     </div>
     <div class="d-flex align-items-center justify-content-between mb-2">
       <button class="btn btn-outline-secondary btn-sm" data-bs-toggle="collapse" data-bs-target="#mobileMenu">
         <i class="bi bi-list"></i> Menu
       </button>
       <div class="dropdown">
         <button class="btn btn-light btn-sm dropdown-toggle" type="button" data-bs-toggle="dropdown">
           <i class="bi bi-geo-alt"></i> Deliver to: United States
         </button>
         <ul class="dropdown-menu dropdown-menu-country p-2 shadow">
           <li class="dropdown-item"><input type="checkbox"><img src="https://flagcdn.com/ca.svg" class="country-flag"> Canada</li>
           <li class="dropdown-item"><input type="checkbox" checked><img src="https://flagcdn.com/us.svg" class="country-flag"> US</li>
         </ul>
       </div>
     </div>

     <div class="collapse" id="mobileMenu">
       <a href="#" class="nav-link">Home</a>
       <a href="#" class="nav-link">Best Sellers</a>
       <a href="#" class="nav-link">Gift Ideas</a>
       <a href="#" class="nav-link">Games</a>
       <a href="#" class="nav-link">PC</a>
       <a href="#" class="nav-link">Music</a>
       <a href="#" class="nav-link">Books</a>
     </div>
   </nav>






   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>
   <?php include("../Client/Components/footer.html"); ?>