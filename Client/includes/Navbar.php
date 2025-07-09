 <?php
  if (session_status() === PHP_SESSION_NONE) {
    session_start();
  }
  include("../Server/Admin-Panel/config/db.php");
  include $_SERVER['DOCUMENT_ROOT'] . '/Ecomerse-Website/Client/Components/header.html';

  $is_logged_in = isset($_SESSION['user_id']);
  $username = "";
  if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
    $sql = "SELECT * FROM users WHERE id = $user_id ";
    $result = $conn->query($sql);
    if ($row = $result->fetch_assoc()) {
      $username = $row['name'];
      $email = $row['email'];
      $profile = $row['user_profile'];
    }
  }
  ?>


 <style>
   .cursor-pointer {
     cursor: pointer;
   }

   /* Modal Animation: smoother + responsive */
   .modal.custom-fade .modal-dialog {
     transform: translateY(50px) scale(0.98);
     opacity: 0;
     transition: all 0.4s ease-in-out;
   }

   .modal.show .modal-dialog {
     transform: translateY(0) scale(1);
     opacity: 1;
   }

   /* Modal Content: clean card-like look */
   .modal-content {
     background: #fff;
     border-radius: 1rem;
     padding: 1.5rem;
     box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
     animation: fadeIn 0.3s ease-in-out;
   }

   @keyframes fadeIn {
     from {
       opacity: 0;
       transform: translateY(20px);
     }

     to {
       opacity: 1;
       transform: translateY(0);
     }
   }

   .modal-header {
     border-bottom: none;
   }

   .modal-header h5 {
     font-size: 1.5rem;
     font-weight: 600;
     color: #333;
   }

   .btn-close {
     opacity: 0.6;
   }

   .btn-close:hover {
     opacity: 1;
   }

   /* Form Fields */
   .auth-form .form-control {
     border-radius: 50rem;
     padding: 0.75rem 1rem;
     border: 1px solid #ced4da;
     box-shadow: none;
     transition: border-color 0.2s ease-in-out;
   }

   .auth-form .form-control:focus {
     border-color: #0d6efd;
     box-shadow: 0 0 0 0.2rem rgba(13, 110, 253, .25);
   }

   /* Auth Form Animations */
   .auth-form {
     transition: all 0.4s ease-in-out;
   }

   .auth-form.d-none {
     opacity: 0;
     transform: translateX(50px);
     position: absolute;
     width: 100%;
     pointer-events: none;
   }

   .auth-form:not(.d-none) {
     opacity: 1;
     transform: translateX(0);
     pointer-events: all;
   }

   /* Buttons */
   .auth-form .btn-primary,
   .auth-form .btn-success {
     border-radius: 50rem;
     font-weight: 600;
     padding: 0.75rem;
   }

   /* Links */
   .auth-form p a {
     color: #0d6efd;
     text-decoration: none;
   }

   .auth-form p a:hover {
     text-decoration: underline;
   }

   /* Make dropdowns push content below */
   .static-dropdown {
     position: static;
     /* remove absolute positioning */
     display: none;
     /* hide by default */
   }

   .nav-item.show .static-dropdown {
     display: block;
     /* show on open */
   }
 </style>

 <!-- DESKTOP & TABLET NAV -->
 <nav class="navbar navbar-expand-lg bg-white border-bottom py-2 d-none d-lg-flex   ">
   <div class="container-fluid mx-2">
     <!-- Logo -->
     <a class="navbar-brand d-flex align-items-start fs-4" href="./index.php">
       <strong class="mb-2"><img height="32px" src="./Assets/Images/shopping_cart_37dp_1F1F1F_FILL0_wght400_GRAD0_opsz40.svg" alt="">Ecoverse</strong>
     </a>

     <!-- Search -->
     <form autocomplete="off" class="d-flex flex-grow-1 mx-4 position-relative" role="search" id="searchForm">
       <div class="input-group flex-grow-1">
         <input
           class="form-control search-box searchInput"
           type="search"
           placeholder="What can we help you find today?"
           oninput="searchFunc(this.value)" />
         <button id="search-btn" class="btn btn-primary " type="submit">
           <i class="bi bi-search"></i>
         </button>
       </div>

       <!-- Card positioned absolutely -->
       <div
         class="card position-absolute start-0 w-100  d-none"
         style="top: 100%; z-index: 1000;"
         id="resultCard">
         <div class="card " id='output'>
         </div>
       </div>
     </form>





     <!-- Icons -->
     <div class="d-flex align-items-center gap-3">
       <a href="#" class="nav-link position-relative">
         <i class="bi bi-heart"></i> Favorites

       </a>
       <a onclick="checkauth()" class="nav-link position-relative cursor-pointer">
         <i class="bi bi-cart"></i> My Cart
       </a>



       <!-- Account Dropdown -->
       <div class="dropdown">
         <a class="nav-link d-flex align-items-center" href="#" data-bs-toggle="dropdown">
           <img  src="<?= empty($profile) ? './Assets/Images/user.png' : '../Server/uploads/'.$profile ?>" width="30" height="30" class="rounded-circle me-1">
           My Account
         </a>

         <?php if (isset($_SESSION['user_id'])): ?>
           <div class="dropdown-menu dropdown-menu-end p-3" style="width: 250px; z-index: 1100; overflow: hidden">
             <div class="text-center mb-2">
               <img src="<?= empty($profile) ? './Assets/Images/user.png' : '../Server/uploads/'.$profile ?>" width="50" height="50" class="rounded-circle mb-2">

               <div><strong><?= htmlspecialchars($username) ?></strong></div>
               <small class="text-muted d-block text-truncate"><?= htmlspecialchars($row['email']) ?></small>
               <a href="./homeprofile.php" class="btn btn-outline-primary btn-sm w-100 mt-2">View Profile</a>
             </div>
             <hr>
             <a class="dropdown-item" href="./homeprofile.php"><i class="bi bi-person me-2"></i> My Account</a>

             <a class="dropdown-item" href="./Profile.php"><i class="bi bi-bag-check me-2"></i> My Orders</a>
             <a class="dropdown-item" href="#"><i class="bi bi-geo-alt me-2"></i> Delivery Addresses</a>
             <hr>
             <a class="dropdown-item text-danger" href="./logout.php"><i class="bi bi-box-arrow-right me-2"></i> Log Out</a>
           </div>

         <?php else: ?>
           <ul class="dropdown-menu dropdown-menu-end shadow-sm">
             <li><a class="dropdown-item cursor-pointer " onclick="showAuthModal('login')"><i class="bi bi-box-arrow-in-right me-2"></i> Login</a></li>
             <li><a class="dropdown-item cursor-pointer " onclick="showAuthModal('signup')"><i class="bi bi-pencil-square me-2"></i> Register</a></li>

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
                  $subcat_id = $sub_row['id'];
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
       <!-- <div class="dropdown">
           <button class="btn btn-light dropdown-toggle" type="button" data-bs-toggle="dropdown">
             <i class="bi bi-geo-alt"></i> Deliver to: United States
           </button>
           <ul class="dropdown-menu dropdown-menu-country p-2 shadow">
             <li class="dropdown-item"><input type="checkbox"><img src="https://flagcdn.com/ca.svg" class="country-flag"> Canada</li>
             <li class="dropdown-item"><input type="checkbox"><img src="https://flagcdn.com/pk.svg" class="country-flag"> Pakistan</li>
             <li class="dropdown-item"><input type="checkbox" checked><img src="https://flagcdn.com/gb.svg" class="country-flag"> UK</li>
             <li class="dropdown-item"><input type="checkbox" checked><img src="https://flagcdn.com/us.svg" class="country-flag"> US</li>
           </ul>
         </div> -->
       <div class="dropdown ">
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
   <a class="navbar-brand d-flex align-items-start fs-4" href="./index.php">
     <strong class="ms-1"><img height="29px" src="./Assets/Images/shopping_cart_37dp_1F1F1F_FILL0_wght400_GRAD0_opsz40.svg" alt="">Ecoverse</strong>
   </a>

   <!-- Middle: Icons -->
   <div class="d-flex align-items-center gap-3">
     <!-- Search -->

     <!-- Cart -->
     <a onclick="checkauth()" class="nav-link position-relative cursor-pointer">
       <i class="bi bi-cart"></i> My Cart
     </a>


     <!-- User Dropdown -->
     <div class="dropdown">
       <a class="nav-link d-flex align-items-center gap-1" href="#" data-bs-toggle="dropdown">
         <img src="<?= empty($profile) ? './Assets/Images/user.png' : '../Server/uploads/'.$profile ?>" width="30" height="30" class="rounded-circle">
         <span class="d-none d-md-inline">My Account</span>
       </a>

       <?php if (isset($_SESSION['user_id'])): ?>
         <div class="dropdown-menu dropdown-menu-end p-2" style="min-width: 220px; z-index:1100;">
           <div class="text-center mb-2">
             <img src="<?= empty($profile) ? './Assets/Images/user.png' : '../Server/uploads/'.$profile ?>" width="45" height="45" class="rounded-circle mb-1">
             <div><strong><?= htmlspecialchars($username) ?></strong></div>
             <small class="text-muted text-truncate"><?= htmlspecialchars($email) ?></small>
             <a href="./homeprofile.php" class="btn btn-outline-primary btn-sm w-100 mt-2">Profile</a>
           </div>
           <hr class="my-2">
           <a class="dropdown-item py-1" href="./homeprofile.php"><i class="bi bi-person me-2"></i> Account</a>

           <a class="dropdown-item py-1" href="./Profile.php"><i class="bi bi-bag-check me-2"></i>My Orders</a>
           <a class="dropdown-item py-1" href="#"><i class="bi bi-geo-alt me-2"></i> Addresses</a>
           <hr class="my-2">
           <a class="dropdown-item text-danger py-1" href="./logout.php"><i class="bi bi-box-arrow-right me-2"></i> Log Out</a>
         </div>

       <?php else: ?>
         <ul class="dropdown-menu dropdown-menu-end shadow-sm">
           <li><a class="dropdown-item cursor-pointer " onclick="showAuthModal('login')"><i class="bi bi-box-arrow-in-right me-2"></i> Login</a></li>
           <li><a class="dropdown-item cursor-pointer " onclick="showAuthModal('signup')"><i class="bi bi-pencil-square me-2"></i> Register</a></li>

         </ul>
       <?php endif; ?>
     </div>

   </div>
 </nav>



 <!-- MOBILE SEARCH & MENU -->
 <nav class="bg-white border-bottom py-2 px-3 d-lg-none  ">
   <div class="input-group rounded  mb-2 ">
     <form autocomplete="off" class="d-flex flex-grow-1 mx-4 position-relative" role="search" id="searchForm">
       <div class="input-group flex-grow-1">
         <input
           class="form-control search-box searchInput"
           type="search"
           placeholder="What can we help you find today?"
           oninput="searchFunc(this.value)" />
         <button id="search-btn" class="btn btn-primary " type="submit">
           <i class="bi bi-search"></i>
         </button>
       </div>

       <!-- Card positioned absolutely -->
       <div
         class="card position-absolute start-0 w-100  d-none"
         style="top: 100%; z-index: 1000;"
         id="resultCard">
         <div class="card " id='output'>
         </div>
       </div>
     </form>
   </div>

   <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNavbar">
     <i class="fas fa-bars fa-lg"></i>
   </button>

   <div class="collapse navbar-collapse" id="mainNavbar">
     <ul class="navbar-nav me-auto mb-2 mb-lg-0">

       <!-- Example dropdown -->
       <li class="nav-item dropdown position-static">
         <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
           Home
         </a>
         <div class="dropdown-menu static-dropdown">
           <a class="dropdown-item" href="#">Sub Home 1</a>
           <a class="dropdown-item" href="#">Sub Home 2</a>
         </div>
       </li>

       <li class="nav-item dropdown position-static">
         <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
           Best Sellers
         </a>
         <div class="dropdown-menu static-dropdown">
           <a class="dropdown-item" href="#">Top 10</a>
           <a class="dropdown-item" href="#">Trending</a>
         </div>
       </li>

     </ul>
   </div>

 </nav>
 <?php include 'AuthModal.php'; ?>


 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>
 <script>
   const isLoggedIn = <?= $is_logged_in ? 'true' : 'false' ?>;
 </script>
 <script src="./Assets/JS/auth.js"></script>
 <script src="./Assets/JS/search.js"></script>



 <?php include $_SERVER['DOCUMENT_ROOT'] . '/Ecomerse-Website/Client/Components/footer.html';; ?>