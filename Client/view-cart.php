<?php
include './Components/header.html';

include './includes/Navbar.php';

$product_id = $_GET['productid'];



?>
<div class="container">
  <div class="bag-section">
    <h2>Your bag (2 items)</h2>
    <?php
    $sql = "SELECT products.id , products.name  , products.description , products.price , brand.name as brand , product_images.image_url  FROM products
              INNER JOIN product_images on product_images.product_id = products.id
              INNER JOIN brand on brand.id = products.brand_id where products.id = $product_id";
    $result = $conn->query($sql);
    while ($row = $result->fetch_assoc()) {
    ?>

      <div class="bag-item">
        <div style="display: flex; gap: 10px">
          <img src="../Server/uploads/<?= $row['image_url'] ?>" alt="Tiger of Sweden" />
          <div class="item-details">
            <h3><?= $row['name'] ?></h3>
            <p style="margin-bottom: 10px; color: #444444;">
              CRANDALL - Short coat - light ink
            </p>

            <p style="color: #444444;">Colour: blue</p>
            <p style="color: #444444;">Size: 40R</p>

            <div class="item-actions">
              <button><i class="far fa-trash-alt"></i> Remove</button>
              <p
                style="
                    border: 1px solid #929090;
                    width: 1px;
                    height: 15px;
                    margin: 0;
                    /* margin-top: 7px; */
                  "></p>
              <button><i class="far fa-heart"></i> Move to wish list</button>
            </div>
          </div>
        </div>

        <div class="item-footer">
          <div class="quantity">
            <select>
              <option>1</option>
            </select>
          </div>

          <div class="price">
            <span class="old-price">£264.99</span>
            <span class="new-price"><?= $row['price'] ?></span>
            <span class="discount">You save 40%</span>
          </div>
        </div>
      </div>
    <?php } ?>



    <p class="note"><i class="fa-solid fa-circle-info"></i> Items placed in this bag are not reserved.</p>
  </div>

  <div class="summary-section">
    <div class="summary-details">
      <h2>Total</h2>
      <div style="display: flex; flex-direction: column; gap: 10px;">
        <p style="color: #444444;">Subtotal <span>£188.94</span></p>
        <p style="color: #444444;">Delivery <span>free</span></p>
        <hr style="margin-bottom: 10px;">
        <p>
          <strong>Total (VAT included)</strong>
          <span><strong>£188.94</strong></span>
        </p>
      </div>
      <button class="checkout-btn">GO TO CHECKOUT</button>
    </div>

    <div class="voucher">
      <label for="voucher">Add a voucher <span style="color: #444444;">(Optional)</span></label>
      <i class="fa-solid fa-chevron-down"></i>
    </div>
  </div>
</div>


<?php include './Components/footer.html';  ?>