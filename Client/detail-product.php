<?php
include './Components/header.html';

include './includes/Navbar.php';
?>
<style>
    .quantity-box {
        display: inline-flex;
        align-items: center;
        border: 1px solid #000;
        border-radius: 999px;
        padding: 3px 10px;
    }

    .quantity-box button {
        border: none;
        background: transparent;
        font-size: 20px;
        padding: 0 8px;
        cursor: pointer;
    }

    .quantity-box input {
        border: none;
        width: 30px;
        text-align: center;
    }


    .product-title {
        font-size: 2rem;
        font-weight: 700;
    }

    .price del {
        color: #999;
        margin-right: 10px;
    }

    .price strong {
        color: red;
        font-size: 1.4rem;
    }

    @media (max-width: 768px) {
        .product-title {
            font-size: 1.5rem;
        }
    }

    .rating {
        color: gold;
        font-size: 14px;
    }
</style>
</head>

<body>

    <div class="container mt-5 py-5 ">
        <div class="row  g-4">

            <!-- Product Image -->
            <div class="col-md-5 text-center">

                <img src="./Assets/Images/Lantern Sleeve Solid Shirt.jpg" class="img-fluid" alt="Serum Image">
            </div>

            <!-- Product Info -->
            <div class="col-md-7">
                <h1 class="product-title">Samsung Wireless Handphone</h1>
                <p class="price mt-2">
                    <del>Rs.1,000.00</del>
                    <strong>Rs.700.00</strong>
                </p>

                <!-- Quantity and Buttons -->
                <div class="d-flex align-items-center flex-wrap gap-2 mt-3">
                    <div class="quantity-box">
                        <button onclick="changeQty(-1)">−</button>
                        <input type="text" id="qty" value="1" readonly />
                        <button onclick="changeQty(1)">+</button>
                    </div>
                    <button class="btn btn-primary rounded-pill px-4">ADD TO CART</button>
                    <!-- Favorite Button with Link -->
                    <a href="https://yourwebsite.com/wishlist" title="Go to Wishlist" class="btn btn-outline-danger rounded-circle" id="favBtn" onclick="toggleHeart(event)">
                        <i class="fa-regular fa-heart" id="heartIcon"></i>
                    </a>





                </div>

                <!-- Meta Info -->
                <div class="mt-4">
                    <div class="rating mb-1">★★★★☆ (80%)</div>
                    <p><strong>Type:</strong> Swireless</p>
                    <p><strong>SKU:</strong> S-1001</p>
                    <p><strong>Availability:</strong> In Stock</p>
                    <p><strong>Categories:</strong> All Products, handphones</p>
                </div>



            </div>
        </div>


        <h4 class="mb-4">Comments</h4>

        <!-- Comment List -->
        <div class="mb-4">
            <div class="d-flex mb-3">
                <img src="./images//idd.png" class="rounded-circle me-3" alt="User" width="50" height="50">
                <div>
                    <h6 class="mb-1">John Doe <small class="text-muted ms-2">2 hours ago</small></h6>
                    <p class="mb-0">This product is amazing. The sound quality is great!</p>
                </div>
            </div>

            <div class="d-flex mb-3">
                <img src="./images//id1.png" class="rounded-circle me-3" alt="User" width="50" height="50">
                <div>
                    <h6 class="mb-1">Sara Khan <small class="text-muted ms-2">1 day ago</small></h6>
                    <p class="mb-0">Received it yesterday. Packaging was nice and it works well.</p>
                </div>
            </div>
        </div>

        <!-- Add New Comment -->
        <form>
            <div class="mb-3 w-50">
                <label for="comment" class="form-label">Your Comment</label>
                <textarea class="form-control" id="comment" rows="3" placeholder="Write your comment..." required></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Post Comment</button>
        </form>

    </div>








    <script>
        function toggleHeart(e) {
            e.preventDefault(); // Prevent navigation for toggle effect
            const icon = document.getElementById("heartIcon");

            if (icon.classList.contains("fa-regular")) {
                icon.classList.remove("fa-regular");
                icon.classList.add("fa-solid");
            } else {
                icon.classList.remove("fa-solid");
                icon.classList.add("fa-regular");
            }

            // Optional: uncomment below to actually navigate after 300ms
            // setTimeout(() => window.location.href = e.currentTarget.href, 300);
        }
    </script>


    <script>
        function changeQty(amount) {
            const qtyInput = document.getElementById('qty');
            let current = parseInt(qtyInput.value);
            current += amount;
            if (current < 1) current = 1;
            qtyInput.value = current;
        }
    </script>

    <?php include './Components/footer.html';  ?>