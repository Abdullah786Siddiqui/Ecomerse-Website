 <?php
    include("./config/db.php");
    include("./includes/header.html");
    include("./Sidebar.php");

    ?>

 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
 <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

 <h3 class="text-center mt-3">Welcome to Admin Panel</h3>
 <style>
     :root {
         --primary: #4e73df;
         --secondary: #1cc88a;
         --danger: #e74a3b;
         --warning: #f6c23e;
         --info: #36b9cc;
         --bg: #f8f9fc;
         --card: #ffffff;
         --shadow: rgba(0, 0, 0, 0.1);
     }

     body {
         background: var(--bg);
         color: #5a5c69;
     }

     .card {
         background: var(--card);
         border: none;
         border-radius: 0.75rem;
         box-shadow: 0 0.25rem 1rem var(--shadow);
         transition: transform 0.3s ease;
     }

     .card:hover {
         transform: translateY(-5px);
     }

     .table thead {
         background-color: var(--primary);
         color: white;
         position: sticky;
         top: 0;
     }

     .badge {
         font-size: 0.8rem;
     }

     .table-responsive {
         max-height: 300px;
         overflow-y: auto;
     }

     .kpi-icon {
         font-size: 2rem;
     }

     .chart-container {
         position: relative;
         height: 300px;
         width: 100%;
     }
 </style>
 </head>

 <body>
     <div class="container-fluid p-4">
         <div class="row g-4">
             <?php

                $sql = "SELECT 
    COUNT(orders.id) AS order_count,
    SUM(orders.total) AS total_sales,
    COUNT(CASE WHEN orders.status = 'delivered' THEN 1 END) AS paid_orders
FROM 
    orders
    INNER JOIN order_items ON orders.id = order_items.order_id
WHERE 
    orders.created_at >= DATE_FORMAT(CURDATE(), '%Y-%m-01');
";
                $result = $conn->query($sql);
                if ($row = $result->fetch_assoc()) {
                ?>
                 <!-- KPI Cards -->
                 <div class="col-md-3">
                     <div class="card p-3 text-center">
                         <div class="kpi-icon mb-2 text-success"><i class="bi bi-cart-check"></i></div>
                         <h6>Total Order this Month</h6>
                         <h4>$<?= $row['order_count'] ?></h4>
                         <span class="text-success">▲ 1.56%</span>
                     </div>
                 </div>
                 <div class="col-md-3">
                     <div class="card p-3 text-center">
                         <div class="kpi-icon mb-2 text-warning"><i class="bi bi-currency-dollar"></i></div>
                         <h6>Total Income</h6>
                         <h4>$<?= $row['total_sales'] ?></h4>
                         <span class="text-danger">▼ 1.56%</span>
                     </div>
                 </div>
                 <div class="col-md-3">
                     <div class="card p-3 text-center">
                         <div class="kpi-icon mb-2 text-info"><i class="bi bi-receipt"></i></div>
                         <h6>Orders Paid</h6>
                         <h4>$<?= $row['paid_orders'] ?></h4>
                         <span class="text-success">▲ 1.56%</span>

                     </div>
                 </div>
             <?php } ?>
             <?php
                $sql_user = "SELECT COUNT(id) as user_count from users";
                $result_user = $conn->query($sql_user);
                if ($row = $result_user->fetch_assoc()) {
                ?>
                 <div class="col-md-3">
                     <div class="card p-3 text-center">
                         <div class="kpi-icon mb-2 text-primary"><i class="bi bi-people"></i></div>
                         <h6>Total Users</h6>
                         <h4><?= $row['user_count'] ?></h4>
                         <span class="text-success">▲ 1.56%</span>
                     </div>
                 </div>
             <?php } ?>
             <!-- Graph + Tables -->
             <div class="col-lg-8">
                 <div class="card p-3 mb-4">
                     <h5 class="mb-3">Recent Orders Graph</h5>
                     <div class="chart-container">
                         <canvas id="ordersChart"></canvas>
                     </div>
                 </div>
             </div>

             <div class="col-lg-4">
                 <div class="card p-3 mb-4">
                     <h5>Top Countries by Sales</h5>
                     <div class="table-responsive">
                         <table class="table table-sm">
                             <thead>
                                 <tr>
                                     <th>Country</th>
                                     <th>Sales</th>
                                     <th>Trend</th>
                                 </tr>
                             </thead>
                             <tbody>
                                 <tr>
                                     <td>🇹🇷 Turkey</td>
                                     <td>6,972</td>
                                     <td class="text-success">▲ 4.2%</td>
                                 </tr>
                                 <tr>
                                     <td>🇧🇪 Belgium</td>
                                     <td>6,542</td>
                                     <td class="text-success">▲ 2.1%</td>
                                 </tr>
                                 <tr>
                                     <td>🇸🇪 Sweden</td>
                                     <td>6,210</td>
                                     <td class="text-danger">▼ 1.3%</td>
                                 </tr>
                                 <tr>
                                     <td>🇻🇳 Vietnam</td>
                                     <td>5,990</td>
                                     <td class="text-success">▲ 3.8%</td>
                                 </tr>
                             </tbody>
                         </table>
                     </div>
                 </div>
             </div>

             <!-- Tables -->
             <div class="col-md-6">
                 <div class="card p-3">
                     <h5 class="mb-3">Top Products</h5>
                     <div class="table-responsive">
                         <table class="table">
                             <thead>
                                 <tr>
                                     <th>Product</th>
                                     <th>Items</th>
                                     <th>Coupon</th>
                                 </tr>
                             </thead>
                             <tbody>
                                 <tr>
                                     <td>Fragrance Lotion</td>
                                     <td>100</td>
                                     <td><span class="badge bg-info">Sifat</span></td>
                                 </tr>
                                 <tr>
                                     <td>Adult Cat Food</td>
                                     <td>100</td>
                                     <td><span class="badge bg-info">Sifat</span></td>
                                 </tr>
                                 <tr>
                                     <td>Puppy Dry Food</td>
                                     <td>100</td>
                                     <td><span class="badge bg-info">Sifat</span></td>
                                 </tr>
                                 <tr>
                                     <td>Cookie Box</td>
                                     <td>100</td>
                                     <td><span class="badge bg-info">Sifat</span></td>
                                 </tr>
                             </tbody>
                         </table>
                     </div>
                 </div>
             </div>

             <div class="col-md-6">
                 <div class="card p-3">
                     <h5 class="mb-3">Recent Orders</h5>
                     <div class="table-responsive">
                         <table class="table">
                             <thead>
                                 <tr>
                                     <th>ID</th>
                                     <th>Customer</th>
                                     <th>Status</th>
                                     <th>Total</th>
                                 </tr>
                             </thead>
                             <tbody>
                                 <tr>
                                     <td>#001</td>
                                     <td>John Doe</td>
                                     <td><span class="badge bg-success">Completed</span></td>
                                     <td>$120</td>
                                 </tr>
                                 <tr>
                                     <td>#002</td>
                                     <td>Jane Smith</td>
                                     <td><span class="badge bg-warning text-dark">Pending</span></td>
                                     <td>$89</td>
                                 </tr>
                                 <tr>
                                     <td>#003</td>
                                     <td>XYZ Corp</td>
                                     <td><span class="badge bg-danger">Cancelled</span></td>
                                     <td>$200</td>
                                 </tr>
                                 <tr>
                                     <td>#004</td>
                                     <td>Mark Lee</td>
                                     <td><span class="badge bg-success">Completed</span></td>
                                     <td>$140</td>
                                 </tr>
                             </tbody>
                         </table>
                     </div>
                 </div>
             </div>

         </div>
     </div>

     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
     <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.0/dist/chart.umd.min.js"></script>
     <script>
         const ctx = document.getElementById('ordersChart').getContext('2d');
         new Chart(ctx, {
             type: 'line',
             data: {
                 labels: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'],
                 datasets: [{
                     label: 'Orders',
                     data: [120, 150, 140, 180, 210, 200, 240],
                     borderColor: '#4e73df',
                     backgroundColor: 'rgba(78, 115, 223, 0.15)',
                     tension: 0.4,
                     fill: true
                 }]
             },
             options: {
                 responsive: true,
                 maintainAspectRatio: false,
                 plugins: {
                     legend: {
                         display: false
                     }
                 },
                 scales: {
                     x: {
                         grid: {
                             display: false
                         }
                     },
                     y: {
                         beginAtZero: true,
                         grid: {
                             color: '#e9ecef'
                         }
                     }
                 }
             }
         });
     </script>



     <!-- Bootstrap JS (First) -->
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

     <!-- Then your custom JS files -->
     <script src="./assets/JS/add-Product.js"></script>
     <script src="./assets/JS/subcategory.js"></script>
     <script src="./assets/JS/admin.js"></script>





 </body>

 </html>