<?php
include("./includes/header.html"); 
include("./Sidebar.php");
?>

<div class="container mx-2">
  <h2 class="text-center my-4">Add Product</h2>

  <main>
      <form method="post" action="" enctype="multipart/form-data">
      <div class="mb-3">
        <label class="form-label">Title</label>
        <input type="text" class="form-control" name="title" placeholder="Enter a Product Title" required>
      </div>

      <div class="form-floating mb-3">
       
        <textarea class="form-control" name="description" placeholder="Enter a Product Description" id="floatingTextarea2" style="height: 100px" required></textarea>
        <label for="floatingTextarea2">Description</label>
      </div>
      <div class="mb-3">
        <label class="form-label">Price</label>
        <input type="number" class="form-control" name="price" placeholder="Enter a Product Price" required>
      </div>
      <div class="mb-3">
        <label class="form-label">Select Image:</label>
        <input class="form-control" type="file" name="image" accept=".jpg, .jpeg, .png" required>
      </div>

      <button type="submit" class="btn btn-primary w-100 fw-bold">ADD PRODUCT</button>
    </form>

  </main>
</div>










  <?php include("./Includes/footer.html"); ?>
