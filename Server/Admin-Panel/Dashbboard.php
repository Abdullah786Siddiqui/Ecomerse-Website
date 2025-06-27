 <?php
    include("./includes/header.html");
    include("./Sidebar.php");

    if (!isset($_SESSION['admin_id'])) {
        header("Location: ../../Client/login.php");
        exit();
    }


    ?>



 <h3 class="text-center mt-3">Welcome to Admin Panel</h3>



 <?php include("./Includes/footer.html"); ?> 