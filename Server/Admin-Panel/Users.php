<?php
include("./includes/header.html");
include("./Sidebar.php");
?>

<style>
  .product-img {
    width: 40px;
    height: 40px;
    object-fit: cover;
  }

  .out-of-stock {
    color: #ff6600;
    background-color: #ffe6cc;
    padding: 2px 8px;
    border-radius: 5px;
    font-size: 0.8rem;
    white-space: nowrap;
  }

  .add-btn {
    background-color: #f1f1ff;
    border: 1px solid #ddd;
    color: #007bff;
  }

  @media (max-width: 768px) {
    .table-control-wrapper {
      flex-direction: column;
      align-items: stretch;
    }

    .table-control-wrapper>div,
    .table-control-wrapper>input,
    .table-control-wrapper>button {
      width: 100% !important;
    }

    .table-control-wrapper input {
      margin-top: 8px;
      margin-bottom: 8px;
    }

    .add-btn {
      width: 100%;
      text-align: center;
    }
  }
</style>


<div class="container  p-3">
  <h4 class="mb-4 text-center ">View Users List</h4>
  <div class="d-flex justify-content-between align-items-center mb-3 flex-wrap gap-2 table-control-wrapper">

    <div class="d-flex align-items-center gap-2 flex-wrap">

      <label for="showEntries">Showing</label>
      <select id="showEntries" class="form-select form-select-sm" style="width: 70px;">
        <option selected>10</option>
        <option>25</option>
        <option>50</option>
      </select>
    </div>

    <input type="text" class="form-control w-50 flex-grow-1 " placeholder="Search here..." />

  </div>
  <div class="table-responsive">
    <table class="table table-hover   table-striped align-middle">
      <thead class="table-light">
        <tr>
          <th>#</th>
          <th>Name</th>
          <th>Email</th>
          <th>Phone</th>
          <th>Role</th>
          <th>status</th>
          <th>Registered On</th>
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
            


          </tr>
        <?php


        }
        ?>

      </tbody>
    </table>
  </div>
</div>
<
  <!-- <div class="container mt-4">
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
  </div> -->
  <?php include("./Includes/footer.html"); ?>