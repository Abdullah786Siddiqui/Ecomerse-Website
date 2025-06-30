<?php
include './Components/header.html';

include './includes/Navbar.php';


$subCategory_id = $_GET['subcategory_id']
?>
<style>
    body {
        background-color: #f8f9fa;
    }

   
    #mobileSidebar {
        position: fixed;
        bottom: -100%;
        left: 0;
        width: 100%;
        max-height: 80%;
        background: #ffffff;
        box-shadow: 0 -4px 15px rgba(0, 0, 0, 0.2);
        transition: bottom 0.3s ease-in-out;
        overflow-y: auto;
        z-index: 9999;
        padding: 20px;
        border-top-left-radius: 15px;
        border-top-right-radius: 15px;
    }

    #mobileSidebar.active {
        bottom: 0;
    }

    #mobileSidebar h5,
    #mobileSidebar h6 {
        font-weight: 600;
    }

    #sidebarOverlay {
        position: fixed;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: rgba(0, 0, 0, 0.5);
        display: none;
        z-index: 9998;
    }

    #sidebarOverlay.active {
        display: block;
    }

    .filter-btn-mobile {
        position: fixed;
        top: 20px;
        right: 20px;
        z-index: 10000;
        border-radius: 50px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
    }

    @media (max-width: 767.98px) {
        .desktop-sidebar {
            display: none;
        }
    }

    .color-container {
        margin: 20px 0;
    }

    .color-title {
        font-weight: bold;
        margin-bottom: 10px;
    }

    .color-grid {
        display: flex;
        flex-wrap: wrap;
        gap: 6px;
        max-width: 220px;
    }

    .color-box {
        width: 24px;
        height: 24px;
        border: 1px solid #ccc;
        cursor: pointer;
        box-sizing: border-box;
    }

    .color-box:hover {
        border: 2px solid #007185;
    }

    
</style>
</head>

<body>

    <div id="sidebarOverlay" onclick="closeSidebar()"></div>

    <div class="container-fluid">
        <div style="height: 1000px;" class="row ">

            <div class="col-md-3 desktop-sidebar ">
                <h5>Filters</h5>
                <hr>
                <div>
                    <h6>Brand</h6>
                    <?php
                    $sql = "SELECT  DISTINCT brand.id as id ,   brand.name , products.subcategory_id as subcategory_id FROM products
INNER JOIN brand on brand.id = products.brand_id where products.subcategory_id = $subCategory_id ";
                    $result = $conn->query($sql);
                    while ($row = $result->fetch_assoc()) {
                        $brand_id = $row['id'];
                        $brand_name = $row['name'];

                    ?>
                        <div class="form-check">
                            <input class="form-check-input brand-filter" type="checkbox" value="<?= $brand_id ?>" id="brand<?= $brand_id ?>">
                            <label class="form-check-label" for="brand<?= $brand_id ?>"><?= $brand_name ?></label>
                        </div>
                    <?php
                    }
                    ?>
                </div>



                <hr>
                <div class="color-title ">
                    <h6> Color </h6>
                </div>
                <div class="color-grid">
                    <div class="color-box" style="background-color: #ffffff;"></div>
                    <div class="color-box" style="background-color: #000000;"></div>
                    <div class="color-box" style="background-color: #c2c2c2;"></div>
                    <div class="color-box" style="background-color: #7c6e66;"></div>
                    <div class="color-box" style="background-color: #a39a97;"></div>
                    <div class="color-box" style="background-color: #f6d6d6;"></div>

                    <div class="color-box" style="background-color:rgb(240, 191, 16);"></div>
                    <div class="color-box" style="background-color:rgb(218, 110, 28);"></div>
                    <div class="color-box" style="background-color:rgb(74, 112, 194);"></div>
                    <div class="color-box" style="background-color:rgb(47, 214, 117);"></div>
                    <div class="color-box" style="background-color:rgb(232, 101, 107);"></div>
                    <div class="color-box" style="background-color: #934c2f;"></div>

                    <div class="color-box" style="background-color: #d3d3d3;"></div>
                    <div class="color-box" style="background-color: #a9a9a9;"></div>
                    <div class="color-box" style="background-color: #9932cc;"></div>
                    <div class="color-box" style="background-color: #ff0000;"></div>
                    <div class="color-box" style="background-color: #bada55;"></div>
                    <div class="color-box" style="background-color: #ffffff;"></div>
                </div>
                <hr>
                <div class="sidebar-title">
                    <h6> Deal Discount </h6>
                </div>
                <div class="form-check"><input class="form-check-input" type="checkbox" id="brand2"><label class="form-check-label" for="brand2">All Discounts</label></div>
                <div class="form-check"><input class="form-check-input" type="checkbox" id="brand2"><label class="form-check-label" for="brand2">Today Discounts</label></div>
                <hr>
                <div class="sidebar-title">
                    <h6> Seller </h6>
                </div>
                <div class="form-check"><input class="form-check-input" type="checkbox" id="brand2"><label class="form-check-label" for="brand2">Amazon.com</label></div>
                <div class="form-check"><input class="form-check-input" type="checkbox" id="brand2"><label class="form-check-label" for="brand2">Disney</label></div>
                <hr>
                <div class="sidebar-title">
                    <h6> Condition </h6>
                </div>
                <div class="form-check"><input class="form-check-input" type="checkbox" id="brand2"><label class="form-check-label" for="brand2">New</label></div>
                <div class="form-check"><input class="form-check-input" type="checkbox" id="brand2"><label class="form-check-label" for="brand2">Old</label></div>
                <hr>
                <div class="sidebar-title">
                    <h6> Popular Shopping Ideas</h6>
                </div>
                <div id="sidebar-items">
                    <div>Plastic</div>
                    <div>Drawer</div>
                    <div>Cooking</div>
                    <div>Backpack</div>
                    <div>Wall</div>
                    <div>Bamboo</div>
                    <div class="more-items d-none">
                        <div>Japanese</div>
                        <div>Work</div>
                        <div>Organizer</div>
                        <div>Shelf</div>
                        <div>Korean</div>
                        <div>Bohemian</div>
                        <div>Closet</div>
                    </div>
                    <div class="see-more" onclick="toggleMore()">▼ See More</div>
                </div>
                <hr>
                <button class="btn btn-primary btn-block">Apply Filter</button>
            </div>
            <div class="col-md-9">
                <button class="btn btn-primary d-md-none filter-btn-mobile" onclick="openSidebar()">Filters</button>

                <div id="product-list">
                    <div class="row mt-4">
                        <?php
                        $sql = "SELECT products.id as productid , products.name , products.description , products.price , brand.name as brand , product_images.image_url  
                FROM products
                INNER JOIN product_images ON product_images.product_id = products.id
                INNER JOIN brand ON brand.id = products.brand_id  
                WHERE products.subcategory_id = $subCategory_id ";
                        $result = $conn->query($sql);
                        while ($row = $result->fetch_assoc()) {
                            $product_id = $row['productid']
                        ?>
                            <div class="col-sm-6 col-md-4 mb-4 product-card-animate">
                                <div class="card border-0 shadow-sm rounded-4 h-100 p-3 position-relative">

                                    <!-- Discount Badge -->
                                    <span class="badge bg-danger position-absolute top-0 start-0 m-2 small">25% OFF</span>

                                    <!-- Product Image -->
                                    <img src="../Server/uploads/<?= $row['image_url']; ?>" class="img-fluid rounded-3 mb-2" alt="Product">

                                    <!-- Product Name -->
                                    <h6 class="fw-semibold mb-1 text-truncate"><?= $row['name'] ?></h6>

                                    <!-- Price -->
                                    <p class="mb-1">
                                        <span class="fw-bold text-success">Rs.<?= $row['price'] ?></span>
                                        <small class="text-muted text-decoration-line-through ms-2">Rs.1,120</small>
                                    </p>

                                    <!-- Rating -->
                                    <div class="text-warning small mb-2">★★★★☆ <span class="text-muted">(1)</span></div>

                                    <!-- Action Button -->
                                    <a href="./product-detail.php?productid=<?= $product_id; ?>" class="btn btn-sm btn-outline-primary w-100 fw-semibold mb-3">View Details</a>
  <a class="btn btn-primary fw-bold w-100" onclick="addToCart(<?= $product_id ; ?>)">Add to Cart</a>
                                </div>
                            </div>

                        <?php } ?>
                    </div>
                </div>
                <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


                <script>
                    function animateProductExit(callback) {
                        gsap.to('.product-card-animate', {
                            y: 30,
                            opacity: 0,
                            scale: 0.95,
                            duration: 0.4,
                            stagger: 0.05,
                            ease: "power2.in",
                            onComplete: callback
                        });
                    }

                    function animateNewProducts() {
                        gsap.from('.product-card-animate', {
                            y: 20,
                            opacity: 0,
                            scale: 0.98,
                            duration: 0.6,
                            stagger: 0.1,
                            ease: "power3.out"
                        });
                    }
                    $(document).ready(function() {
                        animateNewProducts();
                    });

                    $('.brand-filter').on('change', function() {
                        var selectedBrands = [];

                        $('.brand-filter:checked').each(function() {
                            selectedBrands.push($(this).val());
                        });

                        animateProductExit(function() {
                            $.ajax({
                                url: 'filter_products.php',
                                method: 'POST',
                                data: {
                                    brands: selectedBrands,
                                    subcategory_id: <?= $subCategory_id ?>
                                },
                                success: function(response) {
                                    $('#product-list').html(response);
                                    animateNewProducts();
                                }
                            });
                        });
                    });
                </script>

            </div>

        </div>
    </div>

    <div id="mobileSidebar">
        <h5>Filters</h5>
        <hr>
        <div>
            <h6>Brand</h6>
            <div class="form-check"><input class="form-check-input" type="checkbox" id="brand1"><label class="form-check-label" for="brand1">DELL</label></div>

        </div>
        <hr>
        <div class="color-title">Color</div>
        <div class="color-grid">
            <div class="color-box" style="background-color: #ffffff;"></div>
            <div class="color-box" style="background-color: #000000;"></div>
            <div class="color-box" style="background-color: #c2c2c2;"></div>
            <div class="color-box" style="background-color: #7c6e66;"></div>
            <div class="color-box" style="background-color: #a39a97;"></div>
            <div class="color-box" style="background-color: #f6d6d6;"></div>

            <div class="color-box" style="background-color:rgb(240, 191, 16);"></div>
            <div class="color-box" style="background-color:rgb(218, 110, 28);"></div>
            <div class="color-box" style="background-color:rgb(74, 112, 194);"></div>
            <div class="color-box" style="background-color:rgb(47, 214, 117);"></div>
            <div class="color-box" style="background-color:rgb(232, 101, 107);"></div>
            <div class="color-box" style="background-color: #934c2f;"></div>

            <div class="color-box" style="background-color: #d3d3d3;"></div>
            <div class="color-box" style="background-color: #a9a9a9;"></div>
            <div class="color-box" style="background-color: #9932cc;"></div>
            <div class="color-box" style="background-color: #ff0000;"></div>
            <div class="color-box" style="background-color: #bada55;"></div>
            <div class="color-box" style="background: linear-gradient(45deg, brown, green, blue);"></div>

            <div class="color-box" style="background-color: #ffffff;"></div>
        </div>
        <hr>
        <div class="sidebar-title">Deals & Discount</div>
        <div class="form-check"><input class="form-check-input" type="checkbox" id="brand2"><label class="form-check-label" for="brand2">All Discounts</label></div>
        <div class="form-check"><input class="form-check-input" type="checkbox" id="brand2"><label class="form-check-label" for="brand2">Today Discounts</label></div>
        <hr>
        <div class="sidebar-title">Condition</div>
        <div class="form-check"><input class="form-check-input" type="checkbox" id="brand2"><label class="form-check-label" for="brand2">New</label></div>
        <div class="form-check"><input class="form-check-input" type="checkbox" id="brand2"><label class="form-check-label" for="brand2">Old</label></div>
        <hr>
        <div class="sidebar-title">Popular Shopping Ideas</div>
        <div id="sidebar-items">
            <div>Plastic</div>
            <div>Drawer</div>
            <div>Cooking</div>
            <div>Backpack</div>
            <div>Wall</div>
            <div>Bamboo</div>
            <div class="more-items d-none">
                <div>Japanese</div>
                <div>Work</div>
                <div>Organizer</div>
                <div>Shelf</div>
                <div>Korean</div>
                <div>Bohemian</div>
                <div>Closet</div>
            </div>
            <div class="see-more" onclick="toggleMore()">▼ See More</div>
        </div>
        <hr>
        <button class="btn btn-primary btn-block" onclick="closeSidebar()">Apply Filter</button>
        <hr>
    </div>
    <script>
        function openSidebar() {
            document.getElementById('mobileSidebar').classList.add('active');
            document.getElementById('sidebarOverlay').classList.add('active');
        }

        function closeSidebar() {
            document.getElementById('mobileSidebar').classList.remove('active');
            document.getElementById('sidebarOverlay').classList.remove('active');
        }

        function toggleMore() {
            const items = document.querySelectorAll('.more-items');
            const link = document.querySelector('.see-more');
            items.forEach(item => item.classList.toggle('d-none'));
            link.innerHTML = link.innerHTML.includes('More') ? '▲ See Less' : '▼ See More';
        }
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>

    <?php include './Components/footer.html';  ?>