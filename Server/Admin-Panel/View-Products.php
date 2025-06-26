<?php
include("./includes/header.html");
include("./Sidebar.php");
?>

<div class="container">
  <h2 class="text-center my-4">Show Product</h2>

  <div class="main">
    <div class="table-responsive"> <!-- Mobile responsiveness -->
      <table class="table table-bordered table-striped text-center align-middle">
        <thead class="table-dark">
          <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Description</th>
            <th scope="col">Price</th>
            <th scope="col">Brand</th>
            <th scope="col">Image</th>
            <th scope="col">Edit</th>
            <th scope="col">Delete</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $sql = "SELECT products.id , products.name  , products.description , products.price , brand.name as brand , product_images.image_url  FROM products
INNER JOIN product_images on product_images.product_id = products.id
INNER JOIN brand on brand.id = products.brand_id";
          $result = $conn->query($sql);
          while ($row = $result->fetch_assoc()) {

          ?>
            <tr>
              <td><?= $row['id'] ?></td>
              <td><?= $row['name'] ?></td>
              <td><?= $row['description'] ?></td>
              <td><?= $row['price'] ?></td>
              <td><?= $row['brand'] ?></td>
              <td><img style="border-radius: 50% ; object-fit: cover;" src="../uploads/<?= $row['image_url']; ?>" width="50" height="50" alt="Product_Image"></td>
              <td><a href="#" class="btn btn-success">Edit</a></td>
              <td><a href="#" class="btn btn-danger">Delete</a></td>


            </tr>
          <?php


          }
          ?>
        </tbody>
      </table>
    </div>
  </div>
</div>
<?php include("./Includes/footer.html"); ?>