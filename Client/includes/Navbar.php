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
  //   echo '<pre>';
  // print_r($_SESSION['cart']);
  // echo '</pre>';

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

   /* .navbar_mobile {
     display: none;
   } */

   /* .navbar_desktop {
     display: flex;
     /* or block, as needed */
   /* } */

   /* @media (max-width: 864px) {
     .navbar_desktop {
       display: none !important;
     }

     .navbar_mobile {
       display: flex !important;
     }
   } */
   @media (max-width: 845px) {
     .navbar_desktop {
       display: none !important;
     }

     /* .navbar {
       position: fixed;
       top: 0;
       left: 0;
       right: 0;
       z-index: 1050;

     } */

     #icons_navbar {
       display: none !important;
     }

     .navbar_des {
       display: flex !important;
       flex-direction: column !important;
       align-items: center;
       gap: 0.25rem;
       /* zyada gap kam kar diya */
       padding: 0 !important;
       margin: 0 !important;
       width: 100%;
     }

     .navbar_des .navbar-brand {
       justify-content: center !important;
       margin: 0 auto;
       padding: 0;
     }

     .navbar_des #searchForm {
       width: 100% !important;
       max-width: 100% !important;
       margin: 0 !important;
       padding: 0 0.5rem;
       /* optional: thoda chhota padding */
     }

     .navbar_des #searchForm .input-group {
       width: 100%;
     }

     .navbar_des #searchForm .form-control {
       flex: 1;
     }
   }





   /* body {
     padding-top: 70px !important;
   } */
 </style>

 <!-- DESKTOP & TABLET NAV -->
 <nav class="navbar navbar-expand-lg bg-white border-bottom pt-2  ">
   <div class="container-fluid mx-2 navbar_des  ">

     <!-- Logo -->
     <a class="navbar-brand d-flex align-items-start fs-4" href="./index.php">
       <strong class="mb-2"><img height="32px" src="./Assets/Images/shopping_cart_37dp_1F1F1F_FILL0_wght400_GRAD0_opsz40.svg" alt="">Ecoverse</strong>
     </a>

     <!-- Search -->
     <form autocomplete="off" class="d-flex flex-grow-1 mx-4 position-relative    " role="search" id="searchForm">
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
     <div id='icons_navbar' class="d-flex align-items-center gap-2">
       <a href="#"
         class="btn btn-light rounded-circle p-0 d-flex align-items-center justify-content-center position-relative"
         style="width: 40px; height: 40px;">
         <i class="	bi bi-heart-fill"></i>
       </a>

       <!-- Cart -->
       <a onclick="checkauth('cart')"
         class="btn btn-light rounded-circle p-0 d-flex align-items-center justify-content-center position-relative"
         style="width: 40px; height: 40px;">
         <i class="fas fa-cart-shopping"></i>

         <!-- Circular Badge -->
         <span
           class="position-absolute top-0 start-100 translate-middle badge bg-danger rounded-circle d-flex align-items-center justify-content-center " id='cartCount'
           style="width: 18px; height: 18px; font-size: 0.65rem;">
           <?= isset($_SESSION['cart']) ? count($_SESSION['cart']) : 0; ?>

         </span>
       </a>




       <!-- Account Dropdown -->
       <div class="dropdown drop">
         <a class="nav-link d-flex align-items-center" href="#" data-bs-toggle="dropdown">
           <img src="<?= empty($profile) ? './Assets/Images/user.png' : '../Server/uploads/' . $profile ?>" width="40" height="40" class="rounded-circle me-1">
           My Account
         </a>

         <?php if (isset($_SESSION['user_id'])): ?>
           <div class="dropdown-menu dropdown-menu-end p-3 drop" style="width: 250px; z-index: 1100; overflow: hidden">
             <div class="text-center mb-2">
               <img src="<?= empty($profile) ? './Assets/Images/user.png' : '../Server/uploads/' . $profile ?>" width="50" height="50" class="rounded-circle mb-2">

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
           <ul class="dropdown-menu dropdown-menu-end shadow-sm drop">
             <li><a class="dropdown-item cursor-pointer " onclick="showAuthModal('login')"><i class="bi bi-box-arrow-in-right me-2"></i> Login</a></li>
             <li><a class="dropdown-item cursor-pointer " onclick="showAuthModal('signup')"><i class="bi bi-pencil-square me-2"></i> Register</a></li>

           </ul>
         <?php endif; ?>
       </div>

     </div>
   </div>

 </nav>

 <!-- DESKTOP NAV LINKS -->
 <nav class="navbar2 bg-white border-bottom py-2  navbar_desktop ">
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
       <!-- <div class="dropdown ">
         <button class="btn btn-light dropdown-toggle" type="button" data-bs-toggle="dropdown">
           US English (USA)
         </button>
         <ul class="dropdown-menu shadow">
           <li><a class="dropdown-item active" href="#"><img src="https://flagcdn.com/us.svg" class="lang-flag"> English (U.S.)</a></li>
           <li><a class="dropdown-item" href="#"><img src="https://flagcdn.com/gb.svg" class="lang-flag"> English (U.K.)</a></li>
         </ul>
       </div> -->
     </div>
   </div>
 </nav>


 <!-- MOBILE TOP -->





 <!-- MOBILE SEARCH & MENU -->

 <?php include 'AuthModal.php'; ?>


 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>
 <script>
   const isLoggedIn = <?= $is_logged_in ? 'true' : 'false' ?>;
   //  document.addEventListener("DOMContentLoaded", function() {
   //    if (window.matchMedia("(max-width: 845px)").matches) {
   //   //    document.getElementById("searchForm").classList.add("w-100")
   //      document.querySelector(".navbar_des").classList.remove("mx-2")
   //      document.querySelector(".navbar_des").classList.add("p-0")


   //    }
   //  })
 </script>
 <script src="./Assets/JS/auth.js"></script>
 <script src="./Assets/JS/cart.js"></script>
 <script src="./Assets/JS/search.js"></script>
 <script src="./Assets/JS/search2.js"></script>




 <?php include $_SERVER['DOCUMENT_ROOT'] . '/Ecomerse-Website/Client/Components/footer.html';; ?>