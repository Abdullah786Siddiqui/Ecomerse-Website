function addToCart(productId) {
  fetch("../Server/Process/add-to-cart.php", {
    method: "POST",
    headers: {
      "Content-Type": "application/x-www-form-urlencoded",
    },
    body: "productid=" + productId,
  })
    .then((response) => response.text())
    .then((data) => {
      console.log(data);

     Swal.fire({
  position: "top-end",
  icon: "success",
  title: "✅ Product successfully added!",
  showConfirmButton: false,
  timer: 2000,
  toast: true,
  customClass: {
    popup: "custom-swal-toast",
    title: "custom-swal-title",
  },
  showClass: {
    popup: "animate__animated animate__fadeIn",
  },
  hideClass: {
    popup: "animate__animated animate__fadeOut",
  },
});

    })
    .catch((error) => console.error("Error:", error));
}
function buynow(productId) {
  fetch("../Server/Process/add-to-cart.php", {
    method: "POST",
    headers: {
      "Content-Type": "application/x-www-form-urlencoded",
    },
    body: "productid=" + productId + "&buynow=1",
  })
    .then((response) => response.text())
    .then(() => {
      window.location.href = "../Client/checkout.php";
    });
}
function removeCart(productid) {
  fetch("../Server/Process/delete-cart.php", {
    method: "POST",
    headers: {
      "Content-Type": "application/x-www-form-urlencoded",
    },
    body: "productid=" + productid,
  })
    .then((res) => res.json())
    .then((data) => {
      if (data.success) {
        document.querySelector(`.bag-item[data-id="${productid}"]`)?.remove();

     if (data.cart_count === 0) {
  location.reload();
}

        document.querySelectorAll(".cart-count").forEach((element) => {
          element.innerText = data.cart_count;
        });

        document.querySelectorAll(".cart-subtotal").forEach((element) => {
          element.innerText = "£" + data.subtotal;
        });



      }
    });
}


function checkCartBeforePay() {
  fetch("../Server/Process/check-cart.php")
    .then((response) => response.json())
    .then((data) => {
      if (data.success) {
        window.location.href = "./Payment.php";
      } else {
        Swal.fire({
          icon: "error",
          title: "Oops...",
          text: data.message,
        });
      }
    });
}

function checkCartBeforeCheckout() {
  fetch("../Server/Process/checkout-check.php", {
    method: "POST",
    headers: {
      "Content-Type": "application/x-www-form-urlencoded",
    },
    body: "productid=123",
  })
    .then((response) => response.json())
    .then((data) => {
      if (data.success) {
        window.location.href = `./checkout.php?${data.productId}`;
      } else {
        Swal.fire({
          icon: "error",
          title: "Oops...",
          text: data.message,
        });
      }
    })
    .catch((error) => {
      console.error("Fetch error:", error);
    });
}
