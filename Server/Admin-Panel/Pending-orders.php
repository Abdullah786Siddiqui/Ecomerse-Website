

<?php
include("./includes/header.html"); 
include("./Sidebar.php");
?>






<div class="container mt-4">
  <h2 class="text-center mb-4">Pending Orders</h2>
  <div class="table-responsive">
    <table class="table table-bordered table-striped text-center">
      <thead class="table-dark">
        <tr>
          <th>#</th>
          <th>Order ID</th>
          <th>Customer</th>
          <th>Products</th>
          <th>Amount</th>
          <th>Payment</th>
          <th>Date</th>
          <th>Status</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>1</td>
          <td>#ORD1234</td>
          <td>Zubair Khan</td>
          <td>Watch,Laptop</td>
          <td>Rs. 7,500</td>
          <td>Cash on Delivery</td>
          <td>2025-06-23</td>
          <td><span class="badge bg-warning">Pending</span></td>
          <td>
            <a href="#" class="btn btn-sm btn-primary">View</a>
            <a href="#" class="btn btn-sm btn-success">Mark Done</a>
            <a href="#" class="btn btn-sm btn-danger">Delete</a>
          </td>
        </tr>
        <!-- More rows -->
      </tbody>
    </table>
  </div>
</div>
<?php include("./Includes/footer.html"); ?>
