<?php
$host = "localhost";
$username = "root";
$password = "";
$database = "ecomerse_website";

$conn = new mysqli($host, $username, $password, $database);
if ($conn->connect_error) {
  die('Connection Failed');
}
