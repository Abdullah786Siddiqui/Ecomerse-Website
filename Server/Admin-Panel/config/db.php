<?php
// $host = "sql8.freesqldatabase.com";  
// $username = "sql8787416";
// $password = "qAiy7KAmpy";
// $database = "sql8787416";

// $conn = new mysqli($host, $username, $password, $database);

// // Check connection
// if ($conn->connect_error) {
//     die("Connection Failed: " . $conn->connect_error);
// }

  
?>


<?php
$host = "localhost";  
$username = "root";
$password = "";
$database = "ecomerse_website";

$conn = new mysqli($host, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection Failed: " . $conn->connect_error);
}

  
?>
