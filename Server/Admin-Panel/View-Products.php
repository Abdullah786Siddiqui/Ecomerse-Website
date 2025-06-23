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
            <th scope="col">Title</th>
            <th scope="col">Description</th>
            <th scope="col">Price</th>
            <th scope="col">Brand</th>
            <th scope="col">Image</th>
            <th scope="col">Edit</th>
            <th scope="col">Delete</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>1</td>
            <td>Toy</td>
            <td>Toy is a playing Gadget</td>
            <td>344</td>
            <td>Nike</td>
            <td>
              <img 
                style="border-radius: 50%; object-fit: cover;" 
                src="./Assets/im" 
                width="50" 
                height="50" 
                alt="Product_Image"
              >
            </td>
            <td><a href="#" class="btn btn-success btn-sm">Edit</a></td>
            <td><a href="#" class="btn btn-danger btn-sm">Delete</a></td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</div>
<?php include("./Includes/footer.html"); ?>
