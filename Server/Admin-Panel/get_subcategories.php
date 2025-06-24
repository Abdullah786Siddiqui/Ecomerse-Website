<?php
include("db_connection.php");

if (isset($_POST['category_id'])) {
  $category_id = $_POST['category_id'];
  $sql = "SELECT * FROM subcategories WHERE category_id = $category_id";
  $result = $conn->query($sql);

  while ($row = $result->fetch_assoc()) {
    echo "<option value='{$row['id']}'>{$row['name']}</option>";
  }
}
?>
