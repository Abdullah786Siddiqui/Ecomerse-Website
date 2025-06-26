 <?php
  include("../Server/Admin-Panel/config/db.php");
  include("../Client/Components/header.html");
  session_start();

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
     color: white;
     padding: 0;
   }

   .dropdown-toggle-no-arrow::after {
     display: none;
     /* Hide default Bootstrap arrow */
   }

   .dropdown-menu a {
     color: black;
     /* Dropdown item text color */
   }

   .navbar-scrollable {
     overflow-x: auto;
     white-space: nowrap;
     -webkit-overflow-scrolling: touch;
   }

   .navbar-scrollable>.dropdown {
     display: inline-block;
   }
 </style>

 <!-- Bootstrap CSS -->
 <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" />


 <nav class="navbar px-1 position-sticky">
   <div class="container-fluid d-flex flex-wrap flex-row align-items-center navbar-container">

     <!-- Logo -->
     <div class="logo">
       <a class="navbar-brand text-black fw-bold d-flex align-items-center " href="./index.php" id="logo">
         <i style="color: #2563EB ;transform: rotate(45deg);" class="ri-shining-fill "></i> Alexa
       </a>
     </div>

     <!-- Search Bar -->
     <div class="search-wrapper d-flex justify-content-center " style="filter: drop-shadow(0 4px 6px rgba(0,0,0,0.1))" id="search">
       <form class="w-100 d-flex justify-content-center" role="search">
         <div class="input-group custom-width w-100">
           <input type="text" class="form-control" placeholder="Search! What ever you Wants" aria-label="Search" />
           <span class="input-group-text bg-white">
             <i class="fas fa-search"></i>
           </span>
         </div>
       </form>
     </div>



     <!-- Icons -->
     <div class="d-flex justify-content-center align-items-center gap-3 text-black fs-5 icons" id="icons">

       <?php
        if (isset($_SESSION['user_id'])) {
          echo '<span class="fw-semibold text-dark">Welcome, ' . htmlspecialchars($username) . '</span>';
        } else {
        ?>
         <div class="dropdown">
           <a href="#" class="d-inline-block" data-bs-toggle="dropdown" aria-expanded="false">
             <i class="fas fa-user-circle profile-img rounded-circle" style="width: 25px; height: 25px;"></i>
           </a>
           <ul class="dropdown-menu dropdown-menu-end ">
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

       <i class="fa-regular fa-heart cursor-pointer mt-1 "></i>
       <i class="fa-solid fa-cart-shopping cursor-pointer mt-1 " type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight"></i>
     </div>

   </div>
 </nav>
 <div class="bg-primary py-2">
   <div class=" d-flex flex-column flex-md-row flex-wrap justify-content-center gap-2 gap-md-4 px-2 px-md-0">

     <!-- Browse All Categories -->
     <div class="dropdown">
       <button class="dropdown-toggle-no-arrow text-black fw-bold " type="button" data-bs-toggle="dropdown" aria-expanded="false">
         Browse All Categories
       </button>

     </div>

     <!-- Electronics Dropdown -->
     <div class="dropdown">
       <button class="dropdown-toggle-no-arrow" type="button" data-bs-toggle="dropdown" aria-expanded="false">
         Electronics
       </button>
       <ul class="dropdown-menu">
         <?php
          $sql = "SELECT * FROM subcategories WHERE  category_id  = 1";
          $result = $conn->query($sql);
          while ($row = $result->fetch_assoc()) {
            $subcategory = $row['name'];
            echo "<li><a class='dropdown-item' >$subcategory </a></li>";
          }
          ?>


       </ul>
     </div>

     <!-- Health & Beauty -->
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
            echo "<li><a class='dropdown-item' >$subcategory </a></li>";
          }
          ?>
       </ul>
     </div>

     <!-- Home & Lifestyle -->
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

     <!-- TV & Home Appliances -->
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

     <!-- Fashions -->
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

     <!-- Books & Stationery -->
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


 <script>
   window.addEventListener('resize', function() {
     const navbarHeight = document.querySelector('.navbar').offsetHeight;
     document.querySelector('.navbar1').style.top = navbarHeight + 'px';
   });

   // Run once on page load
   window.dispatchEvent(new Event('resize'));
 </script>




 <div class="offcanvas offcanvas-end offcanvas-mobile-75" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
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
       <button style="background-color: #2563EB;" class="btn btn-success w-100 mt-2 fw-semibold">
         View Cart
       </button>
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