<?php
 include './Components/header.html'; 

include './includes/Navbar.php';





?>
    <div class="container">
      <div class="bag-section">
        <h2>Your bag (2 items)</h2>

        <div class="bag-item">
          <div style="display: flex; gap: 10px">
            <img src="./Assets/Images/product-1.webp" alt="Tiger of Sweden" />
            <div class="item-details">
              <h3>Tiger of Sweden</h3>
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
                  "
                ></p>
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
            <span class="stock"> (2 left!) </span>

            <div class="price">
              <span class="old-price">£264.99</span>
              <span class="new-price">£158.99</span>
              <span class="discount">You save 40%</span>
            </div>
          </div>
        </div>

        <div style="margin-top: 30px">
          <p>
            sold by:
            <span style="text-decoration: underline; font-weight: 600"
              >adidas</span
            >
          </p>
        </div>
        <div class="bag-item">
          <div style="display: flex; gap: 10px">
            <img src="./Assets/Images/product-2.avif"alt="Tiger of Sweden" />
            <div class="item-details">
              <h3>adidas Originals</h3>
              <p style="margin-bottom: 10px; color: #444444;">
                ADILETTE - Pool slides - blue/white
              </p>

              <p style="color: #444444;">Colour: dark blue</p>
              <p style="color: #444444;">Size: 10</p>

              <div class="item-actions">
                <button><i class="far fa-trash-alt"></i> Remove</button>
                <p
                  style="
                    border: 1px solid #929090;
                    width: 1px;
                    height: 15px;
                    /* margin-top: 7px; */
                  "
                ></p>
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
              <span
           
                >£29.95</span
              >
            </div>
          </div>
        </div>

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
 

<?php  include './Components/footer.html';  ?>
