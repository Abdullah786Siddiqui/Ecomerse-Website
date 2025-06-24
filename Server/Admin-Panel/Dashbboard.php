<?php
include("./includes/header.html");
include("./Sidebar.php");

if(!isset($_SESSION['admin_id'])) {
    header("Location: ../../Client/login.php");
    exit();
}


?>

<div class="flex-grow-1 p-3">
  <h1 class="text-center">Welcome to the Admin Panel</h1>
<a href="../Process/logout.php" class="btn btn-danger">Logout</a>

</div>
</div>




<?php include("./Includes/footer.html"); ?>