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
        <?php
        $sql = "SELECT * FROM users ORDER BY id";
        $result = $conn->query($sql);
        while ($row = $result->fetch_assoc()) {

        ?>
          <tr>
            <td><?= $row['id'] ?></td>
            <td><?= $row['name'] ?></td>
            <td><?= $row['email'] ?></td>
            <td><?= $row['phone'] ?></td>
            <td><span class="badge bg-primary"><?= $row['role'] ?></span></td>
            <td><span class="badge bg-success"><?= $row['status'] ?></span></td>
            <td><?= $row['created_at'] ?></td>
            <td>
              <a href="#" class="btn btn-sm btn-primary">View</a>
              <a href="#" class="btn btn-sm btn-success">Mark Done</a>
              <a href="#" class="btn btn-sm btn-danger">Delete</a>
            </td>


          </tr>
        <?php


        }
        ?>

      </tbody>
    </table>
  </div>
</div>
<?php include("./Includes/footer.html"); ?>