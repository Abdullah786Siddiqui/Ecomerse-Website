<?php
$host = "localhost";
$username = "root";
$password = "";
$database = "adress-book";

$conn = new mysqli($host, $username, $password, $database);
if ($conn->connect_error) {
  die('Connection Failed');
}
