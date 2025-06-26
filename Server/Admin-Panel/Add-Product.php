
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin Panel</title>
    <!-- Bootstrap CSS -->
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css"
    />

    <!-- Font Awesome -->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
    />

    <!-- Remix Icon -->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/4.6.0/remixicon.css"
    />

    <!-- Bootstrap Icons (for bi bi-icon) -->
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css"
      rel="stylesheet"
    />

    <!-- Custom CSS -->
    <link rel="stylesheet" href="../assets/CSS/style.css" />
  </head>
  <body>
<?php
include("./Sidebar.php");
?>

<div class="container mx-2">
  <h2 class="text-center my-4">Add Product</h2>

  <form method="POST" id="product-form" enctype="multipart/form-data">
    <!-- Product Name -->
    <div class="form-group mb-3">
      <label for="name">Product Name</label>
      <input type="text" id="product-name" class="form-control" name="name" placeholder="Enter Product Name" >
      <p class="text-danger  mx-2" id="name-error"></p>

    </div>

    <div class="form-group mb-3">
      <label for="brand">Select Brand</label>
      <select name="brand_id" class="form-control" >

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
      <p class="text-danger  mx-2" id="brand-error"></p>

    </div>

    <!-- Category -->
    <div class="form-group mb-3">
      <label for="category">Category</label>
      <select name="category_id" id="category" class="form-control" >
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
      <p class="text-danger  mx-2" id="category-error"></p>

    </div>

    <!-- Subcategory -->
    <div class="form-group mb-3">
      <label for="category">Sub Category</label>
      <select name="subcategory_id" id="subcategory" class="form-control" >
        <option hidden>Select Subcategory</option>
      </select>
      <p class="text-danger  mx-2" id="subcategory-error"></p>

    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
      $(document).ready(function() {
        $('#category').change(function() {
          var categoryId = $(this).val();
          
          $.ajax({
            url: 'get_subcategories.php',
            type: 'POST',
            data: {
              category_id: categoryId
            },
            success: function(data) {
              $('#subcategory').html(data);
            }
          });
        });
      });
    </script>


    <!-- Price -->
    <div class="form-group mb-3">
      <label for="price">Price</label>
      <input type="number" class="form-control" name="price" id="product-price" placeholder="Enter Product Price" >
      <p class="text-danger " id="price-error"></p>
    </div>

    <!-- Description -->
    <div class="form-group mb-3">
      <label for="description">Description</label>
      <textarea class="form-control" rows="4" name="description" id="product-description" placeholder="Enter a Product Description"></textarea>
      <p class="text-danger " id="description-error"></p>
    </div>

    <!-- Product Images -->
    <div class="mb-3">
      <label class="form-label">Select Image:</label>
      <input class="form-control" type="file" name="image" id="product-image" accept=".jpg, .jpeg, .png" >
      <p class="text-danger " id="image-error"></p>

    </div>



    <!-- Submit Button -->
    <button type="submit" class="btn btn-primary w-100  mb-3">Add Product</button>
  </form>

</div>

<?php
if ($_SERVER['REQUEST_METHOD'] == "POST") {
  $name = $_POST['name'];
  $description = mysqli_real_escape_string($conn, $_POST['description']);

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






  <!-- Bootstrap JS (First) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<!-- Then your custom JS files -->
<script src="./assets/JS/add-Product.js"></script>



  </body>
</html>