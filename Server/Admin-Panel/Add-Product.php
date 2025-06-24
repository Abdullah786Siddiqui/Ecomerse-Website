<?php
include("./includes/header.html");
include("./Sidebar.php");
?>

<div class="container mx-2">
  <h2 class="text-center my-4">Add Product</h2>

  <form method="POST" enctype="multipart/form-data">
    <!-- Product Name -->
    <div class="form-group mb-3">
      <label for="name">Product Name</label>
      <input type="text" class="form-control" name="name" placeholder="Enter Product Name" required>
    </div>

    <div class="form-group mb-3">
      <label for="brand">Select Brand</label>
      <select name="brand_id" class="form-control" required>

        <option hidden>Select Brand</option>
        <?php
        $sql = "SELECT * FROM brand";
        $result = $conn->query($sql);
        while ($row = $result->fetch_assoc()) {
          $brandName = $row['name'];
          $brandId = $row['id'];
          echo "<option value='$brandId'>$brandName</option>";
        }
        ?>
      </select>
    </div>

    <!-- Category -->
    <div class="form-group mb-3">
      <label for="category">Category</label>
      <select name="category_id" class="form-control" required>
        <option hidden>Select Category</option>
        <?php
        $sql = "SELECT * FROM categories";
        $result = $conn->query($sql);
        while ($row = $result->fetch_assoc()) {
          $categoryName = $row['name'];
          $categoryId = $row['id'];
          echo "<option value='$categoryId'>$categoryName</option>";
        }
        ?>
      </select>
    </div>

    <!-- Subcategory -->
    <div class="form-group mb-3">
      <label for="subcategory">Subcategory</label>
      <select name="subcategory_id" id="subcategory" class="form-control" required>

        <option hidden>Select Subcategory</option>
        <?php
        $sql = "SELECT * FROM subcategories ";
        $result = $conn->query($sql);
        while ($row = $result->fetch_assoc()) {
          $subcategoriesName = $row['name'];
          $category_Id = $row['category_id'];
          echo "<option value='$category_Id'>$subcategoriesName</option>";
        }
        ?>
      </select>
    </div>



    <!-- Price -->
    <div class="form-group mb-3">
      <label for="price">Price</label>
      <input type="number" class="form-control" name="price" placeholder="Enter Product Price" required>
    </div>

    <!-- Description -->
    <div class="form-group mb-3">
      <label for="description">Description</label>
      <textarea class="form-control" rows="4" name="description" placeholder="Enter a Product Description"></textarea>
    </div>

    <!-- Product Images -->
    <div class="mb-3">
      <label class="form-label">Select Image:</label>
      <input class="form-control" type="file" name="image" accept=".jpg, .jpeg, .png" required>
    </div>



    <!-- Submit Button -->
    <button type="submit" class="btn btn-primary w-100 fw-bold mb-3">Add Product</button>
  </form>

</div>

<?php
if ($_SERVER['REQUEST_METHOD'] == "POST") {
  $name = $_POST['name'];
  $description = $_POST['description'];
  $price = $_POST['price'];
  $category_id = $_POST['category_id'];
  $subcategory_id = $_POST['subcategory_id'];
  $brand_id = $_POST['brand_id'];



  $imageName = $_FILES['image']['name'];
  $tmpImage = $_FILES['image']['tmp_name'];
  $uploadsDir = "../uploads/";
  if (!is_dir($uploadsDir)) {
    mkdir($uploadsDir);
  }
  $new_file = time() . "-" . basename($imageName);
  $destination = $uploadsDir . $new_file;
  if (move_uploaded_file($tmpImage, $destination)) {
    $sql = "INSERT INTO products(name, description, price, subcategory_id, brand_id)
        VALUES ('$name', '$description', '$price', '$subcategory_id', '$brand_id')";
    $result = $conn->query($sql);
    if ($result) {
      $product_id = $conn->insert_id; // Get the last inserted product ID
      $sql = "INSERT INTO product_images(product_id, image_url) VALUES ('$product_id', '$new_file')";
      $result = $conn->query($sql);
      if ($result) {
        echo "
        <script>
          alert('Your Product has been Added')
        </script>";
      } else {
        echo "Error in inserting product image.";
      }
    } else {

      echo "Error";
    }
  }
}  ?>








<?php include("./Includes/footer.html"); ?>