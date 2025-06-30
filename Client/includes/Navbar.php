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
 <style>
   .dropdown-toggle-no-arrow {
     background: transparent;
     border: none;
     box-shadow: none;
     color: #D1D5DB;
     padding: 0;
     font-size: 14px;
   }

   .icon-white {
     color: #D1D5DB;
   }

   .cursor-pointer {
     cursor: pointer;
   }

   .dropdown-toggle-no-arrow::after {
     display: none;
   }

   .dropdown-menu a {
     color: black;
   }

   .navbar-scrollable {
     overflow-x: auto;
     white-space: nowrap;
     -webkit-overflow-scrolling: touch;
   }

   .navbar-scrollable>.dropdown {
     display: inline-block;
   }


   /* 👉 Add this Responsive CSS */
 </style>


 <!-- Bootstrap CSS -->
 <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" />




 <nav class="d-flex gap-4 px-3 py-3 align-items-center justify-content-between w-100" style="background-color: #111827;">

   <!-- Desktop View -->
   <div class="d-none d-lg-flex gap-4 align-items-center w-100 justify-content-between" id="navbarContent">

     <!-- Logo -->
     <div class="logo">
       <a class="navbar-brand text-white fw-bold gap-2 d-flex align-items-center fs-4" href="./index.php" id="logo">
         <i style="color: #2563EB ;transform: rotate(45deg);" class="ri-shining-fill"></i> Alexa
       </a>
     </div>

     <!-- Search Bar -->
     <div class="d-flex gap-3 align-items-center">
       <div class="search-wrapper d-flex p-0 gap-3" style="filter: drop-shadow(0 4px 6px rgba(0,0,0,0.1))" id="search">
         <form class="w-100 d-flex justify-content-center" role="search">
           <div class="input-group custom-width w-100">
             <input type="text" class="form-control" placeholder="Search! Whatever you Want" aria-label="Search" />
             <span class="input-group-text bg-white">
               <i class="fas fa-search"></i>
             </span>
           </div>
         </form>
       </div>

       <!-- Categories -->
       <div class="d-flex gap-3">


         <div class="dropdown">
           <button class="dropdown-toggle-no-arrow" type="button" data-bs-toggle="dropdown" aria-expanded="false">
             Electronics
           </button>
           <ul class="dropdown-menu">


             <?php
              $sql = "SELECT * FROM subcategories WHERE  category_id  = 1 ";
              $result = $conn->query($sql);
              while ($row = $result->fetch_assoc()) {
                $subcategory = $row['name'];
                $subcategory_id = $row['category_id'];

                echo "<li><a href='./products.php?subcategory_id=$subcategory_id' class='dropdown-item cursor-pointer' >$subcategory </a></li>";
              }
              ?>


           </ul>
         </div>


         <div class="dropdown">
           <button class="dropdown-toggle-no-arrow" type="button" data-bs-toggle="dropdown" aria-expanded="false">
             Health & Beauty
           </button>
           <ul class="dropdown-menu">
             <?php
              $sql = "SELECT * FROM subcategories WHERE  category_id  = 2 ";
              $result = $conn->query($sql);
              while ($row = $result->fetch_assoc()) {
                $subcategory = $row['name'];
                $subcategory_id = $row['category_id'];

                echo "<li><a href='./products.php?subcategory_id=$subcategory_id' class='dropdown-item cursor-pointer' >$subcategory </a></li>";
              }
              ?>
           </ul>
         </div>


         <div class="dropdown">
           <button class="dropdown-toggle-no-arrow" type="button" data-bs-toggle="dropdown" aria-expanded="false">
             Home & Lifestyle
           </button>
           <ul class="dropdown-menu">
             <?php
              $sql = "SELECT * FROM subcategories WHERE  category_id  = 3";
              $result = $conn->query($sql);
              while ($row = $result->fetch_assoc()) {
                $subcategory = $row['name'];
                echo "<li><a class='dropdown-item' >$subcategory </a></li>";
              }
              ?>
           </ul>
         </div>

         <div class="dropdown">
           <button class="dropdown-toggle-no-arrow" type="button" data-bs-toggle="dropdown" aria-expanded="false">
             TV & Home Appliances
           </button>
           <ul class="dropdown-menu">
             <?php
              $sql = "SELECT * FROM subcategories WHERE  category_id  = 4";
              $result = $conn->query($sql);
              while ($row = $result->fetch_assoc()) {
                $subcategory = $row['name'];
                echo "<li><a class='dropdown-item' >$subcategory </a></li>";
              }
              ?>
           </ul>
         </div>


         <div class="dropdown">
           <button class="dropdown-toggle-no-arrow" type="button" data-bs-toggle="dropdown" aria-expanded="false">
             Fashions
           </button>
           <ul class="dropdown-menu">
             <?php
              $sql = "SELECT * FROM subcategories WHERE  category_id  = 5";
              $result = $conn->query($sql);
              while ($row = $result->fetch_assoc()) {
                $subcategory = $row['name'];
                echo "<li><a class='dropdown-item' >$subcategory </a></li>";
              }
              ?>
           </ul>
         </div>


         <div class="dropdown">
           <button class="dropdown-toggle-no-arrow" type="button" data-bs-toggle="dropdown" aria-expanded="false">
             Books & Stationery
           </button>
           <ul class="dropdown-menu">
             <?php
              $sql = "SELECT * FROM subcategories WHERE  category_id  = 6";
              $result = $conn->query($sql);
              while ($row = $result->fetch_assoc()) {
                $subcategory = $row['name'];
                echo "<li><a class='dropdown-item' >$subcategory </a></li>";
              }
              ?>
           </ul>
         </div>
       </div>
     </div>

     <!-- Icons -->
     <div class="d-flex justify-content-center align-items-center gap-4 text-white fs-5 icons" id="icons">
       <?php
        if (isset($_SESSION['user_id'])) {
          echo '<span class="fw-semibold text-white">Welcome, ' . htmlspecialchars($username) . '</span>';
        } else {
        ?>
         <div class="dropdown">
           <a href="#" class="d-inline-block" data-bs-toggle="dropdown" aria-expanded="false">
             <i class="fas fa-user-circle profile-img rounded-circle"></i>
           </a>
           <ul class="dropdown-menu dropdown-menu-end">
             <li><a class="dropdown-item" href="#">Profile</a></li>
             <li><a class="dropdown-item" href="#">Settings</a></li>
             <li>
               <hr class="dropdown-divider">
             </li>
             <li><a class="dropdown-item" href="#">Logout</a></li>
           </ul>
         </div>
       <?php
        }
        ?>
       <i class="fa-regular fa-heart cursor-pointer"></i>
       <i class="fa-solid fa-cart-shopping cursor-pointer" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight"></i>
     </div>
   </div>


   <!-- Mobile View -->
   <div class="d-flex d-lg-none gap-4 align-items-center w-100 justify-content-between">
     <div class="logo">
       <a class="navbar-brand text-white fw-bold gap-2 d-flex align-items-center fs-4" href="./index.php" id="logo">
         <i style="color: #2563EB ;transform: rotate(45deg);" class="ri-shining-fill"></i> Alexa
       </a>
     </div>

     <div class="d-flex gap-4 align-items-center">
       <!-- Icons -->
       <div class="d-flex justify-content-center align-items-center gap-3 text-white icons position-relative" id="icons">
         <i class="fas fa-search cursor-pointer" id="searchToggle"></i>

         <?php
          if (isset($_SESSION['user_id'])) {
            echo '<span class="fw-semibold text-white">Welcome, ' . htmlspecialchars($username) . '</span>';
          } else {
          ?>
           <div class="dropdown">
             <a href="#" class="d-inline-block" data-bs-toggle="dropdown" aria-expanded="false">
               <i class="fas fa-user-circle profile-img rounded-circle"></i>
             </a>
             <ul class="dropdown-menu dropdown-menu-end">
               <li><a class="dropdown-item" href="#">Profile</a></li>
               <li><a class="dropdown-item" href="#">Settings</a></li>
               <li>
                 <hr class="dropdown-divider">
               </li>
               <li><a class="dropdown-item" href="#">Logout</a></li>
             </ul>
           </div>
         <?php
          }
          ?>
         <i class="fa-regular fa-heart cursor-pointer"></i>
         <i class="fa-solid fa-cart-shopping cursor-pointer" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight"></i>


         <!-- Hidden Search Input -->
         <div id="searchBox" class="position-absolute mt-2" style="display: none; top: 100%; right: 0; z-index: 1100; width: 250px;">
           <input type="text" class="form-control" placeholder="Search! Whatever you Want" aria-label="Search" />
         </div>

       </div>


       <button class="navbar-toggler border-0 bg-transparent fs-3 text-white" type="button" id="mobileMenuToggle">
         <i class="fas fa-bars fs-3" id="menuIcon"></i>
       </button>
     </div>

   </div>



   <!-- Mobile Dropdown Menu -->
   <div id="mobileMenu" class="mobile-menu w-100 shadow overflow-auto" style="display: none; position: absolute; top: 13%; left: 0; z-index: 1050;background-color: #111827; ">


     <div class="p-3 d-flex flex-column gap-2">

       <div class="dropdown">
         <button class="btn w-100 text-start text-white" type="button" data-bs-toggle="dropdown" aria-expanded="false">
           Electronics
         </button>
         <ul class="dropdown-menu w-100">
           <?php
            $sql = "SELECT * FROM subcategories WHERE category_id = 1";
            $result = $conn->query($sql);
            while ($row = $result->fetch_assoc()) {
              $subcategory = $row['name'];
              $subcategory_id = $row['category_id'];
              echo "<li><a href='./products.php?subcategory_id=$subcategory_id' class='dropdown-item'>$subcategory</a></li>";
            }
            ?>
         </ul>
       </div>

       <div class="dropdown">
         <button class="btn w-100 text-start text-white" type="button" data-bs-toggle="dropdown" aria-expanded="false">
           Health & Beauty
         </button>
         <ul class="dropdown-menu w-100">
           <?php
            $sql = "SELECT * FROM subcategories WHERE category_id = 2";
            $result = $conn->query($sql);
            while ($row = $result->fetch_assoc()) {
              $subcategory = $row['name'];
              $subcategory_id = $row['category_id'];
              echo "<li><a href='./products.php?subcategory_id=$subcategory_id' class='dropdown-item'>$subcategory</a></li>";
            }
            ?>
         </ul>
       </div>

       <div class="dropdown">
         <button class="btn w-100 text-start text-white" type="button" data-bs-toggle="dropdown" aria-expanded="false">
           Home & Lifestyle
         </button>
         <ul class="dropdown-menu w-100">
           <?php
            $sql = "SELECT * FROM subcategories WHERE category_id = 3";
            $result = $conn->query($sql);
            while ($row = $result->fetch_assoc()) {
              $subcategory = $row['name'];
              echo "<li><a class='dropdown-item'>$subcategory</a></li>";
            }
            ?>
         </ul>
       </div>

       <div class="dropdown">
         <button class="btn w-100 text-start text-white" type="button" data-bs-toggle="dropdown" aria-expanded="false">
           TV & Home Appliances
         </button>
         <ul class="dropdown-menu w-100">
           <?php
            $sql = "SELECT * FROM subcategories WHERE category_id = 4";
            $result = $conn->query($sql);
            while ($row = $result->fetch_assoc()) {
              $subcategory = $row['name'];
              echo "<li><a class='dropdown-item'>$subcategory</a></li>";
            }
            ?>
         </ul>
       </div>

       <div class="dropdown">
         <button class="btn w-100 text-start text-white" type="button" data-bs-toggle="dropdown" aria-expanded="false">
           Fashions
         </button>
         <ul class="dropdown-menu w-100">
           <?php
            $sql = "SELECT * FROM subcategories WHERE category_id = 5";
            $result = $conn->query($sql);
            while ($row = $result->fetch_assoc()) {
              $subcategory = $row['name'];
              echo "<li><a class='dropdown-item'>$subcategory</a></li>";
            }
            ?>
         </ul>
       </div>

       <div class="dropdown">
         <button class="btn w-100 text-start text-white" type="button" data-bs-toggle="dropdown" aria-expanded="false">
           Books & Stationery
         </button>
         <ul class="dropdown-menu w-100">
           <?php
            $sql = "SELECT * FROM subcategories WHERE category_id = 6";
            $result = $conn->query($sql);
            while ($row = $result->fetch_assoc()) {
              $subcategory = $row['name'];
              echo "<li><a class='dropdown-item'>$subcategory</a></li>";
            }
            ?>
         </ul>
       </div>

     </div>
   </div>

 </nav>


 <script>
   const searchToggle = document.getElementById('searchToggle');
   const searchBox = document.getElementById('searchBox');

   searchToggle.addEventListener('click', () => {
     if (searchBox.style.display === 'none' || searchBox.style.display === '') {
       searchBox.style.display = 'block';
     } else {
       searchBox.style.display = 'none';
     }
   });
 </script>


 <!-- Mobile Menu -->
 <script>
   const mobileMenuToggle = document.getElementById('mobileMenuToggle');
   const mobileMenu = document.getElementById('mobileMenu');
   const menuIcon = document.getElementById('menuIcon');

   let isMenuOpen = false;

   mobileMenuToggle.addEventListener('click', () => {
     if (!isMenuOpen) {
       mobileMenu.style.display = 'block';
       menuIcon.classList.remove('fa-bars');
       menuIcon.classList.add('fa-times'); // cross icon
       isMenuOpen = true;
     } else {
       mobileMenu.style.display = 'none';
       menuIcon.classList.remove('fa-times');
       menuIcon.classList.add('fa-bars'); // menu icon
       isMenuOpen = false;
     }
   });
 </script>



 <script>
   window.addEventListener('resize', function() {
     const navbarHeight = document.querySelector('.navbar').offsetHeight;
     document.querySelector('.navbar1').style.top = navbarHeight + 'px';
   });

   // Run once on page load
   window.dispatchEvent(new Event('resize'));
 </script>




 <div class="offcanvas offcanvas-end offcanvas-mobile-75 " tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
   <div class="offcanvas-header border-bottom">
     <h5 class="offcanvas-title fw-bold" id="offcanvasRightLabel">🛒 Your Cart</h5>
     <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
   </div>

   <div class="offcanvas-body d-flex flex-column justify-content-between py-3">

     <!-- 🧾 Cart Items Section -->
     <div class="cart-items overflow-auto" style="max-height: 60vh;">
       <!-- Item 1 -->
       <div class="cart-item d-flex align-items-center justify-content-between mb-3 p-2 border rounded shadow-sm">
         <img src="../Client/Assets/Images/Wristwatches for Sale - Shop New & Used Watches - eBay.jpg" class="img-thumbnail border-0 me-3" style="width: 60px; height: 60px; object-fit: cover;">

         <div class="flex-grow-1">
           <h6 class="mb-1">Tressfix Shampoo</h6>
           <small class="text-muted">Qty: 1</small>
           <p class="mb-0 fw-semibold text-primary">Rs. 840</p>
         </div>

         <button class="btn btn-sm btn-outline-danger ms-2" title="Remove">&times;</button>
       </div>

       <!-- Item 2 -->
       <div class="cart-item d-flex align-items-center justify-content-between mb-3 p-2 border rounded shadow-sm">
         <img src="../Client/Assets/Images/Wristwatches for Sale - Shop New & Used Watches - eBay.jpg" class="img-thumbnail border-0 me-3" style="width: 60px; height: 60px; object-fit: cover;">

         <div class="flex-grow-1">
           <h6 class="mb-1">Hair Serum</h6>
           <small class="text-muted">Qty: 2</small>
           <p class="mb-0 fw-semibold text-primary">Rs. 1,200</p>
         </div>

         <button class="btn btn-sm btn-outline-danger ms-2" title="Remove">&times;</button>
       </div>
     </div>

     <!-- 💰 Cart Summary -->
     <div class="cart-summary border-top pt-3 mt-3">
       <div class="d-flex justify-content-between mb-2">
         <span class="fw-semibold">Subtotal</span>
         <span class="fw-semibold">Rs. 2,040</span>
       </div>
       <div class="d-flex justify-content-between text-muted small mb-3">
         <span>Delivery</span>
         <span>Free</span>
       </div>

       <div class="d-flex justify-content-between fs-5 fw-bold text-dark">
         <span>Total</span>
         <span>Rs. 2,040</span>
       </div>

       <a href="./checkout.php" class="btn btn-success w-100 mt-4 fw-semibold">
         Proceed to Checkout
       </a>
       <a href="./view-cart.php" style="background-color: #2563EB;" class="btn btn-success w-100 mt-2 fw-semibold">
         View Cart
       </a>
     </div>

   </div>
 </div>


 <script>
   const offcanvas = document.getElementById("offcanvasRight");
   const cartItems = offcanvas.querySelectorAll(".cart-item");
   const buttons = offcanvas.querySelectorAll(".cart-summary button");

   const openAnimation = () => {
     // Pehle reset kar do sab
     gsap.set(offcanvas, {
       x: "100%",
       opacity: 0,
       visibility: "hidden"
     });
     gsap.set(cartItems, {
       opacity: 0,
       y: 30
     });
     gsap.set(buttons, {
       opacity: 0,
       y: 20
     });

     // Offcanvas slide-in
     gsap.to(offcanvas, {
       x: "0%",
       opacity: 1,
       visibility: "visible",
       duration: 0.5,
       ease: "power2.out",
       onStart: () => offcanvas.classList.add("show"),
       onComplete: () => {
         // Cart items stagger animation
         gsap.to(cartItems, {
           opacity: 1,
           y: 0,
           stagger: 0.1,
           duration: 0.4,
           ease: "power1.out"
         });

         // Buttons animation
         gsap.to(buttons, {
           opacity: 1,
           y: 0,
           delay: 0.3,
           duration: 0.3,
           stagger: 0.1,
           ease: "power1.out"
         });
       }
     });
   };

   const closeAnimation = () => {
     // Close items & buttons first
     gsap.to([...cartItems, ...buttons], {
       opacity: 0,
       y: 20,
       duration: 0.3,
       ease: "power1.in"
     });

     // Then hide offcanvas
     gsap.to(offcanvas, {
       x: "100%",
       opacity: 0,
       duration: 0.4,
       ease: "power2.in",
       delay: 0.2,
       onComplete: () => {
         offcanvas.classList.remove("show");
         offcanvas.style.visibility = "hidden";
       }
     });
   };

   // Trigger open
   document.querySelector('[data-bs-target="#offcanvasRight"]').addEventListener("click", (e) => {
     e.preventDefault();
     openAnimation();
   });

   // Trigger close
   document.querySelector("#offcanvasRight .btn-close").addEventListener("click", () => {
     closeAnimation();
   });
 </script>
 <!-- Bootstrap JS CDN -->

 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>
 <?php include("../Client/Components/footer.html"); ?>