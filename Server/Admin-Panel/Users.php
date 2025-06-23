<?php
include("./includes/header.html");
include("./Sidebar.php");
?>






<div class="container mt-4">
  <h2 class="text-center mb-4">Users</h2>
  <div class="table-responsive">
    <table class="table table-bordered table-striped text-center">
      <thead class="table-dark">
        <tr>
          <th>#</th>
          <th>Name</th>
          <th>Email</th>
          <th>Phone</th>
          <th>Role</th>
          <th>status</th>
          <th>Registered On</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>1</td>
          <td>Ali Khan</td>
          <td>ali@example.com</td>
          <td>+1234567890</td>
          <td><span class="badge bg-secondary text-white">User</span></td>
          <td><span class="badge bg-success">Active</span></td>
          <td>2025-06-23</td>
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